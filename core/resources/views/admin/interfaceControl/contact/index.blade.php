@extends('admin.layout.master')

@push('styles')
<style media="screen">
  h3 {
    margin: 0px;
  }
</style>
@endpush

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Contact Setting</h1>
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

              <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" action="{{route('admin.contact.update')}}" method="post" role="form">
                   {{csrf_field()}}
                   <div class="form-body">
                     <div class="form-group">
                        <label class="col-md-12 "><strong style="text-transform: uppercase;">Title</strong></label>
                        <div class="col-md-12">
                           <input class="form-control input-lg" name="con_title" value="{{$gs->con_title}}" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-12 "><strong style="text-transform: uppercase;">Short Details</strong></label>
                        <div class="col-md-12">
                           <input class="form-control input-lg" name="con_sdetails" value="{{$gs->con_sdetails}}" type="text">
                        </div>
                     </div>
                      <div class="form-group">
                         <label class="col-md-12 "><strong style="text-transform: uppercase;">EMAIL</strong></label>
                         <div class="col-md-12">
                            <input class="form-control input-lg" name="email" value="{{$gs->email}}" type="text">
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-md-12 "><strong style="text-transform: uppercase;">mobile</strong></label>
                         <div class="col-md-12">
                            <input class="form-control input-lg" name="phone" value="{{$gs->phone}}" type="text">
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-md-12 "><strong style="text-transform: uppercase;">Opening Hours</strong></label>
                         <div class="col-md-12">
                            <input class="form-control input-lg" name="o_hours" value="{{$gs->o_hours}}" type="text">
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="col-md-12 "><strong style="text-transform: uppercase;">Location</strong></label>
                         <div class="col-md-12">
                            <input class="form-control input-lg" name="c_location" value="{{$gs->c_location}}" type="text">
                         </div>
                      </div>
                      <div class="form-group">
                         <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-block btn-lg">UPDATE</button>
                         </div>
                      </div>
                   </div>
                </form>
              </div>

            </div>
          </div>
        </div>
     </div>
  </main>
@endsection
