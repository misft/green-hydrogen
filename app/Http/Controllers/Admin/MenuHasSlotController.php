<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuHasSlot;
use App\Models\Slot;
use Illuminate\Http\Request;

class MenuHasSlotController extends Controller
{
    public function index(Request $request) {
        return view('admin.menu.menu_has_slot.index', [
            'items' => MenuHasSlot::with(['menu.translation.translation', 'slot'])->get()
        ]);
    }
    
    public function show(Request $request, $id) {
    
    } 
    
    public function create(Request $request) {
        $menus = Menu::with(['menuGroup.translation', 'translation'])->get()->map(function($value) {
            return [$value->id => $value->menuGroup->translation->name.' - '.$value->translation->name];
        })->all()[0];
        $slots = Slot::pluck('name', 'id');

        return view('admin.menu.menu_has_slot.create-edit', compact('menus', 'slots'));
    } 
    
    public function store(Request $request) {
        $menuHasSlot = MenuHasSlot::create($request->all());
        
        return back()->with('success', 'Successfully inserting Menu Slot');
    }
    
    public function edit(Request $request, $id) {
        $menuHasSlot = MenuHasSlot::find($id);
        $menus = Menu::with(['menuGroup.translation', 'translation'])->get()->map(function($value) {
            return [$value->id => $value->menuGroup->translation->name.' - '.$value->translation->name];
        })->all()[0];
        $slots = Slot::pluck('name', 'id');

        return view('admin.menu.menu_has_slot.create-edit', compact('menuHasSlot', 'menus', 'slots'));
    } 
    
    public function update(Request $request, $id) {
        $menuHasSlot = MenuHasSlot::find($id);
        $menuHasSlot->update($request->all());

        return redirect(route('menu_slot.index'))->with('success', 'Successfully updating menu slot');
    } 
    
    public function destroy(Request $request, $id) {
        $menuHasSlot = MenuHasSlot::find($id);

        $menuHasSlot->delete();

        return back()->with('success', 'Successfully deleting menu slot');
    } 
}
