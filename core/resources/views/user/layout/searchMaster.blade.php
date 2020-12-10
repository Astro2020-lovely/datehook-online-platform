<!DOCTYPE html>
<html lang="en">
<head>
@includeif('user.layout.partials.head')
</head>

<body>
    <!-- support bar area start -->
    @includeif('user.layout.partials.support')
    <!-- support bar area end -->

    <!-- navbar area start -->
    @includeif('user.layout.partials.navbar')
    <!-- navbar area end -->

    <!-- header area start  -->
    @includeif('user.layout.partials.homeHeader')
    <!-- header area end  -->


    @yield('content')

    <!-- footer area start -->
    @includeif('user.layout.partials.footer')
    <!-- footer area end -->

    <div class="back-to-top"> <!-- back to top start -->
        <i class="fa fa-rocket"></i>
    </div><!-- back to top end -->
    <!-- login and register modal start-->
    @includeif('user.layout.partials.loginReg')
    <!-- login and register modal end -->

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- preloader area end -->

    @includeif('user.layout.partials.scripts')

</body>

</html>
