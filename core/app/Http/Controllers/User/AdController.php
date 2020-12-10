<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;
use Session;
use Image;

class AdController extends Controller
{
  public function increaseAdView(Request $request) {
      $ad = Ad::find($request->adID);
      $ad->views = $ad->views + 1;
      $ad->save();
  }
}
