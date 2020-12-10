@extends('admin.layout.master')

@push('nicedit-scripts')
  <script src="{{asset('assets/nic-edit/nicEdit.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
      new nicEditor({iconsPath : '{{asset('assets/nic-edit/nicEditorIcons.gif')}}', fullPanel : true}).panelInstance('message');
    });
  </script>
@endpush

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
           <h1><i class="fa fa-dashboard"></i> Send News Letter</h1>
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
                <form role="form" method="POST" action="{{route('admin.mailtosubsc')}}" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="form-body">
                      <div class="form-group">
                         <label>Subject</label>
                         <input type="text" name="subject" class="form-control input-lg" value="">
                         @if ($errors->has('subject'))
                           <p style="color:red;">{{$errors->first('subject')}}</p>
                         @endif
                      </div>
                      <div class="form-group">
                         <label>Email Message</label>
                         <textarea id="message" class="form-control" name="message" rows="5">
                         </textarea>
                         @if ($errors->has('message'))
                           <p style="color:red;">{{$errors->first('message')}}</p>
                         @endif
                      </div>
                   </div>
                   <div class="form-actions">
                      <button type="submit" class="submit-btn btn btn-primary btn-lg btn-block login-button">Broadcast Email</button>
                   </div>
                </form>
              </div>

            </div>
            <br>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 class="text-white"><i class="fa fa-list"></i> ALL SUBSCRIBERS</h3>
                  </div>
                  <div class="card-body">
                    @foreach ($subscribers as $subscriber)
                      {{$subscriber->email}}
                      @if (!$loop->last)
                        , &nbsp;
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
  </main>
@endsection
