<?php

namespace App\Http\Middleware;

use App\Traits\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use Response;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->is('api/*')) {
            $this->unauthorized(401, "Please, try to log in again")->send();
            exit;
        }
        
        return route('login');
        
    }
}
