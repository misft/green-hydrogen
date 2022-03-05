<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EngagedUser;
use App\Traits\Response;
use Illuminate\Http\Request;

class EngagedUserController extends Controller
{
    use Response;

    public function store(Request $request) {
        $user = EngagedUser::create($request->except('is_answered'));

        return $this->success(message: __('engaged_user.success_created'), body: [
            'user' => $user
        ]);
    }
}
