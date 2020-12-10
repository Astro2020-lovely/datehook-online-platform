<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;


class VerificationController extends Controller
{
    public function showEmailVerForm() {
      if(Auth::check() && Auth::user()->email_verified == 0) {

        // sending verification code in email...
        if (Auth::user()->email_sent == 0) {
          $to = Auth::user()->email;
          $name = Auth::user()->name;
          $subject = "Email verification code";
          $message = "Your verification code is: " . Auth::user()->email_ver_code;
          send_email( $to, $name, $subject, $message);

          // making the 'email_sent' 1 after sending mail...
          $emp = User::find(Auth::user()->id);
          $emp->email_sent = 1;
          $emp->save();
        }

        return view('user.verification.emailVerification');
      }

      return redirect()->route('user.home');
    }

    public function showSmsVerForm() {
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
          return view('user.verification.smsVerification');

        }
        return redirect()->route('user.home');
    }

    public function emailVerification(Request $request) {
      $messages = [
        'email_ver_code.required' => 'Email verification code is required',
      ];
      $validatedData = $request->validate([
          'email_ver_code' => 'required',
      ],$messages);
      $emp = User::find(Auth::user()->id);
      if($emp->email_ver_code == $request->email_ver_code) {
        $emp->email_sent = 0;
        $emp->email_verified = 1;
        $emp->save();
        return redirect()->route('user.home');
      }
      Session::flash('error', "Verification code didn't match!");
      return redirect()->back();
    }

    public function smsVerification(Request $request) {
      $messages = [
        'sms_ver_code.required' => 'SMS verification code is required',
      ];
      $validatedData = $request->validate([
          'sms_ver_code' => 'required',
      ],$messages);
      $emp = User::find(Auth::user()->id);
      if($emp->sms_ver_code == $request->sms_ver_code) {
        $emp->sms_sent = 0;
        $emp->sms_verified = 1;
        $emp->save();
        return redirect()->route('user.home');
      }
      Session::flash('error', "Verification code didn't match!");
      return redirect()->back();
    }

    public function sendVcode(Request $request)
   {
       $emp = User::find(Auth::id());
       $chktm = $emp->vsent+1000;
       if ($chktm > time())
       {
           $delay = $chktm-time();
           return back()->with('alert', 'Please Try after '.$delay.' Seconds');
       }
       else
       {
           $email = $request->email;
           $mobile = $request->phone;
           $code = rand(1000, 9999);
           $msg = 'Your Verification code is: '.$code;
           $emp->email_ver_code = $code ;
           $emp->email_sent = 1 ;
           $emp->vsent = time();
           $emp->save();

           if(isset($email))
           {
               send_email($emp->email, $emp->username, 'Verification Code', $msg);
               return back()->with('success', 'Email verification code sent succesfully');
           }
           elseif(isset($mobile))
           {
               send_sms($emp->mobile, $msg);
               return back()->with('success', 'SMS verification code sent succesfully');
           }
           else
           {
               return back()->with('alert', 'Sending Failed');
           }

       }

   }
}
