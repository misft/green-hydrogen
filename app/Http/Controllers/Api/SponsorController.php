<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SponsorGroup;
use App\Traits\Response;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    use Response;
    
    public function index(Request $request) {
        $sponsors = SponsorGroup::with('sponsors')->get();

        return $this->success(body: [
            'sponsors'=> $sponsors
        ]);
    }
}
