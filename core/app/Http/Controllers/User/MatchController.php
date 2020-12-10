<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Match;
use App\User;
use App\Report;
use Session;
use Auth;

class MatchController extends Controller
{
    public function matches() {
      $data['matches'] = Match::where('matched', 1)->where(function ($query) {
                                      $query->where('a_id', Auth::user()->id)->orWhere('r_id', Auth::user()->id);
                                  })
                                ->latest()->paginate(9);
      return view('user.matches', $data);
    }

    public function unfriend(Request $request) {
      $match = Match::find($request->rid)->delete();
      return "success";
    }

    public function report(Request $request) {
      $validatedRequest = $request->validate([
        'message' => 'required',
      ]);
      $report = new Report;
      $report->r_id = Auth::user()->id;
      $report->c_id = $request->c_id;
      $report->message = $request->message;
      $report->save();
      Session::flash('success', 'Reported successfully');
      return back();
    }
}
