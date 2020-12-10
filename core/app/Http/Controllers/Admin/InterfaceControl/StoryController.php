<?php

namespace App\Http\Controllers\Admin\InterfaceControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting as GS;
use App\Story;
use Session;
use Image;


class StoryController extends Controller
{
    public function index() {
      $data['stories'] = Story::all();
      return view('admin.interfaceControl.story.index', $data);
    }

    public function storyUpdate(Request $request) {
        $validatedRequest = $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $gs = GS::first();
        $gs->story_title = $request->title;
        $gs->story_details = $request->details;
        $gs->save();

        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }

    public function storyStore(Request $request) {
        $validatedRequest = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'couple_name' => 'required',
            'story' => 'required|max:200',
        ]);

        $story = new Story;
        $story->couple_name = $request->couple_name;
        $story->story = $request->story;
        if($request->hasFile('photo'))
        {
          $fileName = time() . '.jpg';
          $location = 'assets/user/interfaceControl/story/' . $fileName;

          $resizedImage = Image::make($request->file('photo'))->resize(370, 280)->save($location);
          $story->image = $fileName;
        }
        $story->save();

        Session::flash('success', 'Added Successfully');
        return redirect()->back();
    }

    public function storydetUpdate(Request $request, $id) {
        $validatedRequest = $request->validate([
          'couple_name' => 'required',
          'story' => 'required|max:200',
        ]);

        $story = Story::find($id);
        $story->couple_name = $request->couple_name;
        $story->story = $request->story;
        if($request->hasFile('photo'))
        {
          @unlink('assets/user/interfaceControl/story/' . $story->image);
          $fileName = time() . '.jpg';
          $location = 'assets/user/interfaceControl/story/' . $fileName;

          $resizedImage = Image::make($request->file('photo'))->resize(370, 280)->save($location);
          $story->image = $fileName;
        }
        $story->save();

        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }

    public function storyDestroy(Request $request) {
        $id = $request->storyId;
        $story = Story::find($id);
        $story->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->back();
    }
}
