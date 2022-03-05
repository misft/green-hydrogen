<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactSupport;
use App\Traits\Response;
use Illuminate\Http\Request;

class ContactSupportController extends Controller
{
    use Response;

    public function index() {
        $contacts = ContactSupport::all();

        return $this->success(body: [
            'contacts' => $contacts
        ]);
    }
}
