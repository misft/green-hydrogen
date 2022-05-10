<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SmtpConfig;
use App\Traits\Response;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    use Response;

    public function index(Request $request) {
        return $this->success(body: [
            'email' => SmtpConfig::first()->pluck('smtp_from'),
        ]);
    }
}
