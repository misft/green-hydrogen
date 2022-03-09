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
        $event = Event::create(array_merge($request->all(), [
            'embed' => $request->get('embed_type') == 'LINK' ? $request->get('embed') : $request->file('embed')->storePublicly('event')
        ]));
        
        $event->translation()->create($request->all());

        return redirect('event.index')->with('success', 'Successfully adding event');
    } 
    
    public function edit(Request $request, $id) {
        $event = Event::with(['translations', 'category.translations'])->find($id);
        $categories = EventCategory::with('translations')->get();
        
        return view('admin.event.create-edit', [
            'event' => $event,
            'categories' => $categories
        ]);
    } 
    
    public function update(Request $request, $id) {
        $event = Event::with(['translations', 'category.translations'])->find($id);
        
        $embed = $request->get('embed') ?? $request->file('embed');

        $event->update(array_merge($request->all(), [
            'embed' => $request->get('embed_type') == 'LINK' ? $request->get('embed') : (!$embed ?: $request->file('embed')->storePublicly('event'))
        ]));
        
        $event->translation()->create($request->all());

        return redirect('event.index')->with('success', 'Successfully adding event');
    } 
    
    public function destroy(Request $request, $id) {
        $event = Event::find($id);

        $event->delete();

        return back()->with('success', 'Successfully deleting event');
    } 
    
}
