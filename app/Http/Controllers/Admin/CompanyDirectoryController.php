<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyDirectoryController extends Controller
{
    public function index(Request $request) {
        $companyDirectories = CompanyDirectory::all();

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
        CompanyDirectory::create(array_merge($request->toArray(), [
            'password' => Hash::make($request->get('password')),
            'photo' => $request->hasFile('photo') ? $request->file('photo')->storePublicly('company_directory') : null
        ]));

        return redirect(route('company_directory.index'))->with('success', "Company Directory created!");
    }

    public function edit(Request $request, CompanyDirectory $companyDirectory) {
        $region = Region::get()->pluck('name', 'id');
        // dd($companyDirectory);
        return view('admin.company_directory.create-edit', compact('companyDirectory', 'region'));
    }

    public function update(Request $request, CompanyDirectory $companyDirectory) {
        $companyDirectory->update(array_merge($request->toArray(), [
            'password' => !empty($request->get('password')) ? Hash::make($request->get('password')) : $companyDirectory->password,
            'photo' => $request->hasFile('photo') ? $request->file('photo')->storePublicly('company_directory') : $companyDirectory->photo
        ]));

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
}
