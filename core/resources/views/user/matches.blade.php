@extends('user.layout.master')

@section('headertext', 'Your Matches')

@section('content')
  <div class="container">
  	<div class="row">

  		<section class="content" style="padding: 50px 0px;">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="">

                <div class="table-container">
                  @if (count($matches) == 0)
                    <h3 class="text-center">NO MATCH FOUND</h3>
                  @endif
                  <table class="table table-filter">
                    <tbody>
                      @foreach ($matches as $match)

                        @php
                          if ($match->r_id == Auth::user()->id) {
                             $matchid = $match->a_id;
                          } elseif ($match->a_id == Auth::user()->id) {
                             $matchid = $match->r_id;
                          }

                          $user = \App\User::find($matchid);
                        @endphp
                        <tr data-status="pagado" id="tr{{$match->id}}" @if($user->package != 0) style="background-color:#ffffd4;" @endif>
                          <td>
                            <div class="row text-center">
                              <div class="col-sm-3">
                                <a href="{{route('users.profile', $user->username)}}" target="_blank">
                                  <img src="{{asset('assets/user/img/pro-pic/'.$user->pro_pic)}}">
                                </a>
                              </div>
                              <div class="col-sm-3">
                                <h4 class="title">
                                  <a href="{{route('users.profile', $user->username)}}" target="_blank" class="base-txt"><i class="fa fa-user"></i> {{$user->username}}</a>
                                </h4>
                                <p class="summary"><strong><i class="fa fa-calendar"></i> Date of Birth: </strong> {{date('jS F, Y',strtotime($user->date_of_birth))}}</p>
                                <p class="summary"><strong><i class="fa fa-map-marker"></i> Address: </strong> {{$user->city}}, {{$user->country}}</p>
                              </div>
                              <div class="col-sm-6">
                                <span>
                                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#rmodal{{$user->id}}"><i class="fa fa-ban"></i> Report</button>
                                  <button type="button" class="btn btn-danger btn-sm" onclick="unfriend({{$match->id}})"><i class="fa fa-times"></i> Unfriend</button>
                                  <a target="_blank" href="{{route('user.chats', $user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-envelope"></i> Message</a>
                                </span>
                              </div>
                            </div>

                          </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="rmodal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <form action="{{route('user.report')}}" method="post">
                                <input type="hidden" name="c_id" value="{{$user->id}}">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    <h5 class="modal-title" id="exampleModalLongTitle">Report {{$user->name}}</h5>
                                </div>
                                <div class="modal-body">
                                  {{csrf_field()}}
                                  <div class="form-group">
                                    <label><strong>Message to Admin <span>**</span></strong></label>
                                    <textarea class="form-control" name="message" rows="3" required placeholder="Enter your complain here..."></textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      <div class="row">
                        <div class="col-md-12 text-center">
                          {{$matches->links()}}
                        </div>
                      </div>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
  		</section>

  	</div>
  </div>
@endsection


@push('scripts')


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
                $("#tr"+rid).remove();
              }
            }
          });
        }
      });
    }
  </script>
@endpush
