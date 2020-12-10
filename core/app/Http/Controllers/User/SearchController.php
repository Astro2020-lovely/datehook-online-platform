<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class SearchController extends Controller
{
    public function searchResults(Request $request) {
        $term = $request->term;
        if (Auth::check()) {
          if (Auth::user()->compro == 0) {
            return redirect()->route('user.comprofile');
          }
          $data['fpros'] = User::where('id', '!=', Auth::user()->id)
                                ->where('gender', '!=', Auth::user()->gender)
                                ->where('compro', 1)
                                ->where(function ($query) use ($term) {
                                    $query->where('name', 'like', '%'.$term.'%')
                                    ->orWhere('religion', 'like', '%'.$term.'%')
                                    ->orWhere('username', 'like', '%'.$term.'%');
                                })
                                ->orderBy('featured', 'DESC')->paginate(8);

        } else {
          $data['fpros'] = User::where('compro', 1)
                                ->where(function ($query) use ($term) {
                                    $query->where('name', 'like', '%'.$term.'%')
                                    ->orWhere('religion', 'like', '%'.$term.'%')
                                    ->orWhere('username', 'like', '%'.$term.'%');
                                })
                                ->orderBy('featured', 'DESC')->paginate(8);
        }
        $data['term'] = $term;
        return view('user.searchResults', $data);
    }
}
