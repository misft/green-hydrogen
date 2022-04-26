<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectory;
use App\Models\CompanyDocument;
use App\Models\CompanyDocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $data = $request->all();
        $rules = [
            'company_directory_id'=>'required',
            'company_document_category_id'=>'required',
            'title_id'=>'required',
            'title_en'=>'required',
            'description_id'=>'required',
            'description_en'=>'required',
            'coverImage'=>'required|max:1024',
            'documents'=>'required|max:1024',
        ];
        $message = [
            'company_directory_id.required' => 'Document Directory dibutuhkan',
            'company_document_category_id.required' => 'Document Category dibutuhkan',
            'title_id.required' => 'Title dalam bahasa dibutuhkan',
            'title_en.required' => 'Title dalam english dibutuhkan',
            'description_id.required' => 'Description dalam bahasa dibutuhkan',
            'description_en.required' => 'Description dalam english dibutuhkan',
            'coverImage.required' => 'Image dibutuhkan',
            'coverImage.max' => 'batas ukuran Document File maksimal adalah 1MB',
            'documents.required' => 'Document dibutuhkan',
            'documents.max' => 'batas ukuran Document File maksimal adalah 1MB',
        ];

        $validate = Validator::make($data, $rules, $message);
        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }

        $images = $request->file('coverImage') ?? [];
        $covers = array();

        foreach($images as $image) {
            $covers[] = $image->storePublicly('company_document/cover');
        }

        $files = $request->file('documents') ?? [];
        $documents = array();

        foreach($files as $file) {
            $documents[] = $file->storePublicly('company_document');
        }

        CompanyDocument::create(array_merge($request->all(), [
            'title' => json_encode([
                [
                    'language' => 'id',
                    'title' => $request->title_id
                ],
                [
                    'language' => 'en',
                    'title' => $request->title_en
                ]
            ]),
            'description' => json_encode([
                [
                    'language' => 'id',
                    'description' => $request->description_id
                ],
                [
                    'language' => 'en',
                    'description' => $request->description_en
                ]
            ]),
            'documents' => json_encode($documents),
            'cover' => json_encode($covers)
        ]));

        return redirect()->route('company_document.index')->with('success', 'Successfully adding document');
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
        if($request->file('coverImage')){
            $images = $request->file('coverImage') ?? [];
            $covers = array();

            foreach($images as $image) {
                $covers[] = $image->storePublicly('company_document/cover');
            }

            if($request->file('documents')){
                $files = $request->file('documents') ?? [];
                $documents = array();
    
                foreach($files as $file) {
                    $documents[] = $file->storePublicly('company_document');
                }

                $companyDocument->update(array_merge($request->all(), [
                    'title' => json_encode([
                        [
                            'language' => 'id',
                            'title' => $request->title_id
                        ],
                        [
                            'language' => 'en',
                            'title' => $request->title_en
                        ]
                    ]),
                    'description' => json_encode([
                        [
                            'language' => 'id',
                            'description' => $request->description_id
                        ],
                        [
                            'language' => 'en',
                            'description' => $request->description_en
                        ]
                    ]),
                    'documents' => json_encode($documents),
                    'cover' => json_encode($covers)
                ]));
            } else {
                $companyDocument->update(array_merge($request->all(), [
                    'title' => json_encode([
                        [
                            'language' => 'id',
                            'title' => $request->title_id
                        ],
                        [
                            'language' => 'en',
                            'title' => $request->title_en
                        ]
                    ]),
                    'description' => json_encode([
                        [
                            'language' => 'id',
                            'description' => $request->description_id
                        ],
                        [
                            'language' => 'en',
                            'description' => $request->description_en
                        ]
                    ]),
                    'cover' => json_encode($covers)
                ]));
            }
        } else {
            if($request->file('documents')){
                $files = $request->file('documents') ?? [];
                $documents = array();
    
                foreach($files as $file) {
                    $documents[] = $file->storePublicly('company_document');
                }

                $companyDocument->update(array_merge($request->all(), [
                    'title' => json_encode([
                        [
                            'language' => 'id',
                            'title' => $request->title_id
                        ],
                        [
                            'language' => 'en',
                            'title' => $request->title_en
                        ]
                    ]),
                    'description' => json_encode([
                        [
                            'language' => 'id',
                            'description' => $request->description_id
                        ],
                        [
                            'language' => 'en',
                            'description' => $request->description_en
                        ]
                    ]),
                    'documents' => json_encode($documents)
                ]));
            } else {
                $companyDocument->update(array_merge($request->all(), [
                    'title' => json_encode([
                        [
                            'language' => 'id',
                            'title' => $request->title_id
                        ],
                        [
                            'language' => 'en',
                            'title' => $request->title_en
                        ]
                    ]),
                    'description' => json_encode([
                        [
                            'language' => 'id',
                            'description' => $request->description_id
                        ],
                        [
                            'language' => 'en',
                            'description' => $request->description_en
                        ]
                    ])
                ]));
            }
        }

        return redirect()->route('company_document.index')->with('success', 'Successfully updating document');
    }

    public function destroy(Request $request, CompanyDocument $companyDocument) {
        $companyDocument->delete();

        return back()->with('success', 'Successfully deleting document');
    }


}
