<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectory;
use App\Models\CompanyDocument;
use App\Models\CompanyDocumentCategory;
use Illuminate\Http\Request;

class CompanyDocumentController extends Controller
{
    public function index(Request $request) {
        $documents = CompanyDocument::all();
        return view('admin.company_directory.document.index', [
            'documents' => $documents
        ]);
    }

    public function show(Request $request, CompanyDocument $companyDocument) {

    }

    public function create(Request $request) {
        $companyDocumentCategories = CompanyDocumentCategory::pluck('name', 'id');
        $companyDirectories = CompanyDirectory::pluck('name', 'id');
        return view('admin.company_directory.document.create-edit', compact('companyDocumentCategories', 'companyDirectories'));
    }

    public function store(Request $request) {
        $files = $request->file('documents') ?? [];
        $documents = array();

        foreach($files as $file) {
            $documents[] = $file->storePublicly('company_document');
        }
        CompanyDocument::create(array_merge($request->all(), [
            'documents' => json_encode($documents)
        ]));

        return back()->with('success', 'Successfully adding document');
    }

    public function edit(Request $request, CompanyDocument $companyDocument) {
        $companyDirectories = CompanyDirectory::pluck('name', 'id');
        $companyDocumentCategories = CompanyDocumentCategory::pluck('name', 'id');
        return view('admin.company_directory.document.create-edit', [
            'companyDocument' => $companyDocument,
            'companyDocumentCategories' => $companyDocumentCategories,
            'companyDirectories' => $companyDirectories,
        ]);
    }

    public function update(Request $request, CompanyDocument $companyDocument) {
        $files = $request->file('documents') ?? [];
        $documents = array();

        foreach($files as $file) {
            $documents[] = $file->storePublicly('company_document');
        }

        $companyDocument->update(array_merge($request->all(), [
            'documents' => json_encode($documents)
        ]));

        return back()->with('success', 'Successfully updating document');
    }

    public function destroy(Request $request, CompanyDocument $companyDocument) {
        $companyDocument->delete();

        return back()->with('success', 'Successfully deleting document');
    }


}
