<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect('/');
            // Check if belbin test is done
            $user = Auth::user();
            $belbin = Student::select('belbintype')->find((int)$user['id']);
            if ($belbin['belbintype'] == NULL){
              return redirect('/belbintest');
            }
            else {
              return redirect('/');
            }

        }

        return $next($request);
    }
}
