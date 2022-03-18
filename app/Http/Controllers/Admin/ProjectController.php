<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $projects = Project::with('translations','category')->get();

        return view('admin.project.index', [
            'projects' => $projects
        ]);
    } 
    
    public function show(Request $request, $id) {
    
    } 
    
    public function create(Request $request) {
        $categories = ProjectCategory::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $regions = Region::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $statuses = [
            "DONE" => "DONE"
        ];

        return view('admin.project.create-edit', compact('categories', 'countries', 'regions', 'cities', 'statuses'));
    } 
    
    public function store(Request $request) {
        DB::beginTransaction();
        $project = Project::create(array_merge($request->all(), [
            'image' => $request->has('image') ? $request->file('image')->storePublicly('project/image') : null,
            'logo' => $request->has('logo') ? $request->file('logo')->storePublicly('project/logo') : null,
            'member_of_image' => $request->has('member_of_image') ? $request->file('logo')->storePublicly('project/member_of_image') : null,
        ]));

        $project->translations()->create($request->all());

        DB::commit();
    
        return redirect(route('project.edit', $project->id))->with('success', 'Successfully adding data');
    } 
    
    public function edit(Request $request, $id) {
        $project = Project::find($id);

        return view('admin.project.create-edit', compact('project'));
    } 
    
    public function update(Request $request, $id) {
        $project = Project::find($id);

        $project = Project::create(array_merge($request->all(), [
            'image' => $request->has('image') ? $request->file('image')->storePublicly('project/image') : $project->image,
            'logo' => $request->has('logo') ? $request->file('logo')->storePublicly('project/logo') : $project->logo,
            'member_of_image' => $request->has('member_of_image') ? $request->file('logo')->storePublicly('project/member_of_image') : $project->member_of_image,
        ]));

        $project->translations()->updateOrCreate([
            'project_id' => $project->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('project.index'))->with('success', 'Successfully updating data');
    }   
    
    public function destroy(Request $request, $id) {
        $project = Project::find($id);

        $project->delete();

        return back()->with('success', 'Successfully deleting data');
    } 
    
}
