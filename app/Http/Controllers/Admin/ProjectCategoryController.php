<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::all();
        return view('admin.project.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project.category.create-edit');
    }

    public function store(Request $request) {
        ProjectCategory::create($request->all());

        return redirect(route('project_category.index'))->with('success', 'Successfully adding category');
    }

    public function edit(Request $request, ProjectCategory $projectCategory) {
        return view('admin.project.category.create-edit', [
            'projectCategory' => $projectCategory
        ]);
    }

    public function update(Request $request, ProjectCategory $projectCategory) {
        $projectCategory->update($request->all());

        return redirect(route('project_category.index'))->with('success', 'Successfully updating category');
    }

    public function destroy(Request $request, ProjectCategory $projectCategory) {
        $projectCategory->delete();

        return redirect(route('project_category.index'))->with('success', 'Successfully deleting category');
    }
}
