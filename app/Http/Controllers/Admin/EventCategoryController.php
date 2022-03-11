<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index(Request $request) {
        $categories = EventCategory::all();

        return view('admin.event-category.index', [
            'categories' => $categories
        ]);
    } 
    
    public function show(Request $request, $id) {
    
    } 
    
    public function create(Request $request) {
        return view('admin.event-category.create-edit');
    } 
    
    public function store(Request $request) {
        $category = EventCategory::create();       
        $category->translations()->updateOrCreate([
            'event_category_id' => $category->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return back()->with('success', 'Successfully adding event category');
    } 
    
    public function edit(Request $request, $id) {
        $category = EventCategory::with('translations')->find($id);

        return view('admin.event-category.create-edit', [
            'category' => $category
        ]);
    } 
    
    public function update(Request $request, $id) {
        $category = EventCategory::find($id);       
        $category->translations()->updateOrCreate([
            'event_category_id' => $category->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return back()->with('success', 'Successfully updating event category');
    } 
    
    public function destroy(Request $request, $id) {
        EventCategory::with('translations')->find($id)->delete();

        return back()->with('success', 'Successfully deleting event');
    } 
    
}
