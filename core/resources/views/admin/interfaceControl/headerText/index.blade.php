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
           <h1><i class="fa fa-dashboard"></i> Header Text Setting</h1>
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
                <form action="{{route('admin.headerText.update')}}" method="post" role="form">
                   {{csrf_field()}}
                   <div class="form-body">
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-12 "><strong style="text-transform: uppercase;">HEADER TEXT</strong></label>
                          <div class="col-md-12">
                             <input class="form-control input-lg" name="sText" value="{{$gs->header_stext}}" type="text">
                             @if ($errors->has('sText'))
                               <p style="color:red;">{{$errors->first('sText')}}</p>
                             @endif
                          </div>
                        </div>
                      </div>
                      {{-- <div class="form-group">
                        <div class="row">
                          <label class="col-md-12 "><strong style="text-transform: uppercase;">BOLD TEXT</strong></label>
                          <div class="col-md-12">
                             <input class="form-control input-lg" name="bText" value="{{$gs->header_btext}}" type="text">
                             @if ($errors->has('bText'))
                               <p style="color:red;">{{$errors->first('bText')}}</p>
                             @endif
                          </div>
                        </div>
                      </div> --}}
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
