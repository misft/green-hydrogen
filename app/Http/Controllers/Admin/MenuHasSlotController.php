<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuHasSlot;
use Illuminate\Http\Request;

class MenuHasSlotController extends Controller
{
    public function index(Request $request) {
        return view('admin.menu.menu_has_slot.index', [
            'items' => MenuHasSlot::with(['menu.translation.translation', 'slot'])->get()
        ]);
    }
}
