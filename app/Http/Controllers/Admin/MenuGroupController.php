<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{
    public function index(Request $request) {
        $groups = MenuGroup::all();
        
        return view('admin.menu.group.index', [
            'groups' => $groups
        ]);
    } 
    
    public function create(Request $request) {
        return view('admin.menu.group.create-edit');
    } 
    
    public function store(Request $request) {
        $menuGroup = MenuGroup::create();
        $menuGroup->translations()->updateOrCreate([
            'menu_group_id' => $menuGroup->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('menu_group.index'))->with('success', 'Successfully adding menug groups');
    } 
    
    public function edit(Request $request, $id) {
        $menuGroup = MenuGroup::find($id);

        return view('admin.menu.group.create-edit', [
            'menuGroup' => $menuGroup
        ]);
    } 
    
    public function update(Request $request, $id) {
        $menuGroup = MenuGroup::with('translation')->find($id);
        $menuGroup->translations()->updateOrCreate([
            'menu_group_id' => $menuGroup->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('menu_group.index'))->with('success', 'Successfully adding menug groups');
    } 
    
    public function destroy(Request $request, $id) {
        $menuGroup = MenuGroup::find($id)->delete();

        return back()->with('success', 'Successfully deleting menu group');
    } 
    
}
