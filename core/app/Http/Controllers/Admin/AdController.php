<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad as Ad;
use Session;
use Image;

class AdController extends Controller
{
    public function index() {
      $data['ads'] = Ad::latest()->get();
      return view('admin.Ad.index', $data);
    }

    public function create() {
        return view('admin.Ad.add');
    }

    public function store(Request $request) {
      if ($request->type == 1) {
          $request->validate([
              'size' => 'required',
              'redirect_url' => 'required',
              'banner' => 'required|mimes:jpeg,jpg,png',
              'type' => 'required'
          ]);
      } else {
          $request->validate([
              'size' => 'required',
              'script' => 'required',
              'type' => 'required'
          ]);
      }

      if($request->size == 1) {
          $width = 300;
          $height = 250;
      }
      if($request->size == 2) {
          $width = 728;
          $height = 90;
      }
      if($request->size == 3) {
          $width = 300;
          $height = 600;
      }
      $ad = new Ad;
      $ad->type = $request->type;
      if ($request->type == 1) {
          $image = $request->file('banner');
          $fileName = time() . '.jpg';
          $location = './assets/user/ad_images/' . $fileName;
          Image::make($image)->resize($width, $height)->save($location);

          $ad->image = $fileName;
          $ad->url = $request->redirect_url;// code...
      } else {
          $ad->script = $request->script;
      }
      $ad->size = $request->size;
      $ad->save();
      Session::flash('success', 'Banner added successfully!');
      return redirect()->back();
    }

    public function showImage() {
      $adID = $_GET['adID'];
      $ad = Ad::find($adID);
      return $ad;
    }

    public function delete(Request $request) {
      $ad = Ad::find($request->adID);
      $imgPath = 'assets/user/ad_images/' . $ad->image;
      if (file_exists($imgPath)) {
        unlink($imgPath);
      }
      $ad->delete();

      Session::flash('success', 'Ad has been deleted!');
      return redirect()->back();
    }
}
