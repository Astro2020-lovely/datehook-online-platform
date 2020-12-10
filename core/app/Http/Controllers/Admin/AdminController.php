<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Hash;
use Validator;
use App\Admin;
use App\User;


class AdminController extends Controller
{
    public function dashboard(){
      $admin = Admin::find(Auth::guard('admin')->user()->id);
      $sales =  User::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
                return $d->created_at->format('F');
             });
       $sold = [];
       $month = [];
       foreach ($sales as $key => $value) {
           $sold[] = count($value);
           $month[] = $key;
       }
      return view('admin.dashboard', ['admin' => $admin, 'sold' => $sold, 'month' => $month]);
    }


    public function changePass() {
      return view('admin.changepass');
    }

    public function editProfile() {
      $admin = Admin::find(Auth::guard('admin')->user()->id);
      return view('admin.editProfile', ['admin' => $admin]);
    }

    public function updateProfile(Request $request) {
      $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric'
      ]);

      $admin = Admin::find($request->adminID);
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->phone = $request->phone;
      $admin->save();

      Session::flash('success', 'Profile updated successfully!');

      return redirect()->back();
    }

    public function updatePassword(Request $request) {
      $messages = [
          'password.required' => 'The new password field is required',
          'password.confirmed' => "Password does'nt match"
      ];
      $validator = Validator::make($request->all(), [
          'old_password' => 'required',
          'password' => 'required|confirmed'
      ], $messages);
      // if given old password matches with the password of this authenticated user...
      if(Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
          $oldPassMatch = 'matched';
      } else {
          $oldPassMatch = 'not_matched';
      }
      if ($validator->fails() || $oldPassMatch=='not_matched') {
          if($oldPassMatch == 'not_matched') {
            $validator->errors()->add('oldPassMatch', true);
          }
          return redirect()->route('admin.changePass')
                      ->withErrors($validator);
      }

      // updating password in database...
      $user = Admin::find(Auth::guard('admin')->user()->id);
      $user->password = bcrypt($request->password);
      $user->save();

      Session::flash('success', 'Password changed successfully!');

      return redirect()->back();
    }

    public function logout() {
      Auth::guard('admin')->logout();
      session()->flash('message', 'Just Logged Out!');
      return redirect()->route('admin.loginForm');
    }
}
