<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use Auth;

class TrxController extends Controller
{
    public function trxLog() {
      $data['trs'] = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(9);
      return view('user.trxLog', $data);
    }
}
