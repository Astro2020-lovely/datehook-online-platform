@extends('user.layout.master')

@section('title', "Register")

@push('styles')
<link rel="stylesheet" href="{{asset('assets/user/css/reglog.css')}}">
@endpush

@section('headertext', 'Register')

@section('subheadertext','Please fill in this form to create an account.')


@section('content')
  <div class="reg-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="" method="post">
            {{csrf_field()}}


              <label for="email"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" value="{{old('username')}}">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('username'))
                <p class="em">{{$errors->first('username')}}</p>
              @endif
              <br />

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" value="{{old('email')}}">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('email'))
                <p class="em">{{$errors->first('email')}}</p>
              @endif
              <br />

              <label for="email"><b>Name</b></label>
              <input type="text" placeholder="Enter Name" name="name" value="{{old('name')}}">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('name'))
                <p class="em">{{$errors->first('name')}}</p>
              @endif
              <br />

              <label for="email"><b>Phone</b></label>
              <input type="text" placeholder="Enter Phone Number (use phone code)" name="phone" value="{{old('phone')}}">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('phone'))
                <p class="em">{{$errors->first('phone')}}</p>
              @endif
              <br />

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password">
              <p style="margin:0px;clear:both;"></p>
              @if ($errors->has('password'))
                <p class="em">{{$errors->first('password')}}</p>
              @endif
              <br>

              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="password_confirmation">
              <p style="margin:0px;clear:both;"></p>
              <hr>

              <button type="submit" class="registerbtn base-bg">Register</button>

            <br>
            <div class="signin">
              <p>Already have an account? <a href="{{route('login')}}" style="text-decoration:underline;">Sign in</a>.</p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
