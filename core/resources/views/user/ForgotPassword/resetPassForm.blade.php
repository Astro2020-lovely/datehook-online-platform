@extends('user.layout.master')

@section('content')
  <!-- Login Section Start -->
  <div class="row">
    <div class="col-md-6 col-md-offset-3" style="padding:50px 0px;">
      <div class="panel panel-default">
        <div class="panel-heading base-bg">
          <h4 class="white-txt">Reset Password</h4>
        </div>
        <div class="panel-body">
          <form action="{{route('user.resetPassword')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="code" value="{{$code}}">
            <input type="hidden" name="email" value="{{$email}}">

            <div class="form-group">
                <label>New Password
                    <span>**</span>
                </label>
                <input type="password" name="password" value="" placeholder="New Password...." class="form-control">
                @if ($errors->has('password'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label>Password Confirmation
                    <span>**</span>
                </label>
                <input type="password" name="password_confirmation" value="" placeholder="Enter Password Again...." class="form-control">
                @if ($errors->has('password_confirmation'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="text-center">
              <input class="btn btn-success" type="submit" value="Update Password">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
