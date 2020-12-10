@extends('user.layout.master')

@push('styles')
<style media="screen">
  .singl-contact-info {
      margin-bottom: 20px;
  }
  .icon {
    float: left;
    font-size: 40px;
    margin-right: 20px;
  }
  .content {
    float:left;
  }
</style>
@endpush

@section('headertext', 'Contact us')

@section('content')
  <!-- contact area start -->
  <section class="contact-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 remove-col-padding">
                  <div class="contact-form-inner">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2 text-center">
                              <div class="section-title">
                                  <!-- section title start -->
                                  <h2>{{$gs->con_title}}</h2>
                                  <p>{{$gs->con_sdetails}}</p>
                              </div>
                              <!-- section title end -->
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-10 col-lg-offset-1 remove-col-padding">
                              <div class="contact-form-wrapper">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="singl-contact-info">
                                              <div class="icon">
                                                  <i class="fa fa-map base-txt"></i>
                                              </div>
                                              <div class="content">
                                                  <h5>Location</h5>
                                                  <span class="details">{{$gs->c_location}}</span>
                                              </div>
                                              <p class="no-margin" style="clear:both;"></p>
                                          </div>
                                          <div class="singl-contact-info">
                                              <div class="icon">
                                                  <i class="fa fa-clock-o base-txt"></i>
                                              </div>
                                              <div class="content">
                                                  <h5>Opening Hours</h5>
                                                  <span class="details">{{$gs->o_hours}}</span>
                                              </div>
                                              <p class="no-margin" style="clear:both;"></p>
                                          </div>
                                          <div class="singl-contact-info">
                                              <div class="icon">
                                                  <i class="fa fa-envelope base-txt"></i>
                                              </div>
                                              <div class="content">
                                                  <h5>Email</h5>
                                                  <span class="details">{{$gs->email}}</span>
                                              </div>
                                              <p class="no-margin" style="clear:both;"></p>
                                          </div>
                                          <div class="singl-contact-info margin-bottom-60">
                                              <div class="icon">
                                                  <i class="fa fa-phone base-txt"></i>
                                              </div>
                                              <div class="content">
                                                  <h5>Phone</h5>
                                                  <span class="details">{{$gs->phone}}</span>
                                              </div>
                                              <p class="no-margin" style="clear:both;"></p>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <form class="contact-from-wrapper" action="{{route('user.contactMail')}}" method="post">
                                           {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="base-txt">Your Name
                                                    <span>**</span>
                                                </label>
                                                <input name="name" type="text" placeholder="Type your name...." class="form-control">
                                                @if ($errors->has('name'))
                                                  <p class="text-danger">{{$errors->first('name')}}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="base-txt">Your Email
                                                    <span>**</span>
                                                </label>
                                                @auth
                                                <input name="email" type="email" placeholder="Type your email...." class="form-control" value="{{Auth::user()->email}}">
                                                @endauth
                                                @guest
                                                <input name="email" type="email" placeholder="Type your email...." class="form-control">
                                                @endguest
                                                @if ($errors->has('email'))
                                                  <p class="text-danger">{{$errors->first('email')}}</p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="base-txt">Your Messages
                                                    <span>**</span>
                                                </label>
                                                <textarea name="message" rows="5" placeholder="Type your message...." class="form-control"></textarea>
                                                @if ($errors->has('message'))
                                                  <p class="text-danger">{{$errors->first('message')}}</p>
                                                @endif
                                            </div>

                                            <div class="form-group text-center">
                                              <button type="submit" class="btn base-bg white-txt">submit now</button>
                                            </div>
                                        </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- contact area end -->
@endsection
