<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Payments;

class StudentRoleMiddleware
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

       
//        if (\Carbon\Carbon::parse($student_data)->lt(\Carbon\Carbon::now())){
//            return redirect()->intended('/login')->with('errmsg', 'Sorry. Your plan has expired.')->with('class', 'danger'); ;
//        }
        if (!Auth::check()) {
             return redirect()->intended('/login')->with('errmsg', 'Unauthorized Access')->with('class', 'danger'); ;
        }
        if (Auth::check() && Auth::user()->role != "S") {
             return redirect()->intended('/login')->with('errmsg', 'Unauthorized Access')->with('class', 'danger'); ;
        }
        return $next($request);
    }
}
