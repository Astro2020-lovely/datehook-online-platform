<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class UserSmsVerification
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
         if(Auth::check() && Auth::user()->sms_verified == 0) {
           // sending verification code in email...
           if (Auth::user()->sms_sent == 0) {
             $to = Auth::user()->phone;
             $message = "Your verification code is: " . Auth::user()->sms_ver_code;
             send_sms( $to, $message);

             // making the 'email_sent' 1 after sending mail...
             $emp = User::find(Auth::user()->id);
             $emp->sms_sent = 1;
             $emp->save();
           }

           return redirect()->route('user.showSmsVerForm');
         }
         return $next($request);
     }
}
