<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    public function index() {
        $contentTypes = ContentType::all();

        return view('admin.menu.content_type.index', [
            'items'=>$contentTypes
        ]);
    }
}
