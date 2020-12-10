<!-- header-area start -->
<header class="header-area page-header-area-bg" id="home" style="background-image:url('{{asset('assets/user/interfaceControl/backgroundImage/banner.jpg')}}')">
    @includeif('user.layout.partials.navbar')
    <div class="slider-area-wrapper">
        <div class="single-slide-item" style="padding:0px 0 50px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="white-txt">
                            @yield('headertext')
                        </h3>
                        <p class="text-center sub-page-header">
                          @yield('subheadertext')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header-area -->
