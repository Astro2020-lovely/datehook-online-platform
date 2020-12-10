@extends('user.layout.master')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/user/css/compro.css')}}">
@endpush

@section('content')
  <!--   Big container   -->
  <div class="container">
     <div class="row">
        <div class="col-sm-10 offset-sm-1">
           <!-- Wizard container -->
           <div class="wizard-container">
              <div class="card wizard-card" data-color="red" id="wizard">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h4>Congrats! Your Profile has been created. <br>Upload atleast a profile picture & get better responses</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-md-offset-3 text-center">
                    <form class="" action="{{route('user.uppropic')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="fileinput fileinput-new col-md-12" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                              @if (empty(Auth::user()->pro_pic))
                              <img src="{{asset('assets/user/img/pro-pic/nopic.png')}}" alt="" />
                              @else
                              <img src="{{asset('assets/user/img/pro-pic/' . Auth::user()->pro_pic)}}" alt="" />
                              @endif
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="width: 250px;"> </div>
                          <div>
                              <span class="btn btn-success btn-file">
                                  <span class="fileinput-new"> Choose Image </span>
                                  <span class="fileinput-exists"> Change </span>
                                  <input type="file" name="pro_pic">
                              </span>
                              <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                          </div>
                          @if ($errors->has('pro_pic'))
                            <p class="em">{{$errors->first('pro_pic')}}</p>
                          @endif
                          <div class="">
                            <button type="submit" class="btn btn-block base-bg">UPLOAD</button>
                          </div>
                      </div>

                    </form>
                  </div>
                </div>

                <div class="panel panel-default" style="padding:0px;">
                  <div class="panel-heading base-bg">
                    <h4 class="white-txt">Know More</h4>
                  </div>
                  <div class="panel-body">
                    <h4>You are allowed to do:</h4>
                    <div class="point">
                      <p class="point-title"><strong><i class="fa fa-check-circle"></i> </strong> Your Photo should be front facing and your entire face should be visible.</p>
                      <p class="point-title"><strong><i class="fa fa-check-circle"></i> </strong> Ensure that your Photo is recent and not with a group.</p>
                      <p class="point-title"><strong><i class="fa fa-check-circle"></i> </strong> Your Photo must be in one of the following formats: jpg, jpeg, png.</p>
                    </div><br>
                    <h4>You are not allowed to do:</h4>
                    <div class="point">
                      <p class="point-title"><strong><i class="fa fa-check-circle"></i> </strong> Watermarked, digitally enhanced, morphed Photos or Photos with your personal information will be rejected.</p>
                      <p class="point-title"><strong><i class="fa fa-check-circle"></i> </strong> Irrelevant Photographs will lead to deactivation of your Profile and Membership.</p>
                    </div>
                  </div>
                </div>
              </div>
           </div>
           <!-- wizard container -->
        </div>
     </div>
     <!-- row -->
  </div>
  <!--  big container -->
@endsection


@push('scripts')
<script src="{{asset('assets/user/js/compro.js')}}"></script>
@endpush
