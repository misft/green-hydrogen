<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'id' => 'button_link',
                'value' => 'Button Link'
            ],
            [
                'id' => 'button',
                'value' => 'Button Title'
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
            [
                'id' => 'html',
                'value' => 'HTML'
            ],
        ];
    }

    public function index(){
        $contents = Content::with(['translation'])->get();
        $data = array();
        $dataID = null;
        $lock_content = $this->lock_content(1);

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
            'lockcontent' => $lock_content
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
        $level = 0;
        $listOfLevel = Content::where('spot_id',$request->slot)->where('name',$request->name)->where('positions',$request->positions)->get();
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
                'spot_id' => $request->slot-1,
                'name' => $request->name,
                'types' => 'text',
                'positions' => $request->positions,
                'order' => $level,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'translation_id' => 2,
                'spot_id' => $request->slot,
                'name' => $request->name,
                'types' => 'text',
                'positions' => $request->positions,
                'order' => $level,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        if($request->name == "title" || $request->name == "button"){
            $data[0]["content"] = $request->content_tb_id;
            $data[1]["content"] = $request->content_tb_en;
        } else if($request->name == "description"){
            $data[0]["content"] = $request->content_d_id;
            $data[1]["content"] = $request->content_d_en;
        } else if($request->name == "html"){
            $data[0]["content"] = $request->content_html;
            $data[1]["content"] = $request->content_html;
        } else if($request->name == "link" || $request->name == "video_link" || $request->name == "button_link") {
            $data[0]["content"] = $request->content;
            $data[1]["content"] = $request->content;
        } else if($request->name == "picture" || $request->name == "video"){
            $file = $request->file('content');
            if(isset($file)){

                    if($request->name == "picture")
                        $file = $file->store('menu/picture');
                    else
                        $file = $file->store('menu/video');

                $data[0]["content"] = $file;
                $data[1]["content"] = $file;
            }
        }

        Content::insert($data);

        return redirect()->route('content.index')->with('success', 'Successfully adding content');
    }

    public function edit($id) {
        $contentID = Content::where('id', $id-1)->first();
        $contentEN = Content::where('id', $id)->first();
        $menuChoosed = $contentEN->name;
        $anotherContents = Content::where('spot_id',$contentEN->spot_id)->where('translation_id', 2)->where('name',$menuChoosed)
            ->where('id', '<>', $id)->where('positions',$contentEN->positions)
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
        // return $request;
        $dataID = [
                'updated_at' => now(),
        ];
        $dataEN = [
                'updated_at' => now(),
        ];

        if(!is_null($request->replaceContent)){
            $contentID1 = Content::where('id',$id-1)->first();
            $contentEN1 = Content::where('id',$id)->first();

            $contentID2 = Content::where('id',$request->replaceContent-1)->first();
            $contentEN2 = Content::where('id',$request->replaceContent)->first();

            $dataID["order"] = $contentID2->order;
            $dataEN["order"] = $contentEN2->order;

            $targetContentID = [
                'order' => $contentID1->order,
                'updated_at' => now(),
            ];

            $targetContentEN = [
                'order' => $contentEN1->order,
                'updated_at' => now(),
            ];

            Content::where('id', $request->replaceContent-1)->update($targetContentID);
            Content::where('id', $request->replaceContent)->update($targetContentEN);
        }

        if($request->name == "title" || $request->name == "button"){
            $dataID["content"] = $request->content_tb_id;
            $dataEN["content"] = $request->content_tb_en;
        } else if($request->name == "html"){
            $dataID["content"] = $request->content_html;
            $dataEN["content"] = $request->content_html;
        } else if($request->name == "description"){
            $dataID["content"] = $request->content_d_id;
            $dataEN["content"] = $request->content_d_en;
        }else if($request->name == "link" || $request->name == "video_link"  || $request->name == "button_link") {
            $dataID["content"] = $request->content;
            $dataEN["content"] = $request->content;
        } else if($request->name == "picture" || $request->name == "video"){
            $file = $request->file('content');
            if(isset($file)){

                $contentEN = Content::where('id',$id)->first();
                // Storage::delete('')

                    if($request->name == "picture")
                        $path = $file->storePublicly('menu/picture');
                    else
                        $path = $file->storePublicly('menu/video');

                $dataID["content"] = $path;
                $dataEN["content"] = $path;
            }
        }

        Content::where('id', $id-1)->update($dataID);
        Content::where('id', $id)->update($dataEN);

        return redirect()->route('content.index')->with('success', 'Successfully updating content');
    }

    public function destroy($id) {
        Content::where('id',$id-1)->delete();
        Content::where('id',$id)->delete();

        return redirect()->route('content.index')->with('success', 'Successfully deleting content');
    }

    public function upload_image(Request $request) {
        if($request->hasFile('file')){
            $path = $request->file('file')->storePublicly('menu/picture');
            return response()->json([
                'location' => "https://admin.hydrogen-indonesia.id/storage/".$path
            ]);
        } else {
            return response('failed',500);
        }
    }

    public function lock_content($check = null){
        if ($check == null) {
            $data = Setting::whereParams('lockcontent')->first();
            if ($data == null) {
                Setting::create(['params' => 'lockcontent', 'value' => 1]);
            } else {
                Setting::updateOrCreate(['params' => 'lockcontent'], ['value' => $data->value == 1 ? 0 : 1 ]);
            }

            return back()->with(['success' =>   'Update Setting Lock Menu']);
        }else{
            $data = Setting::whereParams('lockcontent')->first();
            if ($data == null) {
                Setting::create(['params' => 'lockcontent', 'value' => 1]);
            }
            return Setting::whereParams('lockcontent')->first()->value;
        }
    }
}
