<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function ordered_menu($array,$parent_id = 0)
    {
        $temp_array = array();
        foreach($array as $element)
        {
            if($element->parent == $parent_id)
            {
                $element['subs'] = $this->ordered_menu($array,$element->id);
                $temp_array[] = $element;
            }
        }

        return $temp_array;
    }

    public function getMenu($translation_code){
        $menus = Section::whereHas('translation', function ($query) use ($translation_code){
            return $query->where('code', '=', $translation_code);
        })->whereActive(1)->orderBy('parent', 'ASC')->orderBy('order','ASC')->get();

        return $this->ordered_menu($menus);
    }
}
