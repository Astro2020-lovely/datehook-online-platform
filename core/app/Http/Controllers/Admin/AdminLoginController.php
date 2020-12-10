<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function index(){
      return view('admin.loginform');
    }

    public function authenticate(Request $request){
      // return $request->username . ' ' . $request->password;
      $this->validate($request, [
        'username'   => 'required',
        'password' => 'required'
      ]);
      if (Auth::guard('admin')->attempt(['username' => $request->username,'password' => $request->password]))
      {
          return redirect()->route('admin.dashboard');
      }
      return redirect()->back()->with('alert','Username and Password Not Matched');
    }
}
