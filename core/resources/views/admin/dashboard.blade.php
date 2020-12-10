@extends('admin.layout.master')

@push('styles')
  <style media="screen">
    a.info {
      text-decoration: none;
    }
  </style>
@endpush

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <a class="info" href="{{route('admin.allUsers')}}">
            <h4>TOTAL USERS</h4>
            <p><b>{{\App\User::count()}}</b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-times fa-3x"></i>
          <a class="info" href="{{route('admin.bannedUsers')}}">
            <h4>BANNED USERS</h4>
            <p><b>{{\App\User::where('status', 'blocked')->count()}}</b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-check fa-3x"></i>
          <a class="info" href="{{route('admin.verifiedUsers')}}">
            <h4>VERIFIED USERS</h4>
            <p><b>{{\App\User::where('email_verified', 1)->where('sms_verified', 1)->count()}}</b></p>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-mobile fa-3x"></i>
          <a class="info" href="{{route('admin.mobileUnverifiedUsers')}}">
            <h4>MOBILE UNVERIFIED USERS</h4>
            <p><b>{{\App\User::where('sms_verified', 0)->count()}}</b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-envelope fa-3x"></i>
          <a class="info" href="{{route('admin.emailUnverifiedUsers')}}">
            <h4>EMAIL UNVERIFIED USERS</h4>
            <p><b>{{\App\User::where('email_verified', 0)->count()}}</b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-envelope fa-3x"></i>
          <a class="info" href="{{route('admin.userManagement.subscribers')}}">
            <h4>TOTAL SUBSCRIBERS</h4>
            <p><b>{{\App\Subscriber::count()}}</b></p>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
           <div class="col-md-12">
               <div class="tile">
                   <h3 class="tile-title">Monthly User Registration Chart</h3>
                   <div class="embed-responsive embed-responsive-16by9">
                       <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                   </div>
               </div>
           </div>
       </div>
  </main>
@endsection

@push('scripts')
  <script type="text/javascript">
         var d = {!! json_encode($month) !!};
         var m =  {!! json_encode($sold) !!};
         var data = {
             labels: d,
             datasets: [
                 {
                     label: "My First dataset",
                     fillColor: "rgba(47, 79, 79,0.2)",
                     strokeColor: "rgba(47, 79, 79,1)",
                     pointColor: "rgba(47, 79, 79,1)",
                     pointStrokeColor: "#fff",
                     pointHighlightFill: "#fff",
                     pointHighlightStroke: "rgba(220,220,220,1)",
                     data: m
                 }
             ]
         };


         var ctxl = $("#lineChartDemo").get(0).getContext("2d");
         var lineChart = new Chart(ctxl).Line(data);

     </script>
@endpush
