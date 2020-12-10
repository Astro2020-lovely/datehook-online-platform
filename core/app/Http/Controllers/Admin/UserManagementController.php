<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deposit;
use App\Image as Img;
use Session;
use App\Transaction;

class UserManagementController extends Controller
{
    public function allUsers() {
      $data['users'] = User::orderBy('username', 'ASC')->paginate(15);
      $data['term'] = '';
      return view('admin.UserManagement.allUsers', $data);
    }

    public function allUsersSearchResult(Request $request) {
      $data['term'] = $request->term;
      $data['users'] = User::where('username', 'like', '%'.$request->term.'%')->orderBy('username', 'ASC')->paginate(15);
      return view('admin.UserManagement.allUsers',$data);
    }

    public function bannedUsers() {
      $data['term'] = '';
      $data['bannedUsers'] = User::where('status', 'blocked')->paginate(15);
      return view('admin.UserManagement.bannedUsers', $data);
    }

    public function bannedUsersSearchResult(Request $request) {
      $data['term'] = $request->term;
      $data['bannedUsers'] = User::where('username', 'like', '%'.$request->term.'%')->where('status', 'blocked')->paginate(15);
      return view('admin.UserManagement.bannedUsers',$data);
    }

    public function verifiedUsers() {
      $data['term'] = '';
      $data['verifiedUsers'] = User::where('email_verified', 1)->where('sms_verified', 1)->paginate(15);
      return view('admin.UserManagement.verifiedUsers', $data);
    }

    public function verUsersSearchResult(Request $request) {
      $data['term'] = $request->term;
      $data['verifiedUsers'] = User::where('username', 'like', '%'.$request->term.'%')->where('email_verified', 1)->where('sms_verified', 1)->orderBy('username', 'ASC')->paginate(15);
      return view('admin.UserManagement.verifiedUsers',$data);
    }

    public function mobileUnverifiedUsersSearchResult(Request $request) {
      $data['term'] = $request->term;
      $data['mobileUnverifiedUsers'] = User::where('username', 'like', '%'.$request->term.'%')->where('sms_verified', 0)->orderBy('username', 'ASC')->paginate(15);
      return view('admin.UserManagement.mobileUnverifiedUsers',$data);
    }

    public function mobileUnverifiedUsers() {
      $data['term'] = '';
      $data['mobileUnverifiedUsers'] = User::where('sms_verified', 0)->paginate(15);
      return view('admin.UserManagement.mobileUnverifiedUsers', $data);
    }

    public function emailUnverifiedUsers() {
      $data['term'] = '';
      $data['emailUnverifiedUsers'] = User::where('email_verified', 0)->paginate(15);
      return view('admin.UserManagement.emailUnverifiedUsers', $data);
    }

    public function emailUnverifiedUsersSearchResult(Request $request) {
      $data['term'] = $request->term;
      $data['emailUnverifiedUsers'] = User::where('username', 'like', '%'.$request->term.'%')->where('email_verified', 0)->orderBy('username', 'ASC')->paginate(15);
      return view('admin.UserManagement.emailUnverifiedUsers',$data);
    }

    public function userDetails($userID) {
      $data['user'] = User::find($userID);
      return view('admin.UserManagement.userDetails.userDetails', $data);
    }

    public function updateUserDetails (Request $request) {
      $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
      ]);

      $user = User::find($request->userID);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->status = $request->status=='on'?'active':'blocked';
      $user->email_verified = $request->emailVerification=='on'?1:0;
      if ($request->emailVerification != 'on') {
        if ($user->email_sent == 0) {
          $code = rand(1000, 9999);
          $user->email_ver_code = $code;
          $to = $user->email;
          $name = $user->name;
          $subject = "Verification Code";
          $message = "Your verification code is: " . $code;
          send_email( $to, $name, $subject, $message);
          $user->email_sent = 1;
          $user->vsent = time();
        }
      } else {
        $user->email_sent = 0;
      }
      $user->sms_verified = $request->smsVerification=='on'?1:0;
      if ($request->smsVerification != 'on') {
        if ($user->sms_sent == 0) {
          $code = rand(1000, 9999);
          $user->sms_ver_code = $code;
          $to = $user->phone;
          $message = "Your verification code is: " . $code;
           send_sms( $to, $message);
          $user->sms_sent = 1;
          $user->vsent = time();
        }
    } else {
        $user->sms_sent = 0;
    }
      $user->save();


      Session::flash('success', 'User details has been updated successfully!');

      return redirect()->back();
      // return $request->all();
    }

    public function updateUserBalance(Request $request) {
      $validatedData = $request->validate([
          'amount' => 'required',
      ]);

      $user = User::find($request->userID);
      $balance = $user->balance;
      // if add money operation is selected then add the amount...
      if ($request->has('operation')) {
        $balance = $balance + $request->amount;
        $successMessage = 'Amount has been added successfully!';
      } else {
        $balance = $balance - $request->amount;
        $successMessage = 'Amount has been subtacted successfully!';
      }
      if($request->has('message')) {
        $name = $user->name;
        $subject = 'Balance updated in your account';
        $message = $request->message;
        send_email( $user->email, $name, $subject, $message);
      }

      $user->balance = $balance;
      $user->save();
      Session::flash('success', $successMessage);
      return redirect()->back();
    }

    public function addSubtractBalance($userID) {
      $data['user'] = User::find($userID);
      return view('admin.UserManagement.userDetails.addSubtractBalance', $data);
    }

    public function emailToUser($userID) {
      $data['user'] = User::find($userID);
      return view('admin.UserManagement.userDetails.emailToUser', $data);
    }

    public function sendEmailToUser(Request $request) {
      $validatedData = $request->validate([
          'subject' => 'required',
          'message' => 'required'
      ]);
      $user = User::find($request->userID);
      $to = $user->email;
      $name = $user->name;
      $subject = $request->subject;
      $message = $request->message;
       send_email( $to, $name, $subject, $message);
      Session::flash('success', 'Mail sent successfully!');
      return redirect()->back();
    }

    public function depositLog($userID) {
        $data['deposits'] = Deposit::where('user_id', $userID)->where('status', 1)->paginate(15);
        return view('admin.deposit.depositLog', $data);
    }

    public function imgs(Request $request, $userId) {
      if (empty($request->term)) {
        $data['term'] = '';
        $data['imgs'] = Img::where('user_id', $userId)->latest()->paginate(9);
      } else {
        $data['term'] = $request->term;
        $data['imgs'] = Img::where('user_id', $userId)->where('title', 'like', '%'.$request->term.'%')->latest()->paginate(9);
      }
      return view('admin.imgman.index', $data);
    }

    public function trxlog($userId) {
      $data['trs'] = Transaction::where('user_id', $userId)->latest()->paginate(15);
      return view('admin.trxlog', $data);
    }

    public function subscribers() {
      $data['subscribers'] = Subscriber::all();
      return view('admin.subscribers.index', $data);
    }

    public function mailtosubsc(Request $request) {
      $validatedRequest = $request->validate([
        'subject' => 'required',
        'message' => 'required'
      ]);
      $subscribers = Subscriber::all();
      foreach ($subscribers as $subscriber) {
        $to = $subscriber->email;
        $name = $subscriber->firstname;
        $subject = $request->subject;
        $message = $request->message;
        send_email( $to, $name, $subject, $message);
      }
      Session::flash('success', 'Mail sent to all subscribers.');
      return redirect()->back();
    }
}
