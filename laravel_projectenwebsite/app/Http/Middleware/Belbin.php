<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Student;

class Belbin
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
        $user = Auth::user();
        $student = $user->student;

        if (isset($user->student) && is_null($user->student->belbintype)){
          return redirect('/belbintest');
        }
        else {
          return $next($request);
        }
    }
}
