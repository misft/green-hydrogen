<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\NewsCategoryTranslation;
use App\Models\Setting;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index(Request $request) {
        $newsCategory = NewsCategory::all();

        return view('admin.news_category.index', [
            'newsCategory' => $newsCategory,
        ]);
    }

    public function show(Request $request, NewsCategory $newsCategory) {
        return view('admin.news_category.show', [
            'newsCategory' => $newsCategory
        ]);
    }

    public function create(Request $request) {
        return view('admin.news_category.create-edit');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name Dibutuhkan'
        ]);

        $newsCategory = NewsCategory::create($request->all());
        $newsCategory->translation()->create($request->all());

        return redirect(route('news_category.edit', $newsCategory->id))->with('success', 'Success inserting news category');
    }

    public function edit(Request $request, NewsCategory $newsCategory) {
        // return $newsCategory->translation;
        $newsCategory->load(['translation']);

        return view('admin.news_category.create-edit', [
            'newsCategory' => $newsCategory
        ]);
    }

    public function update(Request $request, NewsCategory $newsCategory) {

        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name Dibutuhkan'
        ]);

        $newsCategory->update($request->all());
        $newsCategory->translation()->updateOrCreate([
            'translation_id' => $request->get('translation_id'),
            'news_category_id' => $newsCategory->id
        ], $request->all());

        return redirect(route('news_category.index'))->with('success', 'Success updating news category');
    }

    public function destroy(Request $request, NewsCategory $newsCategory) {
        $newsCategory->delete();

        return redirect(route('news_category.index'))->with('success', 'Success deleting news category');
    }

    public function sidebar()
    {
        $newsCategory = NewsCategory::with(['translation'])->get();
        $settSA = Setting::whereParams('NEWSCATSA')->first()->value ?? null;
        $settSB = Setting::whereParams('NEWSCATSB')->first()->value ?? null;
        $categorySA = NewsCategoryTranslation::whereNewsCategoryId($settSA)->first()->name ?? 'Belum Dipilih';
        $categorySB = NewsCategoryTranslation::whereNewsCategoryId($settSB)->first()->name ?? 'Belum Dipilih';

        return view('admin.news_category.sidebar', [
            'newsCategory' => $newsCategory,
            'categorySA' => $categorySA,
            'categorySB' => $categorySB,
            'settSA' => $settSA,
            'settSB' => $settSB
        ]);
    }

}
