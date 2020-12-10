<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;

class SubscSectionController extends Controller
{
    public function index() {
      return view('admin.interfaceControl.subscSection.index');
    }

    public function update(Request $request) {
      $messages = [
          'subsc_details.required' => 'Details field is required',
      ];
      $validatedRequest = $request->validate([
          'title' => 'required',
          'subsc_details' => 'required',
      ], $messages);
      // return $request->all();
      $gs = GS::first();
      $gs->subsc_title = $request->title;
      $gs->subsc_details = $request->subsc_details;
      $gs->save();
      Session::flash('success', 'Updated successfully!');
      return redirect()->back();
    }
}
