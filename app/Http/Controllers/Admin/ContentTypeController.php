<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    public function index() {
        $contentTypes = ContentType::all();

        return view('admin.menu.content_type.index', [
            'items'=>$contentTypes
        ]);
    }
    
    public function show(Request $request, $id) {
    
    } 
    
    public function create(Request $request) {
        return view('admin.menu.content_type.create-edit');
    } 
    
    public function store(Request $request) {
    
    } 
    
    public function edit(Request $request, $id) {
        $contentType = ContentType::find($id);

        return view('admin.menu.content_type.create-edit', compact('contentType'));
    } 
    
    public function update(Request $request, $id) {
        $contentType = ContentType::find($id);

        $contentType->update($request->all());

        return redirect(route('content_type.index'))->with('success', 'Successfully update content type');
    } 
    
    public function destroy(Request $request, $id) {
        $contentType = ContentType::find($id);

        $contentType->delete();

        return back()->with('success', 'Successfully update content type');
    } 
    
}
