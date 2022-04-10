<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EventController extends Controller
{
    use Response;

    public function categories(Request $request) {
        $categories = EventCategory::with('translation')->get();

        return $this->success(body: [
            'categories' => $categories
        ]);
    }

    public function home(Request $request) {
        $events = Event::with(['category.translation'])->with('translation')->where('date', '>=', date('Y-m-d'))->orderBy('date', 'desc')->get();
        
        return $this->success(body: [
            'events' => $events
        ]);
    }
}
