<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VideoPublication;
use App\Traits\Response;
use Illuminate\Http\Request;

class VideoPublicationController extends Controller
{
    use Response;

    public function index(Request $request) {
        return $this->success(body: [
            'publications' => VideoPublication::with(['translation', 'admin:id,name'])->get()
        ]);
    }
}
