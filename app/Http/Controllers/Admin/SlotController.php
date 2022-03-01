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
    
    public function show(Request $request, $id) {

    } 
    
    public function create(Request $request) {
        return view('admin.menu.slot.create-edit');
    } 
    
    public function store(Request $request) {
        Slot::create($request->only('name'));

        return redirect(route('slot.index'))->with('success', 'Successfully adding slot');
    } 
    
    public function edit(Request $request, $id) {
        $slot = Slot::find($id);

        return view('admin.menu.slot.create-edit', [
            'slot' => $slot
        ]);
    } 
    
    public function update(Request $request, $id) {
        $slot = Slot::find($id);

        $slot->update($request->only('name'));
        
        return redirect(route('slot.index'))->with('success', 'Successfully deleting slot');
    } 
    
    public function destroy(Request $request, $id) {
        $slot = Slot::find($id);

        $slot->delete(); 

        return redirect(route('slot.index'))->with('success', 'Successfully deleting slot');
    }
    
}
