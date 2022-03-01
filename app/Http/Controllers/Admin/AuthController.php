<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request) {
        $user = Admin::email($request->email)->first();

        if (empty($user)) return redirect(route('login'))->with([
            'error'=>'User not found'
        ]);

        $auth = Auth::guard('web')->attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password')
        ], $request->get('remember'));

        if($auth) {
            return redirect(route('menu.index'));
        }

        return redirect(route('login'))->with([
            'error'=>'Email and password not match'
        ])->withInput();
    }
}
