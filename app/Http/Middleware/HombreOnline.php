<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HombreOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('hombre_id')) {
            return $next($request);
        } else {
            return route('hombre-login');
        }
    }
}
