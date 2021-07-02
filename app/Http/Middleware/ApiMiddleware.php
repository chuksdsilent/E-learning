<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiMiddleware
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

        $authorizaion = $request->header('Authorization');

        if (!empty(Auth::user()->token) && $authorizaion == Auth::user()->token) {
            return $next($request);
        }else {
            return response()->json(['unauthorized' => "Unauthorized Access"], 401);
        }

    }
}
