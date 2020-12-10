<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Match;
use Auth;

class RequestController extends Controller
{
    public function sendreq(Request $request) {
      $match = Match::where('a_id', $request->aid)->where('r_id', Auth::user()->id)->first();
      $count = Match::where('a_id', Auth::user()->id)->where('r_id', $request->aid)->count();
      $rmatched = Match::where('a_id', $request->aid)->where('r_id', Auth::user()->id)->where('matched', 1)->count();
      $amatched = Match::where('r_id', $request->aid)->where('a_id', Auth::user()->id)->where('matched', 1)->count();

      if ($rmatched > 0 || $amatched > 0) {
        return "matched";
      }

      if ($count > 0) {
        return 'rsent';
      }

      if (empty($match)) {
        $match = new Match;
        $match->r_id = Auth::user()->id;
        $match->a_id = $request->aid;
        $match->matched = 0;
        $match->save();
        return "sent";
      } else {
        $match->delete();
        return "asent";
      }
    }


    public function requests() {
      $data['requests'] = Match::where('a_id', Auth::user()->id)->where('matched', 0)->latest()->paginate(9);
      return view('user.requests', $data);
    }

    public function match(Request $request) {
      $match = Match::find($request->rid);
      $match->matched = 1;
      $match->save();
      return "success";
    }
}
