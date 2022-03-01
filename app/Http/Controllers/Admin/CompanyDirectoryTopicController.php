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
        CompanyDirectoryTopic::create($request->all());

        return redirect(route('company_directory_topic.index'))->with('success', 'Successfully updating data');
    } 
    
    public function edit(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {
        return view('admin.company_directory.topic.create-edit', compact('companyDirectoryTopic'));
    } 
    
    public function update(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {
        $companyDirectoryTopic->update($request->all());

        return redirect(route('company_directory_topic.index'))->with('success', 'Successfully updating data');
    } 
    
    public function destroy(Request $request, CompanyDirectoryTopic $companyDirectoryTopic) {
        $companyDirectoryTopic->delete();

        return redirect(route('company_directory_topic.index'))->with('success', 'Successfully deleting data');
    } 
    
}
