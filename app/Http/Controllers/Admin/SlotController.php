<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index(Request $request) {
        return view('admin.menu.slot.index', [
            'slots' => Slot::all()
        ]);
    }
}
