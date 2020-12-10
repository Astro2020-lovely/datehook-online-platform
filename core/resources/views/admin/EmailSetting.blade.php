@extends('admin.layout.master')

@push('nicedit-scripts')
  <script src="{{asset('assets/nic-edit/nicEdit.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
      new nicEditor({iconsPath : '{{asset('assets/nic-edit/nicEditorIcons.gif')}}', fullPanel : true}).panelInstance('emailTemplate');
    });
  </script>
@endpush

@section('content')
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Email Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title ">Short Code</h3>
              <div class="tile-body">
                 <div class="table-responsive">
                    <table class="table table-striped table-hover">
                       <thead>
                          <tr>
                             <th> # </th>
                             <th> CODE </th>
                             <th> DESCRIPTION </th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td> 1 </td>
                             <td>
                                <pre>&#123;&#123;message&#125;&#125;</pre>
                             </td>
                             <td> Details Text From Script</td>
                          </tr>
                          <tr>
                             <td> 2 </td>
                             <td>
                                <pre>&#123;&#123;name&#125;&#125;</pre>
                             </td>
                             <td> Users Name. Will Pull From Database and Use in EMAIL text</td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <div class="tile-body">
                 <form role="form" method="POST" action="{{route('admin.UpdateEmailSetting')}}" enctype="multipart/form-data">
                    <div class="form-body">
                       {{csrf_field()}}
                       <div class="form-group">
                          <label><strong>EMAIL SENT FROM</strong></label>
                          <input type="email" name="emailSentFrom" class="form-control input-lg" value="{{$gs->email_sent_from}}">
                          @if ($errors->has('emailSentFrom'))
                            <span style="color:red;">{{$errors->first('emailSentFrom')}}</span>
                          @endif
                       </div>
                       <div class="form-group">
                          <label><strong>EMAIL TEMPLATE</strong></label>
                          <textarea class="form-control" name="emailTemplate" id="emailTemplate" rows="10">{{$gs->email_template}}</textarea>
                          @if ($errors->has('emailTemplate'))
                            <span style="color:red;">{{$errors->first('emailTemplate')}}</span>
                          @endif
                       </div>
                    </div>
                    <div class="form-actions">
                       <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </main>
@endsection
