<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::with(['translation'])->get();
        return view('admin.project.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project.category.create-edit');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name Dibutuhkan'
        ]);

        $projectCategory = ProjectCategory::create($request->all());
        $projectCategory->translation()->create($request->all());

        return redirect(route('project_category.index'))->with('success', 'Successfully adding category');
    }

    public function edit(Request $request, ProjectCategory $projectCategory) {
        // dd($projectCategory);
        return view('admin.project.category.create-edit', [
            'projectCategory' => $projectCategory
        ]);
    }

    public function update(Request $request, ProjectCategory $projectCategory) {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name Dibutuhkan'
        ]);

        $projectCategory->update($request->all());
        $projectCategory->translation()->updateOrCreate([
            'translation_id' => $request->get('translation_id'),
            'project_category_id' => $projectCategory->id
        ], $request->all());

        return redirect(route('project_category.index'))->with('success', 'Successfully updating category');
    }

    public function destroy(Request $request, ProjectCategory $projectCategory) {
        $validation = $projectCategory->project->count();
        if($validation > 0){
            return back()->with('error', 'Menghapus project category akan berdampak pada data project');
        }

        $projectCategory->delete();

        return redirect(route('project_category.index'))->with('success', 'Successfully deleting category');
    }
}
