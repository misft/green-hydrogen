<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Spot;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getContent($translation_code, $menu_id) {
        $data = array();
        
        $spots = Spot::with(['content'])
                            ->where('section_id', $menu_id)
                            ->whereHas('translation', function ($query) use ($translation_code){
                                return $query->where('code', '=', $translation_code);
                            })->orderBy('order','ASC')->get();
        
        foreach($spots as $spot){
            $data = $spot->content;
            $temp = array();
            $currentPosition = "";
            $lastPosition = "";
            $index = 0;
            foreach($data as $item){
                $currentPosition = $item->positions;
                if($currentPosition != $lastPosition){
                    $index = 0;
                }
                $temp[$item->positions.'_'.$item->name.'_'.++$index] = $item->content;
                $lastPosition = $currentPosition;
            }
            unset($spot->content);
            $spot->content = $temp;
            // $spot->content = 
        }

        return $spots;
    }
}
