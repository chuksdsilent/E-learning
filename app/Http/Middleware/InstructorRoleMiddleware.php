<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class InstructorRoleMiddleware
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
             return redirect('instructor/login')->with('errmsg', 'Login to continue')->with('class', 'danger'); ;
        }
        if( Auth::user()->role != "I"){
            return redirect('instructor/login')->with('errmsg', 'Unauthorized Access')->with('class', 'danger'); ;
        }
        if(Auth::user()->blocked == "Y"){
            return redirect('instructor/login')->with('errmsg', 'You have been blocked')->with('class', 'danger'); ;
        }
        return $next($request);
    }
}
