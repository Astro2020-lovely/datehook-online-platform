@extends('user.layout.master')

@section('title', "Sign in")

@push('styles')
<link rel="stylesheet" href="{{asset('assets/user/css/reglog.css')}}">
@endpush

@section('headertext', 'Login')

@section('subheadertext','Please fill in this form to log into your account.')

@section('content')
  <div class="reg-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="{{route('user.authenticate')}}" method="post">
            {{csrf_field()}}

              @if (session()->has('missmatch'))
                <div class="alert alert-danger">
                  {{session('missmatch')}}
                </div>
              @endif
              <label for="email"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" value="{{old('username')}}">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('username'))
                <p class="em">{{$errors->first('username')}}</p>
              @endif
              <br />

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('password'))
                <p class="em">{{$errors->first('password')}}</p>
              @endif
              <br />
              <hr>
              <p><a style="text-decoration:underline;" href="{{route('user.showEmailForm')}}">Forgot Password?</a></p>

              <button type="submit" class="registerbtn base-bg">Login</button>

            <br>
            <div class="signin">
              <p>Don't have an account? <a href="{{route('user.regform')}}" style="text-decoration:underline;">Sign up</a>.</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
