<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;

class FooterController extends Controller
{
    public function index() {
      return view('admin.interfaceControl.footer.index');
    }

    public function update(Request $request) {
      $footer = GS::first();
      $footer->footer = $request->footer;
      $footer->save();
      Session::flash('success', 'Footer updated successfully!');
      return redirect()->back();
    }
}
