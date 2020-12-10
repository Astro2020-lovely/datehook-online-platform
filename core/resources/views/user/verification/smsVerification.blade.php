@extends('user.layout.infoMaster')

@section('title', 'SMS Verification')

@section('headertext', 'SMS Verification')

@push('styles')
<style media="screen">
  .content {
    padding: 50px 0px;
    min-height: 500px;
  }
</style>
@endpush

@section('content')

          <div class="col-md-6 offset-md-3 content" style="">
            <div class="login-header">
              <h4 style="">A code has been sent to your phone please enter the code to verify your phone number</h4>
            </div>
            <div class="login-form">
              @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                  {{session('error')}}
                </div>
              @endif
              <form action="{{route('emp.checkSmsVerification')}}" method="POST">
                {{csrf_field()}}
                <div class="form-element square">
                    <label>Phone
                    </label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="" class="input-field-square" readonly>
                </div>
                <div class="form-element square">
                    <label>Verification Code
                        <span>**</span>
                    </label>
                    <input type="text" name="sms_ver_code" value="" placeholder="Enter your verification code..." class="input-field-square">
                    @if ($errors->has('sms_ver_code'))
                        <span style="color:red;">
                            <strong>{{ $errors->first('sms_ver_code') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="text-center">
                  <input class="btn btn-success" type="submit" value="Submit">
                </div>
              </form>
              <form action="{{route('emp.sendVcode')}}" method="POST">
                  {{csrf_field()}}
                    <input type="hidden" name="phone" value="{{Auth::user()->phone}}" placeholder="" class="input-field-square">
                    <div>
                      if you didn't get any mail <button class="btn btn-link" type="submit">click here</button> to resend
                    </div>
              </form>
            </div>
          </div>

@endsection
