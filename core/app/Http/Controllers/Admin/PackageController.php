<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use Session;

class PackageController extends Controller
{
    public function index() {
      $data['packages'] = Package::all();
      return view('admin.packages.index', $data);
    }


    public function update(Request $request) {
      $validatedData = $request->validate([
          'price' => 'required',
      ]);

      $package = Package::find($request->packageID);
      $package->price = $request->price;
      $package->status = $request->status;

      $package->save();

      Session::flash('success', 'Package is updated successfully!');

      return redirect()->back();
    }
}
