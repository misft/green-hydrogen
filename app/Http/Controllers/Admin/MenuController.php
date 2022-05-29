<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuGroup;
use App\Models\MenuGroupTranslation;
use App\Models\MenuTranslation;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request) {
        $menus = Menu::with(['translation', 'menuGroup.translation'])->get();
        $lock_menu = $this->lock_menu(1);
        return view('admin.menu.index', [
            'menus' => $menus,
            'lockmenu' => $lock_menu
        ]);
    }

    public function create() {
        $groups = MenuGroupTranslation::groupBy('menu_group_id')->pluck('name', 'menu_group_id as id');
        return view('admin.menu.create-edit', [
            'groups' => $groups
        ]);
    }

    public function store(Request $request) {
        $menu = Menu::create($request->all());
        MenuTranslation::updateOrCreate([
            'translation_id' => $request->get('translation_id'),
            'menu_id' => $menu->id
        ], $request->all());

        return back()->with([
            'success' => 'Data is successfully created'
        ]);
    }

    public function edit(Request $request, $id) {
        $groups = MenuGroupTranslation::groupBy('menu_group_id')->pluck('name', 'menu_group_id as id');
        $menu = Menu::find($id);

        return view('admin.menu.create-edit', [
            'menu' => $menu,
            'groups' => $groups
        ]);
    }

    public function update(Request $request, $id) {
        $menu = Menu::find($id);

        $menu->update($request->only('menu_group_id'));

        $menu->translations()->updateOrCreate([
            'translation_id' => $request->get('translation_id'),
            'menu_id' => $menu->id
        ], $request->all());

        return back()->with([
            'success' => 'Data is successfully created'
        ]);
    }

    public function destroy(Request $request, $id) {
        $menu = Menu::find($id);

        $menu->delete();

        return back()->with([
            'success' => 'Data is successfully deleted'
        ]);
    }

    public function lock_menu($check = null){
        if ($check == null) {
            $data = Setting::whereParams('lockmenu')->first();
            if ($data == null) {
                Setting::create(['params' => 'lockmenu', 'value' => 1]);
            } else {
                Setting::updateOrCreate(['params' => 'lockmenu'], ['value' => $data->value == 1 ? 0 : 1 ]);
            }

            return back()->with(['success' =>   'Update Setting Lock Menu']);
        }else{
            $data = Setting::whereParams('lockmenu')->first();
            if ($data == null) {
                Setting::create(['params' => 'lockmenu', 'value' => 1]);
            }
            return Setting::whereParams('lockmenu')->first()->value;
        }
    }
}
