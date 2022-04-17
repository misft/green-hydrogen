<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Spot;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public $dropdownTypeValue;

    public function __construct()
    {
        $this->dropdownTypeValue = [
            [
                'id' => 'title',
                'value' => 'Title'
            ],
            [
                'id' => 'description',
                'value' => 'Description'
            ],
            [
                'id' => 'link',
                'value' => 'Link'
            ],
            [
                'id' => 'button',
                'value' => 'Button'
            ],
            [
                'id' => 'video',
                'value' => 'Video'
            ],
            [
                'id' => 'video_link',
                'value' => 'Video link'
            ],
            [
                'id' => 'picture',
                'value' => 'Picture'
            ],
        ];
    }

    public function index(){
        $contents = Content::with(['translation'])->get();
        $data = array();
        $dataID = null;

        foreach($contents as $item){
            if($item->id % 2 == 1){
                $dataID = $item;
            } else if($item->id % 2 == 0){
                $data[] = (object)[
                    'id' => $item->id,
                    'name' => $item->name,
                    'translation' => [
                        (object)[
                            'language' => 'id',
                            'content' => $dataID->content
                        ],
                        (object)[
                            'language' => 'en',
                            'content' => $item->content
                        ]
                        
                    ],
                    'spot' => (object)[
                        'name' => $item->spot->name
                    ],
                    'types' => $item->types,
                    'positions' => $item->positions,
                    'order' => $item->order
                ];
            }
        }
        // return $data;

        return view('admin.menu.content.index', [
            'contents' => (object)$data,
        ]);
    }

    public function create() {
        $spots = Spot::with('section')->where('translation_id', 2)->orderBy('section_id', 'ASC')->get();
        return view('admin.menu.content.create-edit', [
            'spots' => $spots,
            'dropdownTypeValues' => $this->dropdownTypeValue,
        ]);
    }

    public function store(Request $request) {
        if($request->name == "text" || $request->name == "description" ){
            
        }

        $contents = Content::where('slot_id', $request->slot)->get();


        $data = [
            [
                'translation_id' => 1,
                'spot_id' => $request->slot-1,
                'name' => $request->name,
                'types' => 'text',
                'positions' => $request->positions,
                'order' => $level,
                'content' => $request->content,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'translation_id' => 1,
                'spot_id' => $request->slot-1,
                'name' => $request->name,
                'types' => 'text',
                'positions' => $request->positions,
                'order' => $level,
                'content' => $request->content,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
    }

    public function edit($id) {
        $contentID = Content::where('id', $id-1)->first();
        $contentEN = Content::where('id', $id)->first();
        $menuChoosed = $contentEN->spot_id;
        $anotherContents = Content::where('translation_id', 2)->where('spot_id',$menuChoosed)->where('id', '<>', $id)
            ->orderBy('order', 'ASC')->get();

        return view('admin.menu.content.create-edit', [
            'contentID' => $contentID,
            'contentEN' => $contentEN,
            'anotherContents' => $anotherContents,
            'menuChoosed' => $menuChoosed,
            'dropdownTypeValues' => $this->dropdownTypeValue,
        ]);
    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
