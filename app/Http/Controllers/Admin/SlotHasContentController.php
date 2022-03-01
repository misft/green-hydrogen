<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentType;
use App\Models\Menu;
use App\Models\MenuHasSlot;
use App\Models\Slot;
use App\Models\SlotHasContent;
use App\Models\SlotHasContentTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlotHasContentController extends Controller
{
    public function index(Request $request) {
        return view('admin.menu.slot_has_content.index', [
            'items' => SlotHasContent::with(['translation', 'menuSlot'])->get()
        ]);
    }

    public function destroy(Request $request, $id) {

    }

    public function create(Request $request) {
        $contentTypes = ContentType::pluck('name', 'id');
        $menus = Menu::with('translation')->get()->pluck(
            'translation.name',
            'id'
        );
        $slots = Slot::pluck('name', 'id');

        return view('admin.menu.slot_has_content.create-edit', [
            'contentTypes' => $contentTypes,
            'menus' => $menus,
            'slots' => $slots
        ]);
    }

    public function store(Request $request) {
        $menuHasSlot = MenuHasSlot::updateOrCreate($request->only(['menu_id', 'slot_id']), $request->only(['menu_id', 'slot_id']));

        DB::beginTransaction();
        $slotHasContent = SlotHasContent::updateOrCreate([
            'menu_has_slot_id' => $menuHasSlot->id,
            'content_type_id' => $request->get('content_type_id')
        ], $request->except('menu_id', 'slot_id', 'translation_id'));

        $slotHasContentTranslation = SlotHasContentTranslation::updateOrCreate([
            'slot_has_content_id' => $slotHasContent->id,
            'translation_id' => $request->get('translation_id')
        ], array_merge(
            $request->only('translation_id' ),
            [
                'content' => "",
                'slot_has_content_id' => $slotHasContent->id
            ]
        ));
        DB::commit();

        return redirect(route('slot_content.edit', $slotHasContent->id))->with('success', 'Data updated successfully');
    }

    public function edit(Request $request, $id) {
        $slot_content = SlotHasContent::with(['translation.translation', 'contentType'])->find($id);
        $contentTypes = ContentType::pluck('name', 'id');
        $menus = Menu::with('translation')->get()->pluck(
            'translation.name',
            'id'
        );
        $slots = Slot::pluck('name', 'id');

        return view('admin.menu.slot_has_content.create-edit', [
            'slot_content' => $slot_content,
            'contentTypes' => $contentTypes,
            'menus' => $menus,
            'slots' => $slots,
            'slotContentTranslation' => $slot_content->translations
        ]);
    }

    public function update(Request $request, $id) {
        $slotHasContent = SlotHasContent::find($id);
        $menuHasSlot = MenuHasSlot::find($slotHasContent->menu_has_slot_id);

        DB::beginTransaction();
        $slotHasContent = SlotHasContent::updateOrCreate([
            'menu_has_slot_id' => $menuHasSlot->id,
            'content_type_id' => $request->get('content_type_id')
        ], $request->except('menu_id', 'slot_id', 'translation_id', 'content'));

        $slotHasContentTranslation = SlotHasContentTranslation::updateOrCreate([
            'slot_has_content_id' => $slotHasContent->id,
            'translation_id' => $request->get('translation_id')
        ], array_merge(
            $request->only('translation_id' ),
            [
                'content' => json_encode($request->get('content')),
                'slot_has_content_id' => $slotHasContent->id
            ]
        ));
        DB::commit();

        return back()->with('success', 'Data updated successfully');
    }

    public function show(SlotHasContent $id) {
        
    }
}
