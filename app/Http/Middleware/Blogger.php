<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Blogger
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
        if (Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'blogger')) {
            return $next($request);
         }
        return response()->json('Unauthorized Access', 401);
    }
}
