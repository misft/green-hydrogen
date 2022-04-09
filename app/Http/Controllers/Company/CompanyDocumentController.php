<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyDocument;
use App\Models\CompanyDocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyDocument = Auth::guard('company')->user();
        $documents = CompanyDocument::with('category')->whereCompanyDirectoryId($companyDocument->id)->get();
        return view('company.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $companyDocumentCategories = CompanyDocumentCategory::pluck('name', 'id');
        return view('company.document.create-edit', compact('companyDocumentCategories'));
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
        $companyDocumentCategories = CompanyDocumentCategory::pluck('name', 'id');
        return view('admin.company_directory.document.create-edit', [
            'companyDocument' => $companyDocument,
            'companyDocumentCategories' => $companyDocumentCategories
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
