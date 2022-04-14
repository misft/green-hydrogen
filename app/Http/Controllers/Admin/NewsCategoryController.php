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
        // $newsCategory = NewsCategory::with(['translation'])->get();
        $newsCategory = NewsCategory::all();
      
        $category = NewsCategoryTranslation::whereNewsCategoryId(Setting::whereParams('NEWSCAT')->first()->value)->first()->name ?? 'Belum Dipilih';


        return view('admin.news_category.index', [
            'newsCategory' => $newsCategory,
            'category' => $category
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
    
}
