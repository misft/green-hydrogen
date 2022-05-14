<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDocumentCategory;
use Illuminate\Http\Request;

class CompanyDocumentCategoryController extends Controller
{
    public function index(Request $request) {
        $categories = CompanyDocumentCategory::all();

        return view('admin.company_directory.document.category.index', compact('categories'));
    }

    public function show(Request $request, CompanyDocumentCategory $companyDocumentCategory) {

    }

    public function create(Request $request) {
        return view('admin.company_directory.document.category.create-edit');
    }

    public function store(Request $request) {

        $request->validate([
            'name_id' => 'required',
            'name_en' => 'required'
        ], [
            'name_id.required' => 'Name dalam Bahasa Dibutuhkan',
            'name_en.required' => 'Name dalam English Dibutuhkan'
        ]);

        CompanyDocumentCategory::create([
            'name' => json_encode([
                [
                    'language' => 'id',
                    'name' => $request->name_id
                ],
                [
                    'language' => 'en',
                    'name' => $request->name_en
                ]
            ])
        ]);

        return redirect()->route('company_document_category.index')->with('success', 'Successfully adding category');
    }

    public function edit(Request $request, CompanyDocumentCategory $companyDocumentCategory) {
        return view('admin.company_directory.document.category.create-edit', [
            'companyDocumentCategory' => $companyDocumentCategory
        ]);
    }

    public function update(Request $request, CompanyDocumentCategory $companyDocumentCategory) {

        $request->validate([
            'name_id' => 'required',
            'name_en' => 'required'
        ], [
            'name_id.required' => 'Name dalam Bahasa Dibutuhkan',
            'name_en.required' => 'Name dalam English Dibutuhkan'
        ]);

        $companyDocumentCategory->update([
            'name' => json_encode([
                [
                    'language' => 'id',
                    'name' => $request->name_id
                ],
                [
                    'language' => 'en',
                    'name' => $request->name_en
                ]
            ])
        ]);

        return redirect(route('company_document_category.index'))->with('success', 'Successfully updating category');
    }

    public function destroy(Request $request, CompanyDocumentCategory $companyDocumentCategory) {
        $validation = $companyDocumentCategory->document->count();

        if($validation){
            return back()->with('error', 'Menghapus category ini akan berdampak pada data document');
        }

        $companyDocumentCategory->delete();

        return redirect(route('company_document_category.index'))->with('success', 'Successfully deleting category');
    }


}
