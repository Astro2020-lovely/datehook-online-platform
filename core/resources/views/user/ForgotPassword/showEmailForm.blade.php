@extends('user.layout.master')

@section('headertext', 'Password Reset')

@section('content')
  <div class="container">
    <div class="row" style="min-height:520px;">
      <div class="col-md-12" style="padding-top:50px;">

        @if (session()->has('email_not_available'))
          <div class="alert alert-danger">
            {{session('email_not_available')}}
          </div>
        @endif
        @if (session()->has('message'))
          <div class="alert alert-success">
            {{session('message')}}
          </div>
        @endif

        <div class="panel panel-default">
          <div class="panel-heading base-bg">
            <h4 style="color:white;">Email</h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <form id="sendResetPassMailForm" action="{{route('user.sendResetPassMail')}}" class="" method="post">
                  {{csrf_field()}}
                  <div class="form-group login">
                      <input name="resetEmail" type="text" placeholder="Enter your mail address...." class="form-control input-lg">
                      @if ($errors->has('resetEmail'))
                        <p class="text-danger">{{$errors->first('resetEmail')}}</p>
                      @endif
                  </div>
                  <div class="form-group text-center">
                    <input class="btn btn-success" type="submit" name="" value="Send">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
