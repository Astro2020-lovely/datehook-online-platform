<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;
use Validator;


class EmailSettingController extends Controller
{
    public function index() {
      return view('admin.EmailSetting');
    }

    public function updateEmailSetting(Request $request) {
      $validator = Validator::make($request->all(), [
        'emailSentFrom' => 'required',
        'emailTemplate' => 'required'
      ]);

      if ($validator->fails()) {
          return redirect()->route('admin.EmailSetting')
                      ->withErrors($validator);
                      // ->withInput();
      }

      $gs = GS::first();
      $gs->email_sent_from = $request->emailSentFrom;
      $gs->email_template = $request->emailTemplate;
      $gs->save();

      Session::flash('success', 'Successfully Updated!');

      return redirect()->route('admin.EmailSetting');
    }
}
