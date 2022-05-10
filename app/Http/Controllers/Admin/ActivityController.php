<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index() {
        $activity = Activity::all();
        $categories = ActivityCategory::with(['translations'])->get();
        $category = array();

        foreach($categories as $cat) {
            $category[$cat->id] = $cat->translations;
        }

        return view('admin.activity.index', compact('activity', 'category'));
    }

    public function show(Request $request, Activity $activity) {
        return view('admin.activity.show', [
            'activity' => $activity
        ]);
    }

    public function create(Request $request) {
        return view('admin.activity.create-edit');
    }

    public function store(Request $request) {
        // return $request;
        $request->validate([
            'title' => 'required',
            'activity_category_id' => 'required',
            'translation_id' => 'required',
            'embed' => 'required',
        ],[
            'title.required' => 'Title is needed',
            'activity_category_id.required' => 'Activity Category is needed',
            'translation_id.required'=> 'Language is needed',
            'embed' => 'Embed is needed'
        ]);
        $type = $request->hasFile('embed') ? 'FILE' : 'LINK';
        $file = $request->hasFile('embed') ? json_encode($request->file('embed')->storePublicly('activity')) : $request->embed;

        $activity = Activity::create(array_merge($request->toArray(), [
            'embed' => $file,
            'type' => $type
        ]));

        $activity->translation()->create($request->toArray());

        return redirect(route('activity.edit', $activity->id))->with('success', 'Success inserting activity');
    }

    public function edit(Request $request, Activity $activity) {
        $activity->load(['translation']);

        return view('admin.activity.create-edit', [
            'activity' => $activity
        ]);
    }

    public function update(Request $request, Activity $activity) {
        $request->validate([
            'title' => 'required',
            'activity_category_id' => 'required',
            'translation_id' => 'required',
            'embed' => 'sometimes',
        ],[
            'title.required' => 'Title is needed',
            'activity_category_id.required' => 'Activity Category is needed',
            'translation_id.required'=> 'Language is needed',
        ]);

        $type = $request->file('embed') ? 'FILE' : 'LINK';
        $file = $request->file('embed') ? json_encode($request->file('embed')->storePublicly('activity')) : $request->embed;

        $activity->update(array_merge($request->toArray(), [
            'embed' => $file,
            'type' => $type
        ]));

        $activity->translation()->updateOrCreate([
            'activity_id' => $activity->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('activity.index'))->with('success', 'Success updating activity');
    }

    public function destroy(Request $request, Activity $activity) {
        $activity->delete();

        return redirect(route('activity.index'))->with('success', 'Success deleting activity');
    }
}
