<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActivityCategory;
use App\Traits\Response;
use Illuminate\Http\Request;

class ActivityCategoryController extends Controller
{
    use Response;

    public function index() {
        $categories = ActivityCategory::with('translation')->all();        
    }
}
