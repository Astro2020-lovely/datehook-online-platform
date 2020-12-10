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
           <h1><i class="fa fa-dashboard"></i> Footer Text Setting</h1>
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
                <form action="{{route('admin.footer.update')}}" method="post" role="form">
                  {{csrf_field()}}
                   <div class="form-body">
                      <div class="form-group">
                         <label class="col-md-12"><strong style="text-transform: uppercase;">TEXT</strong></label>
                         <div class="col-md-12">
                            <textarea id="footerTextArea" style="width:100%;" class="form-control" name="footer" rows="3" cols="80">{!! $gs->footer !!}</textarea>
                         </div>
                      </div>
                      <br>
                      <div class="row">
                         <div class="col-md-12">
                           <div class="col-md-12">
                             <button type="submit" class="btn btn-info btn-block btn-lg">UPDATE</button>

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
  </main>
@endsection
