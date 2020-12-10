<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;

class LjobController extends Controller
{
    public function index() {
      return view('admin.interfaceControl.ljob.index');
    }

    public function update(Request $request) {
        $messages = [
            'ls_details.required' => 'Bold Text field is required',
        ];
        $validatedRequest = $request->validate([
            'title' => 'required',
            'ls_details' => 'required',
        ], $messages);
        // return $request->all();
        $gs = GS::first();
        $gs->l_title = $request->title;
        $gs->ls_details = $request->ls_details;
        $gs->save();
        Session::flash('success', 'Updated successfully!');
        return redirect()->back();
    }
}
