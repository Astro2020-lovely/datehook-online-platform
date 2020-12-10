@extends('user.layout.master')

@section('content')

<!-- our feature area start -->
<section class="feature-area">
  <div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
              <div class="section-title">
                  <div class="icon">
                      <img src="assets/user/img/separator.png" alt="">
                  </div>
                  <h3>Find your Special Someone</h3>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="our-feature-wrapper">
                  <ul>
                      <li>
                          <div class="single-feature-item">
                              <div class="icon">
                                  <i class="fa fa-pencil-square"></i>
                              </div>
                              <div class="content">
                                  <a href="#">
                                      <h4>Sign up</h4>
                                  </a>
                                  <p>Register for free & put up your Profile</p>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="single-feature-item">
                              <div class="icon">
                                  <i class="fa fa-users" aria-hidden="true"></i>
                              </div>
                              <div class="content">
                                  <a href="#">
                                      <h4>Connect</h4>
                                  </a>
                                  <p>Select & Connect with Matches you like</p>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="single-feature-item">
                              <div class="icon ">
                                  <i class="fa fa-comments-o" aria-hidden="true"></i>
                              </div>
                              <div class="content">
                                  <a href="#">
                                      <h4>Interact</h4>
                                  </a>
                                  <p>Become a Member & Start a Conversation</p>
                              </div>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- our feature area end -->


<!-- news feeds area start -->
<section class="news-feeds-area" id="blog">
  <div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
              <div class="section-title">
                  <div class="icon">
                      <img src="assets/user/img/separator.png" alt="">
                  </div>
                  <h3>{{$gs->f_title}}</h3>
                  <p>{{$gs->fs_details}}</p>
              </div>
          </div>
      </div>
      <div id="featpros">
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
          @endforeach
        </div>
      </div>
  </div>
</section>
<!-- news feeds area end -->


<!-- counter area start -->
<div class="counter-area counter-bg" id="clients">
  <span class="bg-text">Some Fun Facts</span>
  <div class="container">
      <div class="row">
          <div class="col-md-3 col-sm-6 text-center">
              <div class="single-counter-box">
                  <div class="icon">
                      <i class="fa fa-users"></i>
                  </div>
                  <div class="content">
                      <span class="counter-text">Total Users</span>
                      <span class="counter-number">
                           {{\App\User::count()}}
                      </span>
                  </div>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 text-center">
              <div class="single-counter-box">
                  <div class="icon two">
                      <i class="fa fa-heart"></i>
                  </div>
                  <div class="content">
                      <span class="counter-text">Total Matches</span>
                      <span class="counter-number">
                           {{\App\Match::count()}}
                      </span>
                  </div>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 text-center">
              <div class="single-counter-box">
                  <div class="icon">
                      <i class="fa fa-star"></i>
                  </div>
                  <div class="content">
                      <span class="counter-text">Featured Profiles</span>
                      <span class="counter-number">
                           {{\App\User::where('featured', 1)->count()}}
                      </span>
                  </div>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 text-center">
              <div class="single-counter-box">
                  <div class="icon">
                      <i class="fa fa-user"></i>
                  </div>
                  <div class="content">
                      <span class="counter-text">Paid Members</span>
                      <span class="counter-number">
                           {{\App\User::where('package', '>', 0)->count()}}
                      </span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- counter area end -->



<!-- our portfolio area start -->
<section class="portfolio-area" id="work">
   <div class="container">
       <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
              <div class="section-title">
                  <div class="icon">
                      <img src="assets/user/img/separator.png" alt="">
                  </div>
                  <a href="#">
                      <h3>{{$gs->story_title}}</h3>
                  </a>
                  <p>{{$gs->story_details}}</p>
              </div>
          </div>
       </div>
       <div class="row">
           <div class="col-md-12">
               <div class="portfolio-masonary-wrapper">
                 @foreach ($stories as $story)
                   <div class="col-md-4 col-sm-6 single-portfolio-item grid-sizer plan ui">
                       <div class="thumb">
                         <div class="row">
                           <div class="col-md-12 text-center">
                             <img src="{{asset('assets/user/interfaceControl/story/'.$story->image)}}" alt="portfolio images">
                             <div class="hover" style="padding:0px 30px">
                                <h4 style="color:white;">{{$story->couple_name}}</h4>
                                <p style="color:white;">
                                  {{$story->story}}
                                </p>
                             </div>
                           </div>
                         </div>
                       </div>
                   </div>
                 @endforeach
               </div>
           </div>
       </div>
   </div>
</section>
<!-- our portfolio area end -->


<!-- subscribe area start -->
<section class="subscribe-area" id="subscribe">
  <span class="bg-text">Subscribe</span>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
              <div class="subscriber-wrapper">
                  <h2>{{$gs->subsc_title}}</h2>
                  <p class="white-txt">{{$gs->subsc_details}}</p>
                  <div class="form-wrapper">
                      <form action="{{route('users.subsc.store')}}" method="post">
                          {{ csrf_field() }}
                          <input type="email" name="email" id="email" placeholder="Enter your email.....">
                          <input type="submit" value="Submit Now">
                          @if ($errors->has('email'))
                            <p class="white-txt">{{$errors->first('email')}}</p>
                          @endif
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- subscribe area end -->

<!-- logo carousel area start -->
<div class="logo-carousel-area">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">PAYMENT WE ACCEPT</h3><br>
              <div class="logo-carousel">
                @foreach (\App\Gateway::where('status', 1)->get() as $gateway)
                  <div class="single-logo-item">
                      <img src="{{asset('assets/gateway/'.$gateway->id.'.jpg')}}" alt="logo images">
                  </div>
                @endforeach

              </div>
          </div>
      </div>
  </div>
</div>
<!-- logo carousel area end -->

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
