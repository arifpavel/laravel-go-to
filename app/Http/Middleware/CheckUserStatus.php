<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if(Auth::check() && Auth::user()->status == 'blocked'){
            Auth::logout();
            alert()->message('error', 'Oops! Your account is blocked. Please, contact with Admin.');
            return redirect()->back();
        }
        return $response;
    }
}
