<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Traits\Response;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use Response;

    public function index(Request $request) {
        $activities = Activity::with(['translation', 'category.translation'])->when($request->get('activity_category_id'), function($query) use ($request) {
            $query->where('activity_category_id', $request->get('activity_category_id'));
        })->get();

        return $this->success(body: [
            'activities' => $activities
        ]);
    }
}
