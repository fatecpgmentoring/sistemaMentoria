<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckMentor
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
        if(Auth::check()) {
            if(Auth::user()->cd_role == 2) {
                return $next($request);
            }
            else if(Auth::user()->cd_role == 1)
            {
                return redirect('/mentorado');
            }
            else
            {
                return redirect('/admin');
            }
        }
        else {
            return redirect('/login');
        }
    }
}
