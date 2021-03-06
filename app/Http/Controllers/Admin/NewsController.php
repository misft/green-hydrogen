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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'embed' => 'required'
        ], [
            'title.required' => 'Title Dibutuhkan',
            'description.required' => 'Description Dibutuhkan',
            'embed.required' => 'Embed Dibutuhkan'
        ]);

        $file = $request->file('embed') ? json_encode($request->file('embed')->storePublicly('news')) : "";

        $news = News::create(array_merge($request->toArray(), [
            'embed' => $file,
            'admin_id' => $request->user()->id
        ]));

        $news->translation()->create($request->toArray());

        return redirect(route('news.edit', $news->id))->with('success', 'Success inserting news');
    }

    public function edit(Request $request, News $news) {
        $news->load(['translation']);
        // dd($news);

        return view('admin.news.create-edit', [
            'news' => $news
        ]);
    }

    public function update(Request $request, News $news) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'embed' => 'sometimes'
        ], [
            'title.required' => 'Title Dibutuhkan',
            'description.required' => 'Description Dibutuhkan',
        ]);


        $file = $request->file('embed') ? json_encode($request->file('embed')->storePublicly('news')) : $news->embed;

        $news->update(array_merge($request->toArray(), [
            'embed' => $file,
            'admin_id' => $request->user()->id
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
