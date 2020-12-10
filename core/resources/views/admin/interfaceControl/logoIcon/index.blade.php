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
           <h1><i class="fa fa-dashboard"></i> Logo & Icon Setting</h1>
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
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-cog"></i> Change Images</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.logoIcon.update')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                       <div class="row">
                          <div class="form-group">
                             <label class="col-md-12"><strong style="text-transform: uppercase;">logo</strong></label>
                             <div class="col-sm-12"><input name="logo" type="file" id="logo"></div>
                             <p class="col-md-12"><strong>[Upload 190 X 49 image for best quality]</strong></p>

                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="form-group">
                             <label class="col-md-12"><strong style="text-transform: uppercase;">favicon</strong></label>
                             <div class="col-sm-12"><input name="icon" type="file" id="icon"></div>
                             <p class="col-md-12"><strong>[Upload 25 X 25 image for best quality]</strong></p>

                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="form-group">
                             <div class="col-sm-12"> <button type="submit" class="btn btn-primary btn-block">UPLOAD</button></div>
                          </div>
                       </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-desktop"></i> Current Icon</h3>
                  </div>
                  <div class="card-body">
                    <img style="max-width:100%;" src="{{asset('assets/user/interfaceControl/logoIcon/icon.jpg')}}" alt="">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-desktop"></i> Current Logo</h3>
                  </div>
                  <div class="card-body">
                    <img style="max-width:100%;" src="{{asset('assets/user/interfaceControl/logoIcon/logo.jpg')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
  </main>
@endsection
