<?php

namespace App\Http\Middleware;

use App\Models\CompanyDirectory;
use App\Traits\Response;
use Closure;
use Facade\FlareClient\Http\Exceptions\BadResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerifyEmail
{
    use Response;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->fullUrl(), $request->url(), $request->getRequestUri(), $request->query(), $request->bearerToken());
        // if(Auth::guard('company')->check()){
        if (substr($request->getRequestUri(), 0, 4) !== '/api') {
            if (!Auth::guard('company')->user()->is_email_verified) {
                // if (str_contains($request->getRequestUri(), '/company/')) {
                Auth::guard('company')->logout();
                return redirect()->route('login.company')
                ->with('error', 'You need to confirm your account. We have sent you an activation code, please check your email.');
                // }
                }
        }else if(!CompanyDirectory::where('remember_token', $request->bearerToken())->first()->is_email_verified){
                $company = CompanyDirectory::where('remember_token', $request->bearerToken())->update(['remember_token' => '']);
                return $this->badRequest(message: 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        // }
        return $next($request);
    }
}
