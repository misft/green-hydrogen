<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AutoReplySender;
use App\Models\CompanyDirectory;
use App\Models\CompanyDirectoryTopic;
use App\Models\CompanyDirectoryVerify;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompanyDirectoryController extends Controller
{
    public function index(Request $request) {
        $companyDirectories = CompanyDirectory::with(['translation'])->get();
        // dd($companyDirectories);
        return view('admin.company_directory.index', [
            'companyDirectories' => $companyDirectories
        ]);
    }

    public function show(Request $request, CompanyDirectory $companyDirectory) {
        return view('admin.company_directory.show', [
            'companyDirectories' => $companyDirectory
        ]);
    }

    public function create(Request $request) {
        $region = Region::get()->pluck('name', 'id');
        $topics = CompanyDirectoryTopic::with('translations')->get();
        return view('admin.company_directory.create-edit', compact('region','topics'));
    }

    public function store(Request $request) {

        $request->validate([
            'company_directory_topic_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'region_id' => 'required',
            'website' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ], [
            'company_directory_topic_id.required' => 'Topic Dibutuhkan',
            'name.required' => 'Nama Dibutuhkan',
            'email.required' => 'Email Dibutuhkan',
            'password.required' => 'Password Dibutuhkan',
            'region_id.required' => 'Region Dibutuhkan',
            'website.required' => 'Website Dibutuhkan',
            'contact.required' => 'Contact Dibutuhkan',
            'description.required' => 'Description Dibutuhkan',
            'photo.required' => 'Photo Dibutuhkan',
        ]);


        $companyDirectory = CompanyDirectory::create(array_merge($request->toArray(), [
            'password' => Hash::make($request->get('password')),
            'photo' => $request->hasFile('photo') ? $request->file('photo')->storePublicly('company_directory') : null
        ]));

        $this->sendWelcome($request->email);

        $companyDirectory->translation()->create($request->all());

        return redirect(route('company_directory.index'))->with('success', "Company Directory created!");
    }

    public function edit(Request $request, CompanyDirectory $companyDirectory) {
        $companyDirectory->load(['translation']);
        $region = Region::get()->pluck('name', 'id');
        $topics = CompanyDirectoryTopic::with('translations')->get();

        return view('admin.company_directory.create-edit', compact('companyDirectory', 'region', 'topics'));
    }

    public function update(Request $request, CompanyDirectory $companyDirectory) {

        $request->validate([
            'company_directory_topic_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'sometimes',
            'region_id' => 'required',
            'website' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'photo' => 'sometimes',
        ], [
            'company_directory_topic_id.required' => 'Topic Dibutuhkan',
            'name.required' => 'Nama Dibutuhkan',
            'email.required' => 'Email Dibutuhkan',
            // 'password.required' => 'Password Dibutuhkan',
            'region_id.required' => 'Region Dibutuhkan',
            'website.required' => 'Website Dibutuhkan',
            'contact.required' => 'Contact Dibutuhkan',
            'description.required' => 'Description Dibutuhkan',
            // 'photo.required' => 'Photo Dibutuhkan',
        ]);

        $companyDirectory->update(array_merge($request->toArray(), [
            'password' => !empty($request->get('password')) ? Hash::make($request->get('password')) : $companyDirectory->password,
            'photo' => $request->hasFile('photo') ? $request->file('photo')->storePublicly('company_directory') : $companyDirectory->photo
        ]));

        $companyDirectory->translation()->updateOrCreate([
            'company_directory_id' => $companyDirectory->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('company_directory.edit', ['company_directory' => $companyDirectory->id]))->with('success', "Company Directory created!");
    }

    public function destroy(Request $request, CompanyDirectory $companyDirectory) {
        $companyDirectory->delete();

        return redirect(route('company_directory.index'))->with('success', "Company Directory deleted!");
    }

    public function profile()
    {
        return view('admin.company_directory.index');
    }

    public function activate(CompanyDirectory $companyDirectory)
    {
        $companyDirectory->update(['is_email_verified' => 1]);

        return redirect(route('company_directory.index'))->with('success', "Company Directory email verified!");
    }

    public function verify($token)
    {
        $verifyCompany = CompanyDirectoryVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyCompany) ){
            $user = $verifyCompany->company_directory;

            if(!$user->is_email_verified) {
                $verifyCompany->company_directory->is_email_verified = 1;
                $verifyCompany->company_directory->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect(route('login.company'))->with('status', $message);
    }

    public function sendWelcome($email)
    {
        return Mail::to($email)->send(new AutoReplySender());
    }
}
