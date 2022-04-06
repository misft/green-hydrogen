<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;
use App\Traits\Response;

class SocialMediaLinkController extends Controller
{
    use Response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SocialMediaLink::all();
        return $this->success(body: [
            'socialmedia' => $data
        ]);

    }
}
