<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard = null)
    {
        // dd($request);
        if (! $request->expectsJson()) {
            return route('login');


            // switch ($guard) {
            //     case 'admin':
            //       if (Auth::guard($guard)->check()) {
            //         return redirect()->route('admin.login');
            //       }
            //       break;
        
            //     default:
            //       if (Auth::guard($guard)->check()) {
            //           return redirect()->route('login');
            //       }
            //       break;
            //   }
        }
    }
}
