<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;
use Image;

class ContactController extends Controller
{
    public function index() {
      return view('admin.interfaceControl.contact.index');
    }

    public function update(Request $request) {
      $messages = [
        'o_hours.required' => 'Opening hours field is required',
        'c_location.required' => 'Company location field is required',
        'con_title.required' => 'Title is required'
      ];

      $validatedData = $request->validate([
          'con_title' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'o_hours' => 'required',
          'c_location' => 'required'
      ], $messages);

      $gs = GS::first();
      $gs->phone = $request->phone;
      $gs->email = $request->email;
      $gs->o_hours = $request->o_hours;
      $gs->c_location = $request->c_location;
      $gs->con_title = $request->con_title;
      $gs->con_sdetails = $request->con_sdetails;
      $gs->save();

      Session::flash('success', 'Contact updated successfully!');
      return redirect()->back();
    }
}
