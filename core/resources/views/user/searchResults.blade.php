@extends('user.layout.master')

@section('title', "Search Page")

@section('headertext', 'Search Page')

@section('content')
  <div class="container">
    <section class="news-feeds-area" style="background-color:#fff;padding:60px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 remove-col-padding">
                    <div class="tab-content">
                        <div class="tab-pane container active" id="active_tab">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="section-title text-center" style="margin-bottom: 0px;">
                                        <h4 class="term-txt">Search Results for '{{$term}}'</h4>
                                        <form id="searchform" action="{{route('user.searchResults')}}" class="search-container search-form">
                                          <input name="term" type="text" id="search-bar" placeholder="Search users by username, name, religion...">
                                          <a href="#" onclick="event.preventDefault();document.getElementById('searchform').submit();"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                                        </form>
                                        <p style="clear:both;"></p>
                                    </div>
                                </div>
                            </div>
                            @if (count($fpros) == 0)
                                <div class="row" style="text-align:center;display:block;">
                                  <div class="col-md-12">
                                    <h2 class="">NO MATCH FOUND</h2>
                                  </div>
                                </div>
                            @else
                            <div class="row featured-jobs" id="featpros">
                              <div class="row">
                                @php
                                  $flag = 0;
                                @endphp
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

                                    @php
                                      $flag = 1;
                                    @endphp
                                  @if ($loop->iteration % 4 == 1)
                                  <div class="row"> {{-- .row start --}}
                                  @endif
                                  <div class="col-md-3 col-sm-6">
                                      <div class="single-news-box-item">
                                          <div class="thumb">
                                              <a href="{{route('users.profile', $fpro->username)}}" target="_blank"><img style="width:100%;" src="{{asset('assets/user/img/pro-pic/'.$fpro->pro_pic)}}" alt="Profile Picture"></a>
                                          </div>
                                          <div class="content">
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
                                                <h4 style="display:inline-block;float:left;margin-top: -8px;"><span class="badge base-bg">Matched</span></h4>
                                            @endif

                                            <a class="username base-txt" style="float:right;" target="_blank" href="{{route('users.profile', $fpro->username)}}">
                                              <strong style="font-size: 14px;"><i class="fa fa-user"></i> {{$fpro->username}}</strong>
                                            </a>
                                            <p style="margin:0px;clear:both;"></p>
                                            <h4 style="color:#10ac84;margin-top:20px;">{{$fpro->name}}</h4>
                                            <p>
                                              {{returnage($fpro->date_of_birth)}} years | {{$fpro->religion}}
                                            </p>
                                            <p>
                                              {{$fpro->mother_tongue}} | {{$fpro->city}}, {{$fpro->country}}
                                            </p>
                                          </div>
                                      </div>
                                  </div>
                                  @if ($loop->iteration % 4 == 0)
                                  </div> {{-- .row end --}}
                                  <br>
                                  @endif
                                @endforeach

                              </div>
                                <div class="col-12 text-center" style="margin-top:30px;">
                                  {{$fpros->appends(['term' => $term])->links()}}
                                </div>

                            </div>
                          @endif
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
      window.location = '{{route('login')}}';
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
