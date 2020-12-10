<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSettings as GS;
use Session;

class BackgroundImageController extends Controller
{
  public function background()
  {
      return view('admin.interfaceControl.background.index');
  }

  public function backgroundUpdate(Request $request)
  {

        $validatedRequest = $request->validate([
          'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
          'footer' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
          'subscribe' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ]);

         if($request->hasFile('banner')) {
           $bannerImagePath = './assets/user/interfaceControl/backgroundImage/banner.jpg';
           @unlink($bannerImagePath);
           $request->file('banner')->move('assets/user/interfaceControl/backgroundImage/','banner.jpg');
         }
         if($request->hasFile('footer')) {
           $footerImagePath = './assets/user/interfaceControl/backgroundImage/footer.jpg';
           @unlink($footerImagePath);
           $request->file('footer')->move('assets/user/interfaceControl/backgroundImage/','footer.jpg');
         }
         if($request->hasFile('subscribe')) {
           $footerImagePath = './assets/user/interfaceControl/backgroundImage/subscribe.jpg';
           @unlink($footerImagePath);
           $request->file('subscribe')->move('assets/user/interfaceControl/backgroundImage/','subscribe.jpg');
         }

        return back()->with('success', 'Background Image  Updated');
    }
}
