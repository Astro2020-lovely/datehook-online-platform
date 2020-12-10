@extends('user.layout.infoMaster')

@section('content')
  <div class="container">
    <section class="live-token-sale">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <h2>{{$gs->f_title}}</h2>
                        <p>{{$gs->fs_details}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 remove-col-padding">
                    <div class="tab-content">
                        <div class="tab-pane container active" id="active_tab">
                            <div class="row featured-jobs" id="featpros">
                                @foreach ($fpros as $fpro)
                                  @php
                                    $match = 0;
                                  @endphp
                                  @if (Auth::check())
                                    @if (!empty(\App\Match::where('a_id', Auth::user()->id)->where('r_id', $fpro->id)->first()))
                                      @if (\App\Match::where('a_id', Auth::user()->id)->where('r_id', $fpro->id)->first()->matched == 1)
                                        @php
                                          $match = 1;
                                        @endphp
                                      @endif
                                    @endif

                                    @if (!empty(\App\Match::where('r_id', Auth::user()->id)->where('a_id', $fpro->id)->first()))
                                      @if (\App\Match::where('r_id', Auth::user()->id)->where('a_id', $fpro->id)->first()->matched == 1)
                                        @php
                                          $match = 1;
                                        @endphp
                                      @endif
                                    @endif
                                  @endif


                                  <div class="col-lg-4 col-sm-12 col-md-6">
                                      <div class="single-ico-list-box">
                                          <div class="thumb"><!-- thumb start-->
                                              <a href="{{route('users.profile', $fpro->username)}}" target="_blank"><img style="width:100%;" src="{{asset('assets/user/img/pro-pic/'.$fpro->pro_pic)}}" alt="Profile Picture"></a>
                                          </div><!-- thumb end-->
                                          <div class="content"> <!-- content start-->
                                              @php
                                              if (Auth::check()) {
                                                $rqst = \App\Match::where('r_id', Auth::user()->id)->where('a_id', $fpro->id)->count();
                                              } else {
                                                $rqst = 0;
                                              }

                                              if (Auth::check()) {
                                                $rqstd = \App\Match::where('a_id', Auth::user()->id)->where('r_id', $fpro->id)->where('matched', 0)->count();
                                              } else {
                                                $rqstd = 0;
                                              }
                                              @endphp

                                              @if ($match == 0)
                                                @if ($rqstd > 0 && Auth::check())
                                                  <a style="float:left;" title="Accept Request" onclick="accreq({{$fpro->id}}, {{Auth::user()->id}})">
                                                    <div id="hrtBtn{{$fpro->id}}" class="heart"></div>
                                                  </a>
                                                @else
                                                  <a style="float:left;" title="Send Request" onclick="sendreq({{$fpro->id}})">
                                                    <div id="hrtBtn{{$fpro->id}}" class="heart {{($rqst == 1) ? 'heart-blast' : ''}}"></div>
                                                  </a>
                                                @endif
                                              @elseif ($match == 1)
                                                  <h4 style="display:inline-block;float:left;margin-top: -8px;"><span class="badge badge-info">Matched</span></h4>
                                              @endif
                                              <a class="username" style="float:right;" target="_blank" href="{{route('users.profile', $fpro->username)}}">
                                                <strong><i class="fa fa-user"></i> {{$fpro->username}}</strong>
                                              </a>
                                              <p style="margin:0px;clear:both;"></p>
                                              <strong class="job-title"></strong><br>
                                              <h4 style="color:#10ac84;">{{$fpro->name}}</h4>
                                              <p><strong><i class="fa fa-calendar" aria-hidden="true"></i> Birthday: </strong>{{date('jS F, Y',strtotime($fpro->date_of_birth))}}</p>
                                              <p><strong><i class="fa fa-check" aria-hidden="true"></i> Religion: </strong>{{$fpro->religion}}</p>
                                              <p><strong><i class="fa fa-language" aria-hidden="true"></i> Mother Tongue: </strong>{{$fpro->mother_tongue}}</p>
                                              <p><strong><i class="fa fa-map-marker" aria-hidden="true"></i> Location: </strong>{{$fpro->city}}, {{$fpro->country}}</p>
                                              <a target="_blank" href="{{route('users.profile', $fpro->username)}}" class="boxed-btn-rounded"><i class="fa fa-caret-right"></i> <span class="title" style="color:white;">Details</span></a>

                                          </div><!-- content end-->
                                      </div>
                                  </div>

                                @endforeach
                                <div class="col-12 text-center" style="margin-top:30px;">
                                  {{$fpros->links()}}
                                </div>

                                @php
                                $longAd = show_ad(2);
                                @endphp
                                <div class="col-md-12" style="margin-top: 30px;">
                                    @if (!empty($longAd[0]))
                                      @if ($longAd[0]->type == 1)
                                         <a onclick="increaseAdView({{$longAd[0]->id}})" href="{{$longAd[0]->url}}" target="_blank">
                                          <img style="width:728px;display:block;margin:0 auto;" src="{{asset('assets/user/ad_images/'.$longAd[0]->image)}}" alt="addvertisement-02">
                                         </a>
                                      @else
                                         <div onclick="increaseAdView({{$longAd[0]->id}})">{!! $longAd[0]->script !!}</div>
                                      @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
  </div>
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
          if (data == 'matched') {
            swal('Sorry!', 'Already Matched', 'error');
          }
          if (data == 'rsent') {
            swal('Sorry!', 'The person has already sent you a request.', 'error');
          }
          if (data == "sent") {
            $("#hrtBtn"+aid).addClass("heart-blast");
          }
          if (data == "asent") {
            $("#hrtBtn"+aid).removeClass("heart-blast");
          }
        }
    });
  }
  </script>
  @endauth

  <script>
  function accreq(rid, aid) {
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
          if (data == 'matched') {
            swal('Sorry!', 'Already Matched', 'error');
          }
          if (data == "success") {
            $("#featpros").load(location.href + " #featpros");
          }
        }
    });
  }
  </script>
@endpush
