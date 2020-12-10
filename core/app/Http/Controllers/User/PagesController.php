<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Menu;
use App\GeneralSetting as GS;
use App\Image as Img;
use Image;
use Session;
use Auth;
use App\User;
use App\Match;
use App\Story;

class PagesController extends Controller
{

    public function home() {
      $data['stories'] = Story::all();
      if (Auth::check()) {
        if (Auth::user()->compro == 0) {
          return redirect()->route('user.comprofile');
        }
        $data['fpros'] = User::where('featured', 1)
                              ->where('id', '!=', Auth::user()->id)
                              ->where('gender', '!=', Auth::user()->gender)
                              ->where('compro', 1)
                              ->inRandomOrder()->take(8)->get();

      } else {
        $data['fpros'] = User::where('featured', 1)->inRandomOrder()->take(8)->get();
      }
      return view('user.home', $data);
    }

    public function featPros() {
      if (Auth::check()) {
        if (Auth::user()->compro == 0) {
          return redirect()->route('user.comprofile');
        }
        $data['fpros'] = User::where('featured', 1)
                              ->where('id', '!=', Auth::user()->id)
                              ->where('gender', '!=', Auth::user()->gender)
                              ->where('compro', 1)
                              ->latest()->paginate(9);

      } else {
        $data['fpros'] = User::where('featured', 1)->latest()->paginate(9);
      }

      return view('user.featuredpros', $data);
    }

    public function contact() {
      return view('user.contact');
    }

    public function contactMail(Request $request) {
      $validatedRequest = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
      ]);
      // return $request->all();
      $gs = GS::first();
      $from = $request->email;
      $to = $gs->email;
      $subject = 'Query';
      $name = $request->name;
      $message = nl2br($request->message . "<br /><br />From <strong>" . $name . "</strong>");


      $headers = "From: $name <$from> \r\n";
      $headers .= "Reply-To: $name <$from> \r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


       mail($to, $subject, $message, $headers);
      Session::flash('success', 'Mail sent successfully!');
      return redirect()->back();
    }

    public function dynamicPage($slug) {
      $data['menu'] = Menu::where('slug', $slug)->first();
      return view('user.dynamic', $data);
    }


    public function comprofile() {
      return view('user.compro.form');
    }

    public function upComProfile(Request $request) {
      $validatedRequest = $request->validate([
        'date_of_birth' => 'required',
        'mother_tongue' => 'required',
        'city' => 'required',
        'religion' => 'required',
        'country' => 'required',
        'gender' => 'required',
        'marrital_status' => 'required',
        'education_level' => 'required',
        'work' => 'required',
        'education_field' => 'required',
        'diet' => 'required',
        'drink' => 'required',
        'body_type' => 'required',
        'smoke' => 'required',
        'height' => 'required',
        'skin_tone' => 'required',
        'about' => 'required',
        'disability' => 'required',
      ]);

      $user = User::find($request->userid);
      $in = Input::except('_token', 'userid');
      $user->fill($in)->save();

      Session::flash('success', 'Your profile has been updated');
      return redirect()->route('user.propic');
    }

    public function propic() {
      return view('user.compro.propic');
    }

    public function uppropic(Request $request) {
      $allowedExts = array('jpg', 'jpeg', 'png');
      $image = $request->file('pro_pic');
      $messages = [
        'pro_pic.required' => 'Profile picture is required',
      ];
      $validatedRequest = $request->validate([
        'pro_pic' => [
          'required',
          function($attribute, $value, $fail) use ($image, $allowedExts) {
              if (!empty($image)) {
                $ext = $image->getClientOriginalExtension();
                if(!in_array($ext, $allowedExts)) {
                    return $fail('Only jpg, jpeg, png files are allowed');
                }
              }
          }
        ],

      ], $messages);

      if($request->hasFile('pro_pic')) {
        $data = User::find(Auth::user()->id);
        @unlink('./assets/user/img/pro-pic/'.$data->pro_pic);
        $fileName = time() . '.jpg';
        $location = './assets/user/img/pro-pic/' . $fileName;
        $background = Image::canvas(260, 180);
        // Image::make($image)->save($location);
        $resizedImage = Image::make($image)->resize(260, 180, function ($c) {
            $c->aspectRatio();
        });
        // insert resized image centered into background
        $background->insert($resizedImage, 'center');
        // save or do whatever you like
        $background->save($location);
        $data->pro_pic = $fileName;
        $data->compro = 1;
        $data->save();

      }

      Session::flash('success', 'Profile picture updated successfully!');
      return redirect()->route('users.profile', Auth::user()->username);
    }

    public function accreq(Request $request) {
      $match = Match::where('r_id', $request->rid)->where('a_id', $request->aid)->first();
      $rmatched = Match::where('a_id', $request->aid)->where('r_id', Auth::user()->id)->where('matched', 1)->count();
      $amatched = Match::where('r_id', $request->aid)->where('a_id', Auth::user()->id)->where('matched', 1)->count();

      if ($rmatched > 0 || $amatched > 0) {
        return "matched";
      }
      $match->matched = 1;
      $match->save();
      return "success";
    }

}
