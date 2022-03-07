<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuGroup;
use App\Traits\Response;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{
    use Response;

    public function index() {
        $menu_groups = MenuGroup::with('menus.translation')->get();

        return $this->success(body: [
            'menu_groups' => $menu_groups
        ]);
    }

    public function show(MenuGroup $menu_group) {
        $menu_group = $menu_group->with('menus.translation')->first();

        return $this->success(body: [
            'menu_group' => $menu_group
        ]);
    }
}
