@extends('user.layout.master')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/user/css/profile.css')}}">
@endpush

@section('headertext', "Profile of $user->username")

@section('content')
  <!-- details page area start -->
  <div class="details-page-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-xl col-md-4">
                  <aside class="sidebar details-page">
                      <div class="panel panel-default">
                        <div class="panel-body pro-con">
                          @auth
                            @if (Auth::user()->id == $user->id)
                              <a class="btn btn-warning btn-sm" href="{{route('user.profile.propic')}}" target="_blank">
                                <i class="fa fa-pencil-square text-white"></i>
                              </a>
                            @endif

                          @endauth

                          @if (empty($user->pro_pic))
                            <img style="width:100%" class="c-logo" src="{{asset('assets/user/img/pro-pic/nopic.png')}}" alt="sidebar image">
                          @else
                            <img style="width:100%" class="c-logo" src="{{asset('assets/user/img/pro-pic/' . $user->pro_pic)}}" alt="sidebar image">
                          @endif
                        </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading base-bg">
                          <h4 class="h4-card-title white-txt">informations</h4>
                        </div>
                        <div class="panel-body">
                          <div class="">
                            <p>
                              <strong class="base-txt"><i class="fa fa-user"></i></strong>
                              <a href="" class="base-txt"><strong>{{$user->username}}</strong></a>
                            </p>

                            @auth
                              @if (Auth::user()->id == $user->id)
                                @if (!empty($user->balance))
                                  <p>
                                    <strong><i class="fa fa-money" aria-hidden="true"></i></strong>
                                    <span>{{$gs->base_curr_symbol}} {{$user->balance}}</span>
                                  </p>
                                @else
                                  <p>
                                    <strong><i class="fa fa-money" aria-hidden="true"></i></strong>
                                    <span>{{$gs->base_curr_symbol}} 0</span>
                                  </p>
                                @endif
                              @endif

                            @endauth
                            @auth
                              @if (Auth::user()->id == $user->id)
                                <p>
                                  <strong><i class="fa fa-envelope"></i></strong>
                                  <span>{{$user->email}}</span>
                                </p>
                                <p>
                                  <strong><i class="fa fa-mobile"></i></strong>
                                  <span>{{$user->phone}}</span>
                                </p>
                              @else
                                @if (Auth::user()->package > 0)
                                  @if (\App\Match::where('a_id', Auth::user()->id)->where('r_id', $user->id)->count() > 0 || \App\Match::where('r_id', Auth::user()->id)->where('a_id', $user->id)->count() > 0)
                                    <p>
                                      <strong><i class="fa fa-envelope"></i></strong>
                                      <span>{{$user->email}}</span>
                                    </p>
                                    <p>
                                      <strong><i class="fa fa-mobile"></i></strong>
                                      <span>{{$user->phone}}</span>
                                    </p>
                                  @endif

                                @endif
                              @endif
                            @endauth
                            <p>
                              <strong><i class="fa fa-calendar"></i></strong>
                              <span>{{date('jS F, Y',strtotime($user->date_of_birth))}}</span>
                            </p>
                            <p>
                              <strong><i class="fa fa-language"></i></strong>
                              <span>{{$user->mother_tongue}}</span>
                            </p>
                            <p>
                              <strong><i class="fa fa-map-marker"></i></strong>
                              <span>{{$user->city}}, {{$user->country}}</span>
                            </p>
                            <p>
                              <strong><i class="fa fa-check"></i></strong>
                              <span>{{$user->religion}}</span>
                            </p>
                            <p>
                              <strong><i class="fa fa-heart"></i></strong>
                              <span>
                                @if ($user->marrital_status == 'nm')
                                  Never Married
                                @elseif ($user->marrital_status == 'd')
                                  Divorced
                                @elseif ($user->marrital_status == 'w')
                                  Widowed
                                @elseif ($user->marrital_status == 'ad')
                                  Awating Divorce
                                @elseif ($user->marrital_status == 'a')
                                  Annulled
                                @endif
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>

                  </aside>
              </div>
              <div class="col-lg-xl col-md-8">
                  <div class="details-page-inner"><!-- details page inner -->
                      <div class="timer-area" id="timerArea"><!-- timer area -->
                          @php
                          if (Auth::check()) {
                            $rqst = \App\Match::where('r_id', Auth::user()->id)->where('a_id', $user->id)->count();
                          } else {
                            $rqst = 0;
                          }

                          if (Auth::check()) {
                            $rqstd = \App\Match::where('a_id', Auth::user()->id)->where('r_id', $user->id)->count();
                          } else {
                            $rqstd = 0;
                          }
                          @endphp

                        @auth
                         @if (Auth::user()->id != $user->id)
                             @if ($rqst > 0 && \App\Match::where('r_id', Auth::user()->id)->where('a_id', $user->id)->first()->matched == 1)
                                 <div class="btn-wrapper" onclick="unfriend({{\App\Match::where('r_id', Auth::user()->id)->where('a_id', $user->id)->first()->id}})"><!-- btn warpper -->
                                      <a href="#" class="boxed-btn" style="background-color:#00b894;" id="boxedBtn"><i class="fa fa-times"></i> Unfriend</a>
                                 </div><!-- /.btn warpper -->
                             @elseif ($rqstd > 0 && \App\Match::where('a_id', Auth::user()->id)->where('r_id', $user->id)->first()->matched == 1)
                                 <div class="btn-wrapper" onclick="unfriend({{\App\Match::where('a_id', Auth::user()->id)->where('r_id', $user->id)->first()->id}})"><!-- btn warpper -->
                                      <a href="#" class="boxed-btn" style="background-color:#00b894;" id="boxedBtn"><i class="fa fa-times"></i> Unfriend</a>
                                 </div><!-- /.btn warpper -->
                             @elseif ($rqstd > 0 && Auth::check())
                                <div class="btn-wrapper" onclick="accreq({{$user->id}}, {{Auth::user()->id}})"><!-- btn warpper -->
                                     <a href="#" class="boxed-btn" style="background-color:#0984e3;" id="boxedBtn"><i class="fa fa-heart"></i> Confirm</a>
                                </div><!-- /.btn warpper -->
                              @elseif($rqst > 0 && Auth::check())
                                <div class="btn-wrapper" onclick="sendreq({{$user->id}})"><!-- btn warpper -->
                                     <a href="#" class="boxed-btn" style="background-color:#e17055;" id="boxedBtn"><i class="fa fa-heart"></i> Cancel Request</a>
                                </div><!-- /.btn warpper -->
                              @elseif($rqst == 0 || $rqstd == 0)
                                <div class="btn-wrapper" onclick="sendreq({{$user->id}})"><!-- btn warpper -->
                                     <a href="#" class="boxed-btn" style="background-color:#fdcb6e;" id="boxedBtn"><i class="fa fa-heart"></i> Send Request</a>
                                </div><!-- /.btn warpper -->
                              @endif
                         @endif
                        @endauth
                        @guest
                            <div class="btn-wrapper" onclick="sendreq({{$user->id}})"><!-- btn warpper -->
                                 <a href="{{route('login')}}" class="boxed-btn" style="background-color:#fdcb6e;"><i class="fa fa-heart"></i> Send Request</a>
                            </div><!-- /.btn warpper -->
                        @endguest


                          <h4 class="company-name">About <span style="color:black;">{{$user->username}}</span></h4>
                          <p>{{$user->about}}</p>

                      </div><!-- /.timer area -->
                      <div class="hr-breaak-line"></div>

                      <div class="overview-area"><!-- overview area -->
                          <div class="panel panel-default">
                            <div class="panel-heading base-bg">
                              <h5 class="white-txt">Work & Education of {{$user->name}}</h5>
                            </div>
                            <div class="panel-body">
                              <div class="point">
                                <p class="point-title">
                                  <strong><i class="fa fa-graduation-cap" aria-hidden="true" style="margin-right:0px;"></i> Education: </strong>
                                  @if ($user->education_level == 'bach')
                                    Bachelor
                                  @elseif ($user->education_level == 'doc')
                                    Doctorate
                                  @elseif ($user->education_level == 'ms')
                                    Masters
                                  @elseif ($user->education_level == 'hd')
                                    Honours Degree
                                  @elseif ($user->education_level == 'und')
                                    Undergraduate
                                  @elseif ($user->education_level == 'ad')
                                    Associates Degree
                                  @elseif ($user->education_level == 'dip')
                                    Diploma
                                  @elseif ($user->education_level == 'hs')
                                    High Scholl
                                  @elseif ($user->education_level == 'lths')
                                    Less than high school
                                  @elseif ($user->education_level == 'ts')
                                    Trade school
                                  @endif,
                                  @if ($user->education_field == 'comp')
                                    Computer/IT
                                  @elseif ($user->education_field == 'am')
                                    Advertising/Marketting
                                  @elseif ($user->education_field == 'as')
                                    Administrative services
                                  @elseif ($user->education_field == 'arch')
                                    Architecture
                                  @elseif ($user->education_field == 'af')
                                    Armed Forces
                                  @elseif ($user->education_field == 'art')
                                    Arts
                                  @elseif ($user->education_field == 'comm')
                                    Commerce
                                  @elseif ($user->education_field == 'edu')
                                    Education
                                  @elseif ($user->education_field == 'eng')
                                    Engineering/Technology
                                  @elseif ($user->education_field == 'fa')
                                    Fine Arts
                                  @elseif ($user->education_field == 'fash')
                                    Fashion
                                  @elseif ($user->education_field == 'hs')
                                    Home Science
                                  @elseif ($user->education_field == 'law')
                                    Law
                                  @elseif ($user->education_field == 'man')
                                    Management
                                  @elseif ($user->education_field == 'nh')
                                    Nursing/ Health Sciences
                                  @elseif ($user->education_field == 'oa')
                                    Office Administration
                                  @elseif ($user->education_field == 'sci')
                                    Science
                                  @elseif ($user->education_field == 'ship')
                                    Shipping
                                  @elseif ($user->education_field == 'tt')
                                    Travel & Tourism
                                  @endif
                                </p>

                                @if (!empty($user->work_as))
                                  <p class="point-title"><strong><i class="fa fa-briefcase"></i> I am a: </strong> {{$user->work_as}}</p>
                                @endif

                                <p class="point-title">
                                  @if ($user->work == "prv")
                                    <strong><i class="fa fa-check-circle"></i> I work with: </strong>
                                    private company
                                  @elseif ($user->work == "gp")
                                    <strong><i class="fa fa-check-circle"></i> I work with: </strong>
                                    Government/ Public Sector
                                  @elseif ($user->work == "dc")
                                    <strong><i class="fa fa-check-circle"></i> I work with: </strong>
                                    Defence/Civil Services
                                  @elseif ($user->work == "bs")
                                    I am self empployed/ I run business
                                  @elseif ($user->work == "nw")
                                    I am unemployed
                                  @endif
                                </p>

                                @if (!empty($user->income))
                                  <p class="point-title">
                                      <strong><i class="fa fa-money"></i> My annual income: </strong>
                                      {{$user->income}}
                                  </p>
                                @endif

                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading base-bg">
                              <h5 class="white-txt">Lifestyle of {{$user->name}}</h5>
                            </div>
                            <div class="panel-body">
                              <div class="point">
                                <p class="point-title">
                                  <strong><i class="fa fa-cutlery" aria-hidden="true"></i> Diet: </strong>
                                  @if ($user->diet == 'veg')
                                    I am Vegeterian
                                  @elseif ($user->diet == 'nv')
                                    I am Non-vegeterian
                                  @elseif ($user->diet == 'onv')
                                    I am occasionally Non-vegeterian
                                  @elseif ($user->diet == 'egg')
                                    I am Eggetarian
                                  @elseif ($user->diet == 'jain')
                                    I am Jain
                                  @elseif ($user->diet == 'vegan')
                                    I am Vegan
                                  @endif
                                </p>

                                <p class="point-title">
                                  <strong><i class="fa fa-times"></i></strong>
                                  @if ($user->smoke == "no")
                                    I don't smoke
                                  @elseif ($user->smoke == "occ")
                                    I smoke occasionally
                                  @elseif ($user->smoke == "yes")
                                    I smoke regularly
                                  @endif
                                  &
                                  @if ($user->drink == "no")
                                    I don't drink
                                  @elseif ($user->drink == "occ")
                                    I drink occasionally
                                  @elseif ($user->drink == "yes")
                                    I drink regularly
                                  @endif
                                </p>

                                <p class="point-title">
                                  <strong><i class="fa fa-male"></i></strong>
                                  My Height is <strong>{{$user->height}}</strong>, My body is
                                  <strong>
                                    @if ($user->body_type == 'ath')
                                      Athletic
                                    @elseif ($user->body_type == 'avg')
                                      Average
                                    @else
                                      {{$user->body_type}}
                                    @endif
                                  </strong>
                                  and my skin tone is
                                  @if ($user->skin_tone == 'vf')
                                    <strong>Very Fair</strong>
                                  @elseif ($user->skin_tone == 'wh')
                                    <strong>Wheatish</strong>
                                  @else
                                    <strong>{{$user->skin_tone}}</strong>
                                  @endif
                                </p>
                                <p class="point-title">
                                  <strong><i style="margin-right:0px;" class="fa fa-wheelchair" aria-hidden="true"></i></strong>
                                  I am
                                    @if ($user->disability == 'none')
                                      not physically disable
                                    @elseif ($user->disability == 'pd')
                                      physically disable
                                    @endif
                                </p>

                              </div>
                            </div>
                          </div>
                      </div> <!-- /.overview area -->

                  </div><!-- /.details page inner -->

              </div>
          </div><!-- /.row -->
      </div><!-- /.cotnainer -->
  </div>
  <!-- details page area end -->
