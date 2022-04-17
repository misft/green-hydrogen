<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Slot;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        // tidak boleh di sorting lagi
        $slots = Spot::with(['translation'])->get();
        $data = array();
        $dataID = null;

        foreach($slots as $item){
            if($item->id % 2 == 1){
                $dataID = $item;
            } else if($item->id % 2 == 0){
                $data[] = (object)[
                    'id' => $item->id,
                    'translation' => [
                        (object)[
                            'language' => 'id',
                            'name' => $dataID->name
                        ],
                        (object)[
                            'language' => 'en',
                            'name' => $item->name
                        ]
                        
                    ],
                    'menu' => (object)[
                        'name' => $item->section->name
                    ],
                    'order' => $item->order
                ];
            }
        }

        return view('admin.menu.slot.index', [
            'slots' => $data,
        ]);
    }

    public function create() {
        $menus = Section::where('translation_id', 2)->get();
        return view('admin.menu.slot.create-edit', [
            'menus' => $menus,
        ]);
    }

    public function store(Request $request) {
        $level = 0;
        $listOfLevel = Spot::select('order')->where('section_id', $request->menu)->get();
        if(count($listOfLevel) > 0){
            $data = array();
            foreach($listOfLevel as $item) {
                $data[] = $item->order;
            }

            sort($data);
            $level = end($data) + 1;
        }

        $data = [
            [
                'translation_id' => 1,
                'name' => $request->name_id,
                'section_id' => $request->menu-1,
                'order' => $level,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'translation_id' => 2,
                'name' => $request->name_en,
                'section_id' => $request->menu,
                'order' => $level,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        Spot::insert($data);
        return redirect()->route('slot.index')->with('success', 'Successfully adding slot');
    }

    public function edit($id) {
        $menus = Section::where('translation_id', 2)->where('id','<>',$id)->get();
        $slotID = Spot::where('id', $id-1)->first();
        $slotEN = Spot::where('id', $id)->first();
        $menuChoosed = $slotEN->section_id;
        $anotherSlot = Spot::where('translation_id', 2)->where('section_id',$menuChoosed)->where('id', '<>', $id)->get();

        return view('admin.menu.slot.create-edit', [
            'menus' => $menus,
            'slotID' => $slotID,
            'slotEN' => $slotEN,
            'anotherSlot' => $anotherSlot,
            'menuChoosed' => $menuChoosed
        ]);
    }

    public function update(Request $request, $id){
        // return $request;
        $dataID = array();
        $dataEN = array();
        if($request->replaceSlot == null){
            // return 1;
            $dataID = [
                'name' => $request->name_id,
                'updated_at' => now()
            ];
            $dataEN = [
                'name' => $request->name_en,
                'updated_at' => now()
            ];

            Spot::where('id', $id-1)->update($dataID);
            Spot::where('id', $id)->update($dataEN);
        } else {
            // return 0;
            $slotID1 = Spot::where('id',$id-1)->first();
            $slotEN1 = Spot::where('id',$id)->first();

            $slotID2 = Spot::where('id',$request->replaceSlot-1)->first();
            $slotEN2 = Spot::where('id',$request->replaceSlot)->first();
    
            $dataID = [
                'name' => $request->name_id,
                'order' => $slotID2->order,
                'updated_at' => now()
            ];
            $dataEN = [
                'name' => $request->name_en,
                'order' => $slotEN2->order,
                'updated_at' => now()
            ];

            $dataID2 = [
                'order' => $slotID1->order,
                'updated_at' => now()
            ];
            $dataEN2 = [
                'order' => $slotEN1->order,
                'updated_at' => now()
            ];

            Spot::where('id', $id-1)->update($dataID);
            Spot::where('id', $id)->update($dataEN);

            Spot::where('id', $request->replaceSlot-1)->update($dataID2);
            Spot::where('id', $request->replaceSlot)->update($dataEN2);
        }

        return redirect()->route('slot.index')->with('success', 'Successfully updating slot');
    }

    public function destroy($id) {
        Spot::where('id',$id-1)->delete();
        Spot::where('id',$id)->delete();

        return redirect()->route('slot.index')->with('success', 'Successfully deleting slot');
    }
}
