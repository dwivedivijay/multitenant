<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsCompany
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
        if (Auth::check() && Auth::user()->is_admin == 0  && Auth::user()->tennant_id!='') {
            return $next($request);
        }
        else{
            abort(404);
        }
    }
}
