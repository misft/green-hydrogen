<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectoryTopic;
use Illuminate\Http\Request;

class CompanyDirectoryTopicController extends Controller
{
    public function index(Request $request) {
        $companyDirectoryTopics = CompanyDirectoryTopic::all();

        return view('admin.company_directory.topic.index', compact('companyDirectoryTopics'));
    }

    public function show(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {

    }

    public function create(Request $request) {
        return view('admin.company_directory.topic.create-edit');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name Dibutuhkan',
        ]);

        $companyDirectoryTopic = CompanyDirectoryTopic::create($request->all());
        $companyDirectoryTopic->translation()->create($request->all());

        return redirect(route('company_directory_topic.edit', $companyDirectoryTopic->id))->with('success', 'Successfully adding data');
    }

    public function edit(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {
        return view('admin.company_directory.topic.create-edit', compact('companyDirectoryTopic'));
    }

    public function update(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {

        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name Dibutuhkan',
        ]);

        $companyDirectoryTopic->translation()->updateOrCreate([
            'company_directory_topic_id' => $companyDirectoryTopic->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('company_directory_topic.index'))->with('success', 'Successfully updating data');
    }

    public function destroy(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {
        $validation = $companyDirectoryTopic->company_directory->count();
        // dd($validation);
        if($validation > 0){
            return back()->with('error', 'Topic ini digunakan oleh beberapa company directory, aktivitas ini akan mengganggu data lain');
        }
        $companyDirectoryTopic->delete();

        return redirect(route('company_directory_topic.index'))->with('success', 'Successfully deleting data');
    }

}
