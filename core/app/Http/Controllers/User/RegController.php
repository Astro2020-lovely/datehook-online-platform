<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\GeneralSetting as GS;
use Validator;
use Auth;


class RegController extends Controller
{
    public function regform() {
      return view('user.register');
    }

    public function register(Request $request) {
        // return $request->all();

        $gs = GS::first();
        if ($gs->registration == 0) {
          Session::flash('alert', 'Registration is closed!');
          return back();
        }

        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);


        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->email_verified = $gs->email_verification;
        $user->sms_verified = $gs->sms_verification;
        $user->email_ver_code = $gs->email_verification == 0? rand(1000, 9999):NULL;
        $user->sms_ver_code = $gs->sms_verification == 0?rand(1000, 9999):NULL;

        if ($gs->email_verification == 0) {
          $code = $user->email_ver_code;
          $to = $user->email;
          $name = $user->name;
          $subject = "Verification Code";
          $message = "Your verification code is: " . $code;
          send_email( $to, $name, $subject, $message);
          $user->vsent = time();
          $user->email_sent = 1;
        } else {
          $user->email_sent = 0;
        }

        if ($gs->sms_verification == 0) {
          $code = $user->sms_ver_code;
          $to = $user->phone;
          $message = "Your verification code is: " . $code;
           send_sms( $to, $message);
           $user->vsent = time();
          $user->sms_sent = 1;
        } else {
          $user->sms_sent = 0;
        }
        $user->save();

        if (Auth::attempt([
          'email' => $request->email,
          'password' => $request->password,
        ])) {
            return redirect()->route('user.home');
        }
    }
}
