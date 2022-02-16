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

    public function destroy(Request $request, $id) {

    }

    public function edit(Request $request, $id) {
        $slot_content = SlotHasContent::with('translation')->find($id);
        return view('admin.menu.slot_has_content.create_edit', [
            'slot_content' => $slot_content
        ]);
    }

    public function update(Request $request, SlotHasContent $id) {
        
    }

    public function show(SlotHasContent $id) {
        
    }
}
