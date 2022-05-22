<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyDirectoryTopic;
use App\Traits\Response;
use Illuminate\Http\Request;

class CompanyDirectoryTopicController extends Controller
{

    use Response;

    public function __construct()
    {
        $this->middleware('is_verify_email')->except([
            'getListAllCategory'
        ]);
    }

    public function getListAllCategory(){
        return $this->success(body: [
            'topics' => CompanyDirectoryTopic::with('translation')->get()
        ]);
    }
}
