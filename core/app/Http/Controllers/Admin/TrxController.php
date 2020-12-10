<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

class TrxController extends Controller
{
    public function index() {
      $data['trs'] = Transaction::latest()->paginate(15);
      return view('admin.trxlog', $data);
    }
}
