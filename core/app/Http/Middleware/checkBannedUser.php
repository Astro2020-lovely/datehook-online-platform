<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
use Session;

class checkBannedUser
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
        if (Auth::check()) {
            if (Auth::user()->status == 'blocked') {
                return redirect()->route('user.logout', Auth::user()->id);
            }
        }
        return $next($request);
    }
}
