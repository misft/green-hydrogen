<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlotHasContent;
use Illuminate\Http\Request;

class SlotHasContentController extends Controller
{
    public function index(Request $request) {
        return view('admin.menu.slot_has_content.index', [
            'items' => SlotHasContent::with(['translation', 'menuSlot'])->get()
        ]);
    }   
}
