@extends('user.layout.master')

@push('styles')
<style media="screen">
  @media only screen and (max-width: 767px) {
    .heart {
        position: static;
        width: 100px;
        height: 70px;
        cursor: pointer;
        transform: translate(0%, -15%);
        display: block;
        margin: 0 auto;
    }
    .created_at {
      padding: 0px 0px 30px 0px;
    }
  }
</style>
@endpush

@section('headertext', 'Match Requests')

@section('content')
  <div class="container">
  	<div class="row">
      <div class="row">
        <section class="content" style="padding: 50px 0px;">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="">

                <div class="table-container">
                  @if (count($requests) == 0)
                    <h3 class="text-center">NO MATCH REQUEST FOUND</h3>
                  @endif
                  <table class="table table-filter">
                    <tbody>
                      @foreach ($requests as $request)
                        @php
                          $user = \App\User::find($request->r_id);
                        @endphp
                        <div class="row text-center border-bottom" id="tr{{$request->id}}">
                          <div class="col-sm-2">
                            <a href="{{route('users.profile', $user->username)}}" target="_blank">
                              <img src="{{asset('assets/user/img/pro-pic/'.$user->pro_pic)}}" class="media-photo">
                            </a>
                          </div>
                          <div class="col-sm-1">
                            <a title="Accept match request" onclick="">
                              <div id="hrtBtn{{$request->id}}" class="heart" onclick="match({{$request->id}})"></div>
                            </a>
                          </div>
                          <div class="col-sm-5">
                            <h4 class="title">
                              <a href="{{route('users.profile', $user->username)}}" target="_blank" class="base-txt"><i class="fa fa-user"></i> {{$user->username}}</a>
                            </h4>
                            <p class="summary"><strong><i class="fa fa-calendar"></i> Date of Birth: </strong> {{date('jS F, Y',strtotime($user->date_of_birth))}}</p>
                            <p class="summary"><strong><i class="fa fa-map-marker"></i> Address: </strong> {{$user->city}}, {{$user->country}}</p>
                          </div>
                          <div class="col-sm-4 created_at">
                            <span>{{$request->created_at}}</span>
                          </div>
                        </div>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  {{$requests->links()}}
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

  	</div>
  </div>
@endsection

@push('scripts')
  <script>
  function match(rid) {
    var fd = new FormData();
    fd.append('rid', rid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '{{route('user.match')}}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if (data == "success") {
            $("#hrtBtn"+rid).addClass("heart-blast");
            $("#tr"+rid).remove();
          }
        }
    });
  }
  </script>
@endpush
