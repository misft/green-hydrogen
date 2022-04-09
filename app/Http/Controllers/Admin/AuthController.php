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
        if(!Auth::guard('company')->check()) {
            return view('admin.login');
        }
        return redirect(route('company.company_directory.index'));
    }

    public function companyLogin(Request $request) {
        $user = CompanyDirectory::email($request->get('email'))->first();


        if (empty($user)) return back()->with([
            'error'=>'Company not found'
        ]);

        $auth = Auth::guard('company')->attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password')
        ], $request->get('remember'));

        if($auth) {
            return redirect(route('company.company_directory.index'));
        }

        return redirect(route('login.company'))->with([
            'error'=>'Email and password not match'
        ])->withInput();
    }

    public function logout() {
        if (Auth::guard('web')->check()) {
			Auth::guard('web')->logout();
			session()->flush();
			return redirect(route('login'));
		} elseif (Auth::guard('company')->check()) {
			Auth::guard('company')->logout();
			session()->flush();
			return redirect(route('login.company'));
		}
        // return back();
    }
}
