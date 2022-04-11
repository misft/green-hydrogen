<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Traits\Response;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    use Response;

    public function index() {
        return $this->success(body: [
            'regions' => Region::select('id', 'name')->get() 
        ]);
    }
}
