<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Traits\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use Response;

    public function index(Request $request) {
        $menus = Menu::with('translation')
            ->when($request->get('menu_group_id'), function($query) use($request) {
                $query->where('menu_group_id', $request->get('menu_group_id'));
            })
            ->get();

        return $this->success(200, body: [
            'menus' => $menus
        ]);
    }

    public function show(Menu $menu) {
        $menu = $menu->with('translation')
            ->with(['slots.slot', 'slots.content.contentType:id,name', 'slots.content'])
            ->first();

        return $this->success(200, body: [
            'menu' => $menu
        ]);
    }
}
