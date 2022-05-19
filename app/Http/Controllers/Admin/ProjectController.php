<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $projects = Project::with('translations','category')->when(Auth::guard('company')->check(), function($query) {
            $query->where('company_directory_id', Auth::guard('company')->user()->id);
        })->get();

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
            "PROJECT" => "PROJECT",
            "PILOT_PROJECT" => "PILOT PROJECT",
            "FEASIBILITY_STUDY" => "FEASIBILITY STUDY"
        ];

        return view('admin.project.create-edit', compact('categories', 'countries', 'regions', 'cities', 'statuses'));
    }

    public function store(Request $request) {
        $rules = [
            'project_category_id'=>'required',
            'country_id'=>'required',
            'region_id'=>'required',
            'city_id'=>'required',
            'name'=>'required',
            'company_name'=>'required',
            'description'=>'required',
            'status'=>'required',
            'email'=>'required',
            // 'contact'=>'required',
            // 'website'=>'required',
            'total_budget'=>'required',
            // 'address'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'image'=>'sometimes|max:1024|mimes:jpg,jpeg,png',
            'logo'=>'sometimes|max:1024|mimes:jpg,jpeg,png',
            'member_of_image'=>'sometimes|max:1024|mimes:jpg,jpeg,png',
        ];

        $message = [
            'project_category_id.required'=>'Kolom Project Category dibutuhkan',
            'country_id.required'=>'Kolom Country dibutuhkan',
            'region_id.required'=>'Kolom Region dibutuhkan',
            'city_id.required'=>'Kolom City dibutuhkan',
            'name.required'=>'Kolom Name dibutuhkan',
            'company_name.required'=>'Kolom Company Name dibutuhkan',
            'description.required'=>'Kolom Description dibutuhkan',
            'status.required'=>'Kolom Status dibutuhkan',
            'email.required'=>'Kolom Email dibutuhkan',
            // 'contact.required'=>'Kolom Contact dibutuhkan',
            // 'website.required'=>'Kolom Website dibutuhkan',
            'total_budget.required'=>'Kolom Todal Budget dibutuhkan',
            'lat.required'=>'Kolom Latitude dibutuhkan',
            'lng.required'=>'Kolom Longitude dibutuhkan',
            // 'image.required'=>'Image dibutuhkan',
            'image.max'=>'Batas ukuran Image maximal 1MB',
            'image.mimes'=>'Tipe Image yang diperbolehkan JPG, JPEG, PNG',
            // 'logo.required'=>'Logo dibutuhkan',
            // 'address.required'=>'Address dibutuhkan',
            'logo.max'=>'Batas ukuran logo maximal 1MB',
            'logo.mimes'=>'Tipe logo yang diperbolehkan JPG, JPEG, PNG',
            'member_of_image.max'=>'Batas ukuran Member of maximal 1MB',
            'member_of_image.mimes'=>'Tipe Member of yang diperbolehkan JPG, JPEG, PNG',
        ];

        $data = $request->all();
        $validate = Validator::make($data, $rules, $message);
        if ($validate->fails()) {
            return back()
                        ->withErrors($validate)
                        ->withInput();
        }
        DB::beginTransaction();
        $project = Project::create(array_merge($request->all(), [
            'image' => $request->has('image') ? $request->file('image')->storePublicly('project/image') : null,
            'logo' => $request->has('logo') ? $request->file('logo')->storePublicly('project/logo') : null,
            'member_of_image' => $request->has('member_of_image') ? $request->file('member_of_image')->storePublicly('project/member_of_image') : null,
        ]));

        $project->translations()->create($request->all());

        DB::commit();

        return redirect(route('project.index'))->with('success', 'Successfully adding data');
    }

    public function edit(Request $request, $id) {
        $project = Project::find($id);
        $categories = ProjectCategory::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $regions = Region::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $statuses = [
            "PROJECT" => "PROJECT",
            "PILOT_PROJECT" => "PILOT PROJECT",
            "FEASIBILITY_STUDY" => "FEASIBILITY STUDY"
        ];

        return view('admin.project.create-edit', compact('project', 'categories', 'countries', 'regions', 'cities', 'statuses'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'project_category_id'=>'required',
            'country_id'=>'required',
            'region_id'=>'required',
            'city_id'=>'required',
            'name'=>'required',
            'company_name'=>'required',
            'description'=>'required',
            'status'=>'required',
            'email'=>'required',
            // 'contact'=>'required',
            // 'website'=>'required',
            'total_budget'=>'required',
            // 'address'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'image'=>'sometimes|max:1024|mimes:jpg,jpeg,png',
            'logo'=>'sometimes|max:1024|mimes:jpg,jpeg,png',
            'member_of_image'=>'sometimes|max:1024|mimes:jpg,jpeg,png',
        ];

        $message = [
            'project_category_id.required'=>'Kolom Project Category dibutuhkan',
            'country_id.required'=>'Kolom Country dibutuhkan',
            'region_id.required'=>'Kolom Region dibutuhkan',
            'city_id.required'=>'Kolom City dibutuhkan',
            'name.required'=>'Kolom Name dibutuhkan',
            'company_name.required'=>'Kolom Company Name dibutuhkan',
            'description.required'=>'Kolom Description dibutuhkan',
            'status.required'=>'Kolom Status dibutuhkan',
            'email.required'=>'Kolom Email dibutuhkan',
            // 'contact.required'=>'Kolom Contact dibutuhkan',
            // 'website.required'=>'Kolom Website dibutuhkan',
            'total_budget.required'=>'Kolom Todal Budget dibutuhkan',
            'lat.required'=>'Kolom Latitude dibutuhkan',
            'lng.required'=>'Kolom Longitude dibutuhkan',
            'image.max'=>'Batas ukuran Image maximal 1MB',
            'image.mimes'=>'Tipe Image yang diperbolehkan JPG, JPEG, PNG',
            // 'address.required'=>'Address dibutuhkan',
            'logo.max'=>'Batas ukuran logo maximal 1MB',
            'logo.mimes'=>'Tipe logo yang diperbolehkan JPG, JPEG, PNG',
            'member_of_image.max'=>'Batas ukuran Member of maximal 1MB',
            'member_of_image.mimes'=>'Tipe Member of yang diperbolehkan JPG, JPEG, PNG',
        ];

        $project = Project::find($id);

        $project->update(array_merge($request->all(), [
            'image' => $request->has('image') ? $request->file('image')->storePublicly('project/image') : $project->image,
            'logo' => $request->has('logo') ? $request->file('logo')->storePublicly('project/logo') : $project->logo,
            'member_of_image' => $request->has('member_of_image') ? $request->file('member_of_image')->storePublicly('project/member_of_image') : $project->member_of_image,
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
