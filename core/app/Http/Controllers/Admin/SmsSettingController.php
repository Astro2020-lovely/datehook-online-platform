<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use Session;
use Validator;

class SmsSettingController extends Controller
{
    public function index() {
      return view('admin.SmsSetting');
    }

    public function updateSmsSetting(Request $request) {
        $validator = Validator::make($request->all(), [
          'smsApi' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.SmsSetting')
                        ->withErrors($validator);
                        // ->withInput();
        }
        $gs = GS::first();
        $gs->sms_api = $request->smsApi;
        $gs->save();
        Session::flash('success', 'Updated Successfully!');
        return redirect()->route('admin.SmsSetting');
    }
}
