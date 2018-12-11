<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckStudent
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
            if(Auth::user()->user_type != 3) {
                return abort(403);
            }
        }
        else {
            return redirect()->route('login')->with('error', 'Login First!');
        }

        return $next($request);
    }
}
