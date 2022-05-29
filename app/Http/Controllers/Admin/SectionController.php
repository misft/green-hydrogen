<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent = array();
        $menus = Section::all();
        $data = array();
        $dataID = null;
        $lock_menu = $this->lock_menu();
        foreach($menus as $item){
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
                    'parent' => $item->parent,
                    'link' => $item->link,
                    'order' => $item->order
                ];
            }
        }

        foreach($menus as $menu){
            $parent[$menu->id] = $menu->name;
        }

        return view('admin.menu.index', [
            'menus' => $data,
            'parent' => $parent,
            'lockmenu' => $lock_menu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Section::where('translation_id', 2)->get();
        return view('admin.menu.create-edit', [
            'menus' => $menus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Algoritma menyimpan menu
     *
     * Urutan menu baru akan ditempatkan dipaling bawah secara ascending dan paling atas secara descending
     */
    public function store(Request $request)
    {
        $level = 0;
        $listOfLevel = Section::select('order')->where('parent', $request->parent)->get();
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
                'order' => $level,
                'parent' => $request->parent-1,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'translation_id' => 2,
                'name' => $request->name_en,
                'order' => $level,
                'parent' => $request->parent,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        Section::insert($data);
        return redirect()->route('menu.index')->with('success', 'Successfully adding menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Section::where('translation_id', 2)->where('id','<>',$id)->get();
        $sectionID = Section::where('id', $id-1)->first();
        $sectionEN = Section::where('id', $id)->first();
        $menuChoosed = $sectionEN->parent;
        $anotherMenus = Section::where('translation_id', 2)->where('id','<>',$id)->where('parent',$menuChoosed)->get();

        return view('admin.menu.create-edit', [
            'menus' => $menus,
            'sectionID' => $sectionID,
            'sectionEN' => $sectionEN,
            'menuChoosed' => $menuChoosed,
            'anotherMenus' => $anotherMenus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * Algoritma menyimpan menu
     *
     * Urutan menu yang parentnya diubah akan ditempatkan dipaling bawah secara ascending dan paling atas secara descending
     */
    public function update(Request $request, $id)
    {
        $dataID = array();
        $dataEN = array();
        if($request->replaceSlot == null){
            $dataID = [
                'name' => $request->name_id,
                'link' => $request->link,
                'updated_at' => now()
            ];
            $dataEN = [
                'name' => $request->name_en,
                'link' => $request->link,
                'updated_at' => now()
            ];

            Section::where('id', $id-1)->update($dataID);
            Section::where('id', $id)->update($dataEN);
        } else {
            $slotID1 = Section::where('id',$id-1)->first();
            $slotEN1 = Section::where('id',$id)->first();

            $slotID2 = Section::where('id',$request->replaceSlot-1)->first();
            $slotEN2 = Section::where('id',$request->replaceSlot)->first();

            $dataID = [
                'name' => $request->name_id,
                'order' => $slotID2->order,
                'link' => $request->link,
                'updated_at' => now()
            ];
            $dataEN = [
                'name' => $request->name_en,
                'order' => $slotEN2->order,
                'link' => $request->link,
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

            Section::where('id', $id-1)->update($dataID);
            Section::where('id', $id)->update($dataEN);

            Section::where('id', $request->replaceSlot-1)->update($dataID2);
            Section::where('id', $request->replaceSlot)->update($dataEN2);
        }

        return redirect()->route('menu.index')->with('success', 'Successfully updating menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::where('id',$id-1)->delete();
        Section::where('id',$id)->delete();

        return redirect()->route('menu.index')->with('success', 'Successfully deleting menu');
    }
    public function lock_menu(){
        $data = Setting::whereParams('lockmenu')->first();
        if ($data == null) {
            Setting::create(['params' => 'lockmenu', 'value' => 1]);
        }
        return Setting::whereParams('lockmenu')->first()->value;
    }
}

