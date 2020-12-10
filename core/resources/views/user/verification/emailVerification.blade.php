@extends('user.layout.master')

@section('title', 'Email Verification')

@section('headertext', 'Email Verification')

@push('styles')
<style media="screen">
  .content {
    padding: 50px 0px;
    min-height: 500px;
  }
</style>
@endpush

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3" style="padding: 90px 0px;">
      <div class="login-header">
        <h4 style="">A code has been sent to your email please enter the code to verify your E-mail account</h4>
      </div>
      <div class="login-form">
        @if (session()->has('error'))
          <div class="alert alert-danger" role="alert">
            {{session('error')}}
          </div>
        @endif
        <form action="{{route('user.checkEmailVerification')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
              <label>Email
              </label>
              <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="" class="form-control input-lg" readonly>
          </div>
          <div class="form-group">
              <label>Verification Code
                  <span>**</span>
              </label>
              <input type="text" name="email_ver_code" value="" placeholder="Enter your verification code..." class="form-control input-lg">
              @if ($errors->has('email_ver_code'))
                  <span style="color:red;">
                      <strong>{{ $errors->first('email_ver_code') }}</strong>
                  </span>
              @endif
          </div>
          <div class="text-center">
            <input class="btn base-bg white-txt" type="submit" value="Submit">
          </div>

        </form>
        <form action="{{route('user.sendVcode')}}" method="POST">
            {{csrf_field()}}
              <input type="hidden" name="email" value="{{Auth::user()->email}}" placeholder="" class="input-field-square">
              <div>
                if you didn't get any mail <button class="btn btn-link" type="submit">click here</button> to resend
              </div>
        </form>
      </div>
    </div>
  </div>

@endsection
