<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request) {
        $events = Event::with(['translations', 'category.translations'])->get();

        return view('admin.event.index', compact('events'));
    }

    public function show(Request $request, $id) {

    }

    public function create(Request $request) {
        $categories = EventCategory::with('translation')->get()->pluck('translation.name', 'id');

        return view('admin.event.create-edit', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'event_category_id' => 'required',
            'speaker_name' => 'required',
            'speaker_title' => 'required',
            'title' => 'required',
            'description' => 'required',
            'embed' => 'required',
            'link' => 'required',
            'location' => 'required',
            'date' => 'required',
            'start_at' => 'required',
            'end_at' => 'required'
        ], [
            'event_category_id.required' => 'Event Category Dibutuhkan',
            'speaker_name.required' => 'Speaker Name Dibutuhkan',
            'speaker_title.required' => 'Speaker Title Dibutuhkan',
            'title.required' => 'Titel Dibutuhkan',
            'description.required' => 'Description Dibutuhkan',
            'embed.required' => 'File Embed Dibutuhkan',
            'link.required' => 'Link Dibutuhkan',
            'location.required' => 'Location Dibutuhkan',
            'date.required' => 'Date Dibutuhkan',
            'start_at.required' => 'Start Dibutuhkan',
            'end_at.required' => 'End  Dibutuhkan'
        ]);

        $embed = $request->hasFile('embed');

        if($embed) {
            $embed = $request->file('embed')->storePublicly('event');
        } else {
            $embed = null;
        }

        $event = Event::create(array_merge($request->all(), [
            'embed' => $embed,
        ]));

        $event->translation()->create($request->all());

        return redirect(route('event.edit', $event->id))->with('success', 'Successfully adding event');
    }

    public function edit(Request $request, $id) {
        $event = Event::with(['translations', 'category.translations'])->find($id);
        $categories = EventCategory::with('translation')->get()->pluck('translation.name', 'id');

        return view('admin.event.create-edit', [
            'event' => $event,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'event_category_id' => 'required',
            'speaker_name' => 'required',
            'speaker_title' => 'required',
            'title' => 'required',
            'description' => 'required',
            'embed' => 'required',
            'link' => 'required',
            'location' => 'required',
            'date' => 'required',
            'start_at' => 'required',
            'end_at' => 'required'
        ], [
            'event_category_id.required' => 'Event Category Dibutuhkan',
            'speaker_name.required' => 'Speaker Name Dibutuhkan',
            'speaker_title.required' => 'Speaker Title Dibutuhkan',
            'title.required' => 'Titel Dibutuhkan',
            'description.required' => 'Description Dibutuhkan',
            'embed.required' => 'File Embed Dibutuhkan',
            'link.required' => 'Link Dibutuhkan',
            'location.required' => 'Location Dibutuhkan',
            'date.required' => 'Date Dibutuhkan',
            'start_at.required' => 'Start Dibutuhkan',
            'end_at.required' => 'End  Dibutuhkan'
        ]);

        $event = Event::with(['translations', 'category.translations'])->find($id);

        $embed = $request->hasFile('embed');

        if($embed) {
            $embed = $request->file('embed')->storePublicly('event');
        }else {
            $embed = $event->embed;
        }

        $event->update(array_merge($request->all(), [
            'embed' => $embed
        ]));

        $event->translation()->updateOrCreate([
            'event_id' => $event->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('event.index'))->with('success', 'Successfully adding event');
    }

    public function destroy(Request $request, $id) {
        $event = Event::find($id);

        $event->delete();

        return back()->with('success', 'Successfully deleting event');
    }

}
