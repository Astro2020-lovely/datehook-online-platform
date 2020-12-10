<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Transaction;

class PackageController extends Controller
{
    public function index() {
      if (Auth::check()) {
        if (Auth::user()->compro == 0) {
          return redirect()->route('user.comprofile');
        }
      }
      $data['packages'] = Package::where('status', 1)->get();
      return view('user.subscription.index', $data);
    }

    public function buy(Request $request) {
      $user = User::find(Auth::user()->id);
      $pack = Package::find($request->packid);

      // if employee balance is short than package price.
      if ($user->balance < $pack->price) {
        return "b_short";
      }


      // cut employee balance
      $user->balance = $user->balance - $pack->price;
      $user->package = $pack->id;
      $user->highlighted = 1;
      if ($pack->id > 1) {
        $user->featured = 1;
      }
      $user->save();

      $tr = new Transaction;
      $tr->user_id = $user->id;
      $tr->details = "Bought " . $pack->title . " package";
      $tr->amount = $pack->price;
      $tr->trx_id = str_random(16);
      $tr->after_balance = $user->balance;
      $tr->save();


      return "success";
    }
}