@endsection


@push('scripts')
  @guest
  <script>
    function sendreq(aid) {
      $("#login-modal").modal('show');
    }
  </script>
  @endguest
  @auth
  <script>
  function sendreq(aid) {
    document.getElementById('boxedBtn').innerHTML = '<i class="fa fa-refresh fa-spin" style="font-size:24px"></i>';
    var fd = new FormData();
    fd.append('aid', aid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '{{route('user.sendreq')}}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if (data == 'rsent') {
            swal('Sorry!', 'The person has already sent you a request.', 'error');
          }
          if (data == "sent") {
            $("#timerArea").load(location.href + " #timerArea");
          }
          if (data == "asent") {
            $("#timerArea").load(location.href + " #timerArea");
          }
        }
    });
  }
  </script>
  @endauth

  <script>
  function accreq(rid, aid) {
    document.getElementById('boxedBtn').innerHTML = '<i class="fa fa-refresh fa-spin" style="font-size:24px"></i>';
    var fd = new FormData();
    fd.append('rid', rid);
    fd.append('aid', aid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '{{route('user.accreq')}}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if (data == "success") {
            $("#timerArea").load(location.href + " #timerArea");
          }
        }
    });
  }
  </script>

  <script>
    function unfriend(rid) {
      swal({
        title: "Confirmation",
        text: "Are you sure, you want to unfriend?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willunfriend) => {
        if (willunfriend) {
          document.getElementById('boxedBtn').innerHTML = '<i class="fa fa-refresh fa-spin" style="font-size:24px"></i>';
          var fd = new FormData();
          fd.append('rid', rid);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            url: '{{route('user.unfriend')}}',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data) {
              console.log('success');
              if (data == "success") {
                $("#timerArea").load(location.href + " #timerArea");
              }
            }
          });
        }
      });
    }
  </script>
@endpush
