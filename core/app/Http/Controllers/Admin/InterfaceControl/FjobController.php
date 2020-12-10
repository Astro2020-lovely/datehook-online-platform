<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;


class FjobController extends Controller
{
    public function index() {
      return view('admin.interfaceControl.fjob.index');
    }

    public function update(Request $request) {
        $messages = [
            'fs_details.required' => 'Bold Text field is required',
        ];
        $validatedRequest = $request->validate([
            'title' => 'required',
            'fs_details' => 'required',
        ], $messages);
        // return $request->all();
        $gs = GS::first();
        $gs->f_title = $request->title;
        $gs->fs_details = $request->fs_details;
        $gs->save();
        Session::flash('success', 'Updated successfully!');
        return redirect()->back();
    }
}
