<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request) {
        $news = News::with(['translation', 'category'])->get();

        return view('admin.news.index', [
            'news' => $news
        ]);
    }
    
    public function show(Request $request, News $news) {
        return view('admin.news.show', [
            'news' => $news
        ]);
    } 
    
    public function create(Request $request) {
        return view('admin.news.create-edit');
    } 
    
    public function store(Request $request) {
        $file = $request->file('embed') ? json_encode($request->file('embed')->storePublicly('public/news')) : "";

        $news = News::create(array_merge($request->toArray(), [
            'embed' => $file
        ]));

        $news->translation()->create($request->toArray());

        return redirect(route('news.index'))->with('success', 'Success inserting news');
    } 
    
    public function edit(Request $request, News $news) {
        $news->load(['translation']);

        return view('admin.news.create-edit', [
            'news' => $news
        ]);
    } 
    
    public function update(Request $request, News $news) {
        $file = $request->file('embed') ? json_encode($request->file('embed')->storePublicly('public/news')) : $news->embed;

        $news->update(array_merge($request->toArray(), [
            'embed' => $file
        ]));

        $news->translation()->updateOrCreate([
            'news_id' => $news->id,
            'translation_id' => $request->get('translation_id')
        ], $request->all());

        return redirect(route('news.index'))->with('success', 'Success updating news');
    } 
    
    public function destroy(Request $request, News $news) {
        $news->delete();

        return redirect(route('news.index'))->with('success', 'Success deleting news');
    } 
    
    
}
