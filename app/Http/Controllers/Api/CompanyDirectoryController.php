<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginCompanyDirectoryRequest;
use App\Http\Requests\Api\RegisterCompanyDirectoryRequest;
use App\Models\CompanyDirectory;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class CompanyDirectoryController extends Controller
{
    use Response;

    public function register(RegisterCompanyDirectoryRequest $request) {
        $companyDirectory = CompanyDirectory::create(array_merge($request->validated(), [
            'password' => Hash::make($request->get('password')),
            'photo' => $request->hasFile('photo') ? $request->file('photo')->storePublicly('company') : null
        ]));

        return $this->success(body: [
            'company_directory' => $companyDirectory
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
        [$id, $name] = explode("-", $slug);

        return $this->success(body: [
            'company_directory' => CompanyDirectory::where('id', $id)->where('name', $name)->first()
        ]);
    }

    public function upload(Request $request) {
        
    }
}
