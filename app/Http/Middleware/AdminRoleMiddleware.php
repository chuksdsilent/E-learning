<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
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
        if (!Auth::check()) {
            return redirect('/user/admin')->with('errmsg', 'Login to continue')->withInput()->with('class', 'danger'); ;
        }
        if (Auth::user()->role != "A") {
            return redirect('/user/admin')->with('errmsg', 'Unauthorized Access')->withInput()->with('class', 'danger'); ;
            # code...
        }
        return $next($request);
    }
}
