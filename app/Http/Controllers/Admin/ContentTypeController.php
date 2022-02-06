<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    public function index() {
        return view('admin.menu.content_type.index', [
            'items'=>ContentType::all()
        ]);
    }
}
