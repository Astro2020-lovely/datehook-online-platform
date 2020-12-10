@extends('admin.layout.master')

@push('styles')
<style media="screen">
  h3 {
    margin: 0px;
  }
  .fileinput .thumbnail img {
    width: 100%;
  }
</style>
@endpush

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Background Image</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
             <form class="" method="POST" action="{{route('admin.background.update')}}" enctype="multipart/form-data">
               {{csrf_field()}}
               <div class="row">
                  <div class="form-group col-md-6">
                     <div class="card">
                        <div class="card-header bg-primary">
                           <h3 style="color:white;">Banner Section</h3>
                        </div>
                        <div class="card-body">
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                 <img style="width:100%;" src="{{ asset('assets/user/interfaceControl/backgroundImage/banner.jpg') }}" alt="" />
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                              <div>
                                 <span class="btn btn-success btn-file">
                                 <span class="fileinput-new"> Change Image </span>
                                 <span class="fileinput-exists"> Change </span>
                                 <input type="file" name="banner">
                                 </span>
                                 <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <p><strong>[Upload 1920 X 750 image for best quality]</strong></p>
                           @if ($errors->has('banner'))
                           <p style="color:red">{{$errors->first('banner')}}</p>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="card">
                        <div class="card-header bg-primary">
                           <h3 style="color:white;">Footer Section</h3>
                        </div>
                        <div class="card-body">
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail">
                                 <img src="{{ asset('assets/user/interfaceControl/backgroundImage/footer.jpg') }}" alt="" />
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="width: 100%;"> </div>
                              <div>
                                 <span class="btn btn-success btn-file">
                                 <span class="fileinput-new"> Change Image </span>
                                 <span class="fileinput-exists"> Change </span>
                                 <input type="file" name="footer">
                                 </span>
                                 <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <p><strong>[Upload 1920 X 328 image for best quality]</strong></p>
                           @if ($errors->has('footer'))
                           <p style="color:red">{{$errors->first('footer')}}</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="row">
                 <div class="col-md-12">
                   <button type="submit" class="btn btn-lg btn-info btn-block">UPDATE</button>
                 </div>
               </div>
             </form>
           </div>
        </div>
     </div>
  </main>
@endsection
