<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request) {
        $menus = Menu::with(['translation', 'menuGroup.translation'])->get();

        return view('admin.menu.index', [
            'menus' => $menus
        ]);
    }

    public function create() {
        return view('admin.menu.create');
    }

    public function store(Request $request) {
        $menu = Menu::create($request->all());

        return back()->with([
            'success' => 'Data is successfully created'
        ]);
    }

    public function edit(Request $request, $id) {
        $menu = Menu::find($id);

        return view('admin.menu.edit', [
            'menu' => $menu
        ]);
    }

    public function update(Request $request, $id) {
        $menu = Menu::find($id);

        $menu->update($request->all());

        return back()->with([
            'success' => 'Data is successfully created'
        ]);
    }
}
