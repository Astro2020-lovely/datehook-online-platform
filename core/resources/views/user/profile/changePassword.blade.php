@extends('user.layout.master')

@section('title', "Change Password")

@section('headertext', 'Change Password')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="padding: 50px 0px;">
                <form class="contact-from-wrapper" method="post" action="{{route('users.updatePassword')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Old Password
                            <span>**</span>
                        </label>
                        <input type="password" name="old_password" placeholder="Old Password...." class="form-control input-lg">
                        @if ($errors->has('old_password'))
                            <span style="color:red;">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @else
                            @if ($errors->first('oldPassMatch'))
                                <span style="color:red;">
                                    <strong>{{"Old password doesn't match with the existing password!"}}</strong>
                                </span>
                            @endif
                        @endif
                    </div>


                    <div class="form-group">
                        <label>New Password
                            <span>**</span>
                        </label>
                        <input name="password" type="password" placeholder="New Password...." class="form-control input-lg">
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
                        <input name="password_confirmation" type="password" placeholder="Password Confirmation...." class="form-control input-lg">
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn base-bg white-txt">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
