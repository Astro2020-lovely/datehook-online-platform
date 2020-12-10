<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Hash;
use Session;
use Auth;


class ProfileController extends Controller
{
    public function profile($username) {
      $data['user'] = User::where('username', $username)->first();
      if (Auth::check()) {
        if (Auth::user()->compro == 0) {
          return redirect()->route('user.comprofile');
        }
      }
      return view('user.profile.profile', $data);
    }

    public function changePassword() {
        return view('user.profile.changePassword');
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
        if(Hash::check($request->old_password, Auth::user()->password)) {
            $oldPassMatch = 'matched';
        } else {
            $oldPassMatch = 'not_matched';
        }
        if ($validator->fails() || $oldPassMatch=='not_matched') {
            if($oldPassMatch == 'not_matched') {
              $validator->errors()->add('oldPassMatch', true);
            }
            return redirect()->route('users.editPassword')
                        ->withErrors($validator);
        }

        // updating password in database...
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->route('users.editPassword');
    }


    public function edit() {
      $data['user'] = User::find(Auth::user()->id);
      return view('user.profile.edit', $data);
    }


    public function update(Request $request) {
      $validatedRequest = $request->validate([
        'name' => 'required',
        'date_of_birth' => 'required',
        'mother_tongue' => 'required',
        'city' => 'required',
        'religion' => 'required',
        'country' => 'required',
        'gender' => 'required',
        'marrital_status' => 'required',
        'education_level' => 'required',
        'work' => 'required',
        'education_field' => 'required',
        'diet' => 'required',
        'drink' => 'required',
        'body_type' => 'required',
        'smoke' => 'required',
        'height' => 'required',
        'skin_tone' => 'required',
        'about' => 'required',
        'disability' => 'required',
      ]);

      $user = User::find($request->userid);
      $in = Input::except('_token', 'userid');
      $user->fill($in)->save();

      Session::flash('success', 'Your profile has been updated');
      return redirect()->back();
    }

    public function propic() {
      return view('user.profile.propic');
    }
}
