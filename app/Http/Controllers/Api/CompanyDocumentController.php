<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyDocument;
use App\Traits\Response;
use Illuminate\Http\Request;

class CompanyDocumentController extends Controller
{
    use Response;

    public function index(Request $request) {
        $documents = CompanyDocument::with(['company:id,name,image,photo', 'category:id,name'])->orderBy('created_at', 'desc')->get();

        return $this->success(body: [
            'documents' => $documents
        ]);
    }

    public function latest(Request $request) {
        $documents = CompanyDocument::with(['company:id,name,image,photo', 'category:id,name'])->limit(3)->orderBy('created_at', 'desc')->get();

        return $this->success(body: [
            'documents' => $documents
        ]);
    }
}
