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
           <h1><i class="fa fa-dashboard"></i> Featured Profile Section Setting</h1>
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
                <form action="{{route('admin.fjob.update')}}" method="post" role="form">
                   {{csrf_field()}}
                   <div class="form-body">
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-12 "><strong style="text-transform: uppercase;">TITLE</strong></label>
                          <div class="col-md-12">
                             <input class="form-control input-lg" name="title" value="{{$gs->f_title}}" type="text">
                             @if ($errors->has('title'))
                               <p style="color:red;">{{$errors->first('title')}}</p>
                             @endif
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-12 "><strong style="text-transform: uppercase;">SHORT DETAILS</strong></label>
                          <div class="col-md-12">
                             <input class="form-control input-lg" name="fs_details" value="{{$gs->fs_details}}" type="text">
                             @if ($errors->has('fs_details'))
                               <p style="color:red;">{{$errors->first('fs_details')}}</p>
                             @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
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
