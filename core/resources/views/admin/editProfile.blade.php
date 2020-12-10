@extends('admin.layout.master')

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Edit Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <div class="tile-body">
                <div class="row">
                  <div class="col-md-6 offset-md-3">
                    <form action="{{route('admin.updateProfile', $admin->id)}}" method="post">
                       {{csrf_field()}}
                       <input type="hidden" name="adminID" value="{{$admin->id}}">
                       <div class="form-body">
                          <div class="form-group">
                              <div class="col-md-12">
                                <label class="control-label"><strong>FULL NAME</strong></label>
                              </div>
                             <div class="col-md-12">
                                <input class="form-control input-lg" name="name" value="{{$admin->name}}" placeholder="Your Full Name" type="text">
                                @if ($errors->has('name'))
                                  <p style="margin:0px;" class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                             </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                             <label class="control-label"><strong>EMAIL</strong></label>
                            </div>
                             <div class="col-md-12">
                                <input class="form-control input-lg" name="email" value="{{$admin->email}}" placeholder="Your Email" type="email">
                                @if ($errors->has('email'))
                                  <p style="margin:0px;" class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                             </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                             <label class="control-label"><strong>MOBILE</strong></label>
                            </div>
                             <div class="col-md-12">
                                <input class="form-control input-lg" name="phone" value="{{$admin->phone}}" placeholder="Your Mobile Number" type="text">
                                @if ($errors->has('phone'))
                                  <p style="margin:0px;" class="text-danger">{{$errors->first('phone')}}</p>
                                @endif
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-12">
                               <div class="col-md-12">
                                 <button type="submit" class="btn btn-info btn-block">UPDATE</button>
                               </div>
                             </div>
                          </div>
                       </div>
                    </form>
                  </div>
                </div>

              </div>
           </div>
        </div>
     </div>
  </main>
@endsection
