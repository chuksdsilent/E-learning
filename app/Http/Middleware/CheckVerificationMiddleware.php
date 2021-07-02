<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckVerificationMiddleware
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
        if(is_null(Auth::user()->email_verified_at)){
            $code = Str::random(100);
            $request->session()->put('code', $code);
            return redirect("profile/updates/". $code)->with('msg', "update your profile");
        }
        return $next($request);
    }
}
