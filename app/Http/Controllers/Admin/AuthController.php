<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CompanyDirectory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if(!Auth::guard('web')->check()) {
            return view('admin.login');
        }

        return redirect(route('menu.index'));
    }

    public function login(Request $request) {
        Auth::logout();

        $user = Admin::email($request->email)->first();

        if (empty($user)) return back()->with([
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

    public function companyIndex(Request $request) {
        return view('admin.login');
    } 

    public function companyLogin(Request $request) {
        $user = CompanyDirectory::email($request->get('email'))->first();

        
        if (empty($user)) return back()->with([
            'error'=>'User not found'
        ]);

        $auth = Auth::guard('company')->attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password')
        ], $request->get('remember'));

        if($auth) {
            return redirect(route('company_directory.index'));
        }

        return redirect(route('login'))->with([
            'error'=>'Email and password not match'
        ])->withInput();
    } 

    public function logout() {
        Auth::logout();

        return back();
    }
}
