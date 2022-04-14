<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request) {
        $activity = Activity::with(['translation', 'category'])->get();

        return view('admin.activity.index', [
            'activity' => $activity
        ]);
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
        $request->validate([
            'title' => 'required',
            'activity_category_id' => 'required',
            'translation_id' => 'required',
            'embed' => 'required',
        ]);
        $type = $request->file('embed') ? 'FILE' : 'LINK';
        $file = $request->file('embed') ? json_encode($request->file('embed')->storePublicly('activity')) : $request->embed;

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
