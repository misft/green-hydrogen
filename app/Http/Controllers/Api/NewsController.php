<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Setting;
use App\Traits\Response;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use Response;

    public function home(Request $request) {
        $reqCat = $request->get('news_category_id') ?? Setting::whereParams('NEWSCAT')->first()->value;
        $news = News::with(['translation', 'category.translation', 'admin:id,name'])->when($request->get('news_category_id'), function($query) use ($request) {
            $query->where('news_category_id', $request->get('news_category_id'));
        })->when($request->get('name') || $request->get('description'), function($query) use ($request) {
                $query->whereHas('translation', function($query) use ($request) {
                    $query->where('name', 'ilike', "%{$request->get('name')}%")->where('description', 'ilike', "%{$request->get('description')}%");
                });
            })->orderBy('created_at', 'desc')
            ->get();

        $latests = News::with('translation', 'category.translation', 'admin:id,name')->when( $reqCat , function($query) use ($reqCat) {
            $query->where('news_category_id', $reqCat);
        })->orderBy('created_at', 'desc')->limit(3)->get();
        $categories = NewsCategory::with('translation')->get();

        return $this->success(body: compact('news', 'categories', 'latests'));
    }

    public function carousel(Request $request) {
        $news = News::with(['translation', 'category.translation', 'admin:id,name'])->when($request->get('news_category_id'), function($query) use ($request) {
                $query->where('news_category_id', $request->get('news_category_id'));
            })->when($request->get('name') || $request->get('description'), function($query) use ($request) {
                $query->whereHas('translation', function($query) use ($request) {
                    $query->where('name', 'ilike', "%{$request->get('name')}%")->where('description', 'ilike', "%{$request->get('description')}%");
                });
            })->orderBy('created_at', 'desc')
            ->paginate(3);

        return $this->success(body: compact('news'));
    }

    public function show($id) {
        $news = News::with(['translation', 'category.translation', 'admin:id,name'])->find($id);

        return $this->success(body: compact('news'));
    }
}
