<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;
use Auth;
use Session;

class ChatController extends Controller
{
    public function chats($uid) {
      if (Auth::user()->package < 4) {
        Session::flash('alert', 'You need to buy platinum package to activate messaging.');
        return back();
      }
      $data['uid'] = $uid;
      $data['user'] = User::find($uid);
      $data['chats'] = Chat::where(function ($query) use ($uid) {
                                $query->where('s_id', Auth::user()->id)
                                      ->where('r_id', $uid);
                            })
                            ->orWhere(function ($query) use ($uid) {
                                $query->where('s_id', $uid)
                                        ->where('r_id', Auth::user()->id);
                            })->get();
      return view('user.chat', $data);
    }

    public function store(Request $request) {
        $chat = new Chat;
        $chat->s_id = $request->sid;
        $chat->r_id = $request->rid;
        $chat->message = $request->message;
        $chat->save();

        return "success";
    }
}
