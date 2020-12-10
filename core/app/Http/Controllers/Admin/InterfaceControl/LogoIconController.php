<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;
use Image;

class LogoIconController extends Controller
{
    public function index() {
      return view('admin.interfaceControl.logoIcon.index');
    }

    public function update(Request $request) {

      $gs = GS::first();
      if($request->hasFile('logo')) {

        $logoImagePath = './assets/user/interfaceControl/logoIcon/logo.jpg';
        @unlink($logoImagePath);
        $request->file('logo')->move('assets/user/interfaceControl/logoIcon/','logo.jpg');
      }
      if($request->hasFile('icon')) {
        $iconImagePath = './assets/user/interfaceControl/logoIcon/icon.jpg';
        @unlink($iconImagePath);
        $request->file('icon')->move('assets/user/interfaceControl/logoIcon/','icon.jpg');
      }
      Session::flash('success', 'Logo updated successfully!');
      return redirect()->back();
    }
}
