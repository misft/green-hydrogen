<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Traits\Response;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    use Response;
    
    public function index() {
        $media = SocialMedia::all();

        return $this->success(body: [
            'media' => $media
        ]);
    }
}
