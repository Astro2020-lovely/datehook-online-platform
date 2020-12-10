<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gateway as Gateway;
use Session;
use Image;

class GatewayController extends Controller
{
    public function index() {
      $data['gateways'] = Gateway::all();
      return view('admin.gateway.index', $data);
    }

    public function store(Request $request) {
      $gatewayID = $request->id;
      $messages = [
        'gateimg.mimes' => 'Gateway logo must be a file of type: jpeg, jpg, png.',
        'minamo.required' => 'Minimum Limit Per Transaction is required',
        'minamo.numeric' => 'Minimum Limit Per Transaction must be number',
        'maxamo.required' => 'Maximum Limit Per Transaction is required',
        'maxamo.numeric' => 'Maximum Limit Per Transaction must be number',
        'chargefx.required' => 'Fixed Charge is required',
        'chargefx.numeric' => 'Fixed Charge must be number',
        'chargepc.required' => 'Charge in Percentage is required',
        'chargepc.numeric' => 'Charge in Percentage must be number',

      ];
      $validatedData = $request->validate([
          'name' => 'required',
          'gateimg' => 'mimes:jpeg,jpg,png',
          'rate' => 'required',
          'minamo' => 'required|numeric',
          'maxamo' => 'required|numeric',
          'chargefx' => 'required|numeric',
          'chargepc' => 'required|numeric',
      ], $messages);
      $gateway = new Gateway;
      for ($i=900; $i < 1200 ; $i++) {
        $gw = Gateway::find($i);
        if (empty($gw)) {
          $gateway->id = $i;
          break;
        }
      }
      $gateway->name = $request->name;
      $gateway->main_name = $request->name;
      $gateway->minamo = $request->minamo;
      $gateway->maxamo = $request->maxamo;
      $gateway->rate = $request->rate;
      if($request->hasFile('gateimg')) {
        $fileName = $gateway->id . '.jpg';
        $image = $request->file('gateimg');
        $location = 'assets/gateway/' . $fileName;
        Image::make($image)->resize(800, 800)->save($location);
      }
      $gateway->fixed_charge = $request->chargefx;
      $gateway->percent_charge = $request->chargepc;

      $gateway->val3 = $request->val3;

      $gateway->status = $request->status;

      $gateway->save();

      Session::flash('success', 'Gateway added successfully');

      return redirect()->back();
    }

    public function update(Request $request) {
      $gatewayID = $request->id;
      $messages = [
        'gateimg.mimes' => 'Gateway logo must be a file of type: jpeg, jpg, png.',
        'minamo.required' => 'Minimum Limit Per Transaction is required',
        'minamo.numeric' => 'Minimum Limit Per Transaction must be number',
        'maxamo.required' => 'Maximum Limit Per Transaction is required',
        'maxamo.numeric' => 'Maximum Limit Per Transaction must be number',
        'chargefx.required' => 'Fixed Charge is required',
        'chargefx.numeric' => 'Fixed Charge must be number',
        'chargepc.required' => 'Charge in Percentage is required',
        'chargepc.numeric' => 'Charge in Percentage must be number',

      ];
      $validatedData = $request->validate([
          'name' => 'required',
          'rate' => 'required|numeric',
          'gateimg' => 'mimes:jpeg,jpg,png',
          'minamo' => 'required|numeric',
          'maxamo' => 'required|numeric',
          'chargefx' => 'required|numeric',
          'chargepc' => 'required|numeric',
      ], $messages);

      $gateway = Gateway::find($gatewayID);
      $gateway->name = $request->name;
      $gateway->rate = $request->rate;
      $gateway->minamo = $request->minamo;
      $gateway->maxamo = $request->maxamo;
      if($request->hasFile('gateimg')) {
        $gateImagePath = 'assets/gateway/' . $gateway->id . '.jpg';
        if(file_exists($gateImagePath)) {
          unlink($gateImagePath);
        }
        $image = $request->file('gateimg');
        $fileName = $gateway->id . '.jpg';
        $location = 'assets/gateway/' . $fileName;
        Image::make($image)->resize(800, 800)->save($location);
      }
      $gateway->fixed_charge = $request->chargefx;
      $gateway->percent_charge = $request->chargepc;
      if ($gatewayID > 899) {
        $gateway->val3 = $request->val3;
      }
      if ($gatewayID == 101) {
        $gateway->val1 = $request->val1;
      }
      if ($gatewayID == 102) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 103) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 104) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 501) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 502) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
        $gateway->val3 = $request->val3;
      }
      if($gatewayID == 503) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 504) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 505) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 506) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 507) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 508) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 509) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if($gatewayID == 510) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      if ($gatewayID == 512) {
        $gateway->val1 = $request->val1;
      }
      if($gatewayID == 513) {
        $gateway->val1 = $request->val1;
        $gateway->val2 = $request->val2;
      }
      $gateway->status = $request->status;

      $gateway->save();

      Session::flash('success', $gateway->name.' informations updated successfully!');

      return redirect()->back();
    }
}
