<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting;
use Session;
use Auth;
use Validator;

class GeneralSettingController extends Controller
{
    public function GenSetting(){
      return view('admin.GeneralSettings');
    }

    public function UpdateGenSetting(Request $request){
      // return $request->all();
        $messages = [
          // 'secColorCode.required' => 'Secondary color code is required',
          // 'secColorCode.size' => 'Secondary color code must have 6 characters',
          'baseColorCode.required' => 'Base color code is required',
          'baseColorCode.size' => 'Base color code must have 6 characters',
          'decimalAfterPt.required' => 'Decimal after point is required',
        ];

        $validator = Validator::make($request->all(), [
          'websiteTitle' => 'required',
          'baseColorCode' => 'required|size:6',
          // 'secColorCode' => 'required|size:6',
          'baseCurrencyText' => 'required',
          'baseCurrencySymbol' => 'required',
          'decimalAfterPt' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('admin.GenSetting')
                        ->withErrors($validator);
                        // ->withInput();
        }

        $generalSettings = GeneralSetting::first();

        $generalSettings->website_title = $request->websiteTitle;
        $generalSettings->base_color_code = $request->baseColorCode;
        // $generalSettings->sec_color_code = $request->secColorCode;
        // $generalSettings->ref_com = $request->reference_commission;
        $generalSettings->base_curr_text = $request->baseCurrencyText;
        $generalSettings->base_curr_symbol = $request->baseCurrencySymbol;
        $generalSettings->registration = $request->registration=='on'?1:0;
        $generalSettings->email_verification = $request->emailVerification=='on'?0:1;
        $generalSettings->sms_verification = $request->smsVerification=='on'?0:1;
        $generalSettings->dec_pt = $request->decimalAfterPt;
        $generalSettings->email_notification = $request->emailNotification=='on'?1:0;
        $generalSettings->sms_notification = $request->smsNotification=='on'?1:0;
        $generalSettings->registration = $request->registration=='on'?1:0;

        $generalSettings->save();

        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('admin.GenSetting');
    }
}
