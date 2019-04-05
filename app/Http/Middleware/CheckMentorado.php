<?php

namespace App\Http\Middleware;

use Closure;

class CheckMentorado
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
        if(Auth::user()->cd_role == 1) {
            return $next($request);
        }
        else {
            return \redirect('/permission')->with('permission', Auth::user()->cd_role);
        }
    }
}
