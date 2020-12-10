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
           <h1><i class="fa fa-envelope"></i> SEND EMAIL TO USER</h1>
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
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 style="color:white;"><i class="fa fa-envelope"></i> SEND EMAIL TO {{$user->username}}</h4>
                  </div>
                  <div class="card-body">
                    <form class="" action="{{route('admin.sendEmailToUser')}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="userID" value="{{$user->id}}">
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><strong>SUBJECT</strong></label>
                          <input type="text" class="form-control" name="subject" value="{{old('subject')}}">
                          @if ($errors->has('subject'))
                            <p style="margin:0px;" class="text-danger">{{ $errors->first('subject') }}</p>
                          @endif
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><strong>MESSAGE </strong>NB: EMAIL WILL SENT USING EMAIL TEMPLATE</label>
                          <textarea id="message" name="message" rows="8" style="width:100%;">{{old('message')}}</textarea>
                          @if ($errors->has('message'))
                            <p style="margin:0px;" class="text-danger">{{ $errors->first('message') }}</p>
                          @endif
                        </div>
                      </div><br>
                      <button class="btn btn-block btn-primary" type="submit" name="button">SUBMIT</button>
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
