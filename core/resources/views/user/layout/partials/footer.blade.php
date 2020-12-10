<!-- footer area start -->
<footer class="footer-area footer-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="copyright-area">
                    <span>{{$gs->footer}}</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-logo">
                    <a href="{{route('user.home')}}">
                        <img style="max-width:190px;max-height:50px;" src="{{asset('assets/user/interfaceControl/logoIcon/logo.jpg')}}" alt="footer logo">
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="footer-socials">
                    <ul>
                      @foreach ($socials as $social)
                        <li>
                            <a href="{{$social->url}}">
                                <i class="fa fa-{{$social->fontawesome_code}}"></i>
                            </a>
                        </li>
                      @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
