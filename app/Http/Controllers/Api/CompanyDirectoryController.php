<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginCompanyDirectoryRequest;
use App\Http\Requests\Api\RegisterCompanyDirectoryRequest;
use App\Models\CompanyDirectory;
use App\Models\CompanyDirectoryVerify;
use App\Models\CompanyDocument;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Whoops\Run;

class CompanyDirectoryController extends Controller
{
    use Response;

    public function __construct()
    {
        $this->middleware('is_verify_email')->except([
            'index', 'register', 'login'
        ]);
    }

    public function index(Request $request) {
        $companyDirectories = CompanyDirectory::with(['region:id,name'])
            ->get();

        return $this->success(body: [
            'company_directories' => $companyDirectories
        ]);
    }

    public function register(RegisterCompanyDirectoryRequest $request) {
        try {
            $companyDirectory = CompanyDirectory::create(array_merge($request->validated(), [
                'password' => Hash::make($request->get('password')),
                'photo' => $request->hasFile('photo') ? $request->file('photo')->storePublicly('company') : null
            ]));
        } catch(\Exception $e) {
            dd($e->getMessage());
            return $this->badRequest(message: __('auth.register_failed'));
        }

        $createVerif = CompanyDirectoryVerify::create(['company_directory_id' => $companyDirectory->id, 'token' => sha1(time())]);

        Mail::send('authMailVerif', ['token' => $createVerif->token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification - Green Hydrogen');
        });

        return $this->success(body: [
            'company_directory' => $companyDirectory,
            'register_message' => 'Please verify your email!'
        ]);
    }

    public function login(LoginCompanyDirectoryRequest $request) {
        $user = CompanyDirectory::email($request->get('email'))->first();

        if($user && Hash::check($request->get('password'), $user->password)) {
            $user->tokens()->delete();

            $token = $user->createToken($user->id.$request->ip().$request->userAgent().time());
            $plain_token = $token->plainTextToken;

            $user->remember_token = $plain_token;
            $user->save();
        } else {
            return $this->badRequest(message: __('auth.failed'));
        }

        return $this->success(body: [
            'user' => $user,
            'token' => $plain_token
        ]);
    }

    public function profile(Request $request) {
        return $this->success(body: [
            'user' => $request->user()
        ]);
    }

    public function show(Request $request, $slug) {
        [$id, $name] = explode("-", $slug, 2);

        return $this->success(body: [
            'company_directory' => CompanyDirectory::where('id', $id)->where('name', $name)->first()
        ]);
    }

    public function upload(Request $request) {
        $companyDirectory = $request->user();

        foreach($request->file('documents') as $file) {
            $documents[] = $file->storePubliclyAs('company_document/'.$companyDirectory->id, $file->getClientOriginalName());
        }

        $companyDirectory->documents()->create(array_merge($request->all(), [
            'documents' => json_encode($documents)
        ]));

        return $this->success(body: [
            'documents' => $companyDirectory->documents
        ]);
    }

    public function deleteDocument(Request $request) {
        $document = CompanyDocument::where('company_directory_id', $request->user()->id)->find($request->get('id'));

        foreach(json_decode($document->documents) as $file) {
            Storage::disk('public')->delete($file);
        }

        $document->delete();

        return $this->success();
    }
}
