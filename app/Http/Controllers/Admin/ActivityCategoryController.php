<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoryController extends Controller
{
    public function index(Request $request) {
        $activityCategory= ActivityCategory::all();

        return view('admin.activity_category.index', [
            'activityCategory' => $activityCategory,
        ]);
    }

    public function show(Request $request, ActivityCategory $activityCategory) {
        return view('admin.activity_category.show', [
            'activityCategory' => $activityCategory
        ]);
    }

    public function create(Request $request) {
        return view('admin.activity_category.create-edit');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name Dibutuhkan'
        ]);

        $activityCategory = ActivityCategory::create($request->all());
        $activityCategory->translation()->create($request->all());

        return redirect(route('activity_category.edit', $activityCategory->id))->with('success', 'Success inserting activity category');
    }

    public function edit(Request $request, ActivityCategory $activityCategory) {
        // return $activityCategory->translation;
        $activityCategory->load(['translation']);

        return view('admin.activity_category.create-edit', [
            'activityCategory' => $activityCategory
        ]);
    }

    public function update(Request $request, ActivityCategory $activityCategory) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name Dibutuhkan'
        ]);

        $activityCategory->update($request->all());
        $activityCategory->translation()->updateOrCreate([
            'translation_id' => $request->get('translation_id'),
            'activity_category_id' => $activityCategory->id
        ], $request->all());

        return redirect(route('activity_category.index'))->with('success', 'Success updating activity category');
    }

    public function destroy(Request $request, ActivityCategory $activityCategory) {
        $validation = $activityCategory->activities->count();
        if($validation > 0){
            return back()->with('error', 'Category ini dihapus maka data activity akan terganggu');
        }
        $activityCategory->delete();

        return redirect(route('activity_category.index'))->with('success', 'Success deleting activity category');
    }
}
