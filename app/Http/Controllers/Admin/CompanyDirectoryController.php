<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectory;
use App\Models\CompanyDirectoryVerify;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.company_directory.create-edit', compact('region'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'region_id' => 'required',
            'website' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ], [
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

        $companyDirectory->translation()->create($request->all());

        return redirect(route('company_directory.index'))->with('success', "Company Directory created!");
    }

    public function edit(Request $request, CompanyDirectory $companyDirectory) {
        $region = Region::get()->pluck('name', 'id');
        // dd($companyDirectory);
        return view('admin.company_directory.create-edit', compact('companyDirectory', 'region'));
    }

    public function update(Request $request, CompanyDirectory $companyDirectory) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'sometimes',
            'region_id' => 'required',
            'website' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'photo' => 'sometimes',
        ], [
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
}
