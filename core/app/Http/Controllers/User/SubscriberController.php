<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Session;

class SubscriberController extends Controller
{
    public function store(Request $request) {

        // return $request->all();
        $validatedData = $request->validate([
            'email' => 'required|unique:subscribers|max:255'
        ]);

        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->save();

        Session::flash('success', 'You have subscribed successfully');

        return redirect()->back();
    }
}
