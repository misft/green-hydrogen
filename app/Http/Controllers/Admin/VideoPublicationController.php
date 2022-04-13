<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoPublicationController extends Controller
{
    public function index(Request $request) {
        $publications = VideoPublication::with(['translations', 'admin'])->get();

        return view('admin.video-publication.index', compact('publications'));
    } 
    
    public function show(Request $request, $id) {
    
    } 
    
    public function create(Request $request) {
        return view('admin.video-publication.create-edit');
    } 
    
    public function store(Request $request) {
        $data = array_merge($request->all(), [
            'admin_id' => Auth::guard('web')->id()
        ]);

        $publication = VideoPublication::create($data);

        $publication->translations()->create($data);

        return redirect(route('video_publication.edit', $publication->id))->with('success', 'Successfully adding video publication');
    } 
    
    public function edit(Request $request, $id) {
        $publication = VideoPublication::with('translations')->find($id);

        return view('admin.video-publication.create-edit', compact('publication'));
    } 
    
    public function update(Request $request, $id) {
        $publication = VideoPublication::find($id);

        $data = array_merge($request->all(), [
            'admin_id' => Auth::guard('web')->id()
        ]);
    
        $publication->update($data);
    
        $publication->translations()->updateOrCreate([
            'video_publication_id' => $publication->id,
            'translation_id' => $request->get('translation_id')
        ], $data);
    
        return redirect(route('video_publication.index'))->with('success', 'Successfully updating video publication');
    } 
    
    public function destroy(Request $request, $id) {
    
    } 
    
}
