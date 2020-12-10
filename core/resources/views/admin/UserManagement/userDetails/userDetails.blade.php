@extends('admin.layout.master')

@push('styles')
  <style media="screen">
  h2, h3, h4 {
    margin: 0px;
  }
  .widget-small {
    margin-bottom: 0px;
    border: 1px solid #f1f1f1;
  }
  .info h4 {
    font-size: 14px !important;
  }
  </style>
@endpush

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> User Details</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-md-3">
                <div class="card border-primary">
                  <div class="card-header border-primary bg-primary">
                    <h3 style="color:white;"><i class="fa fa-user"></i> PROFILE</h3>
                  </div>
                  <div class="card-body">
                    <div class="card border-primary">
                      <img style="width:100%;" src="{{asset('assets/user/img/pro-pic/'.$user->pro_pic)}}" alt="">
                    </div>
                    <br>
                    <div class="text-center">
                      <h3>{{$user->username}}</h3><br>
                      <h4>{{$user->email}}</h4><br>
                      <h3>Balance: {{$user->balance}} {{$gs->base_curr_text}}</h3><br>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-desktop"></i> DETAILS</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class="icon fa fa-download fa-3x" aria-hidden="true"></i>
                          <a class="info" href="{{route('admin.userManagement.depositLog', $user->id)}}">
                            <h4>DEPOSITS</h4>
                            <p><b>{{$user->deposits()->where('status', 1)->count()}}</b></p>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="widget-small danger coloured-icon"><i class="icon fa fa-exchange fa-3x"></i>
                          <a class="info" href="{{route('admin.userManagement.trxlog', $user->id)}}">
                            <h4>TRANSACTIONS</h4>
                            <p><b>{{$user->transactions()->count()}}</b></p>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-cog"></i> OPERATIONS</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="{{route('admin.addSubtractBalance', $user->id)}}" style="color:white;" class="btn btn-info btn-block"><i class="fa fa-money"></i> ADD / SUBTRACT BALANCE</a>
                      </div>
                      <div class="col-md-6">
                        <a href="{{route('admin.emailToUser', $user->id)}}" style="color:white;" class="btn btn-danger btn-block"><i class="fa fa-envelope"></i> SEND MAIL</a>
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-cog"></i> UPDATE PROFILE</h3>
                  </div>
                  <div class="card-body">
                    <form class="" action="{{route('admin.updateUserDetails')}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="userID" value="{{$user->id}}">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for=""><strong>Name</strong></label>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                            @if ($errors->has('name'))
                             <p class="text-danger" style="margin:0px;">{{$errors->first('name')}}</p>
                           @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for=""><strong>Email</strong></label>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}">
                            @if ($errors->has('email'))
                             <p class="text-danger" style="margin:0px;">{{$errors->first('email')}}</p>
                           @endif
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for=""><strong>Phone</strong></label>
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
                            @if ($errors->has('phone'))
                             <p class="text-danger" style="margin:0px;">{{$errors->first('phone')}}</p>
                           @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                           <label><strong>Status</strong></label>
                           <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                              data-width="100%" type="checkbox" data-on="ACTIVE" data-off="BLOCKED"
                              name="status" {{$user->status=='active'?'checked':''}}>
                        </div>
                        <div class="col-md-4">
                           <label><strong>Email Verification</strong></label>
                           <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                              data-width="100%" type="checkbox" data-on="VERIFIED" data-off="NOT VERIFIED"
                              {{($user->email_verified==1)?'checked':''}} name="emailVerification">
                        </div>
                        <div class="col-md-4">
                           <label><strong>SMS Verification</strong></label>
                           <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                              data-width="100%" type="checkbox" data-on="VERIFIED" data-off="NOT VERIFIED"
                              {{($user->sms_verified==1)?'checked':''}} name="smsVerification">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-info btn-block" name="button">UPDATE</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
  </main>
@endsection
