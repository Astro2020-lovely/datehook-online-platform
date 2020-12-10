@extends('user.layout.master')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/user/css/chat.css')}}">
@endpush

@section('headertext', 'Conversation')

@section('content')

    <div class="content" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="padding-bottom: 20px;">
                    <div class="panel-heading base-bg">
                        <h4 class="caption white-txt">Conversation with {{$user->username}}</h4>
                    </div>
                    <div id="allmessagescont">
                        <div class="panel-body" id="allmessages">
                            @foreach ($chats as $chat)
                                @if ($chat->s_id == Auth::user()->id)
                                    <div class="message">
                                      <img class="right" src="{{asset('assets/user/img/pro-pic/'.Auth::user()->pro_pic)}}" alt="Avatar" style="width:100%;">
                                      <p style="margin:0px;"><strong>{{Auth::user()->username}} (You)</strong></p>
                                      <p>{!!nl2br($chat->message)!!}</p>
                                      <span class="time-left">{{$chat->created_at}}</span>
                                    </div>
                                @else
                                    <div class="message darker">
                                      <img src="{{asset('assets/user/img/pro-pic/'.$user->pro_pic)}}" alt="Avatar" style="width:100%;">
                                      <p style="margin:0px;"><strong>{{$user->username}}</strong></p>
                                      <p>{{$chat->message}}</p>
                                      <span class="time-right">{{$chat->created_at}}</span>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    </div>

                    <div>
                        <form id="chatform" style="width:95%;margin:0 auto;">
                            {{csrf_field()}}
                            <textarea id="message" class="form-control" name="message" rows="3" cols="80" placeholder="Type your message here..." style="margin-bottom:10px;"></textarea>
                            <button class="btn btn-success" style="float:right;" type="button" onclick="store({{Auth::user()->id}}, {{$uid}})"><i class="fa fa-paper-plane"></i> Send</button>
                            <p class="no-margin" style="clear:both;"></p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
      var baseurl = '{{url('/')}}';
      console.log(baseurl);
    </script>
    <script src="{{asset('core/public/js/app.js')}}"></script>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        var elem = document.getElementById('allmessages');
        elem.scrollTop = elem.scrollHeight;
    });
    function store(sid, rid) {

        var form = document.getElementById('chatform');
        var fd = new FormData(form);
        fd.append('sid', sid);
        fd.append('rid', rid);
        $.ajax({
            url: '{{route('user.chats.store')}}',
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if(data == "success") {
                    form.reset();
                    $("#allmessagescont").load(location.href + " #allmessagescont", function() {
                        var elem = document.getElementById('allmessages');
                        elem.scrollTop = elem.scrollHeight;

                        $.get('{{route('fireevent')}}');
                    });
                }
            }
        });
    }
</script>
@endpush
