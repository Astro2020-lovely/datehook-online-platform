<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login() {
      return view('user.login');
    }

    public function authenticate(Request $request) {

        $validatedRequest = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
          'username' => $request->username,
          'password' => $request->password,
        ])) {
            return redirect()->route('user.home');
        } else {
            return back()->with('missmatch', 'Username/Password didn\'t match!');
        }
    }

    public function logout($id = null) {
      Auth::logout();
      if ($id) {
          $user = User::find($id);
          if ($user->status == 'blocked') {
              Session::flash('alert', 'Your account has been banned');
          }
      }
      session()->flash('message', 'Just Logged Out!');
      return redirect()->route('user.home');
    }
}
