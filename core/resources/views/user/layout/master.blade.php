<!DOCTYPE html>
<html lang="en">
<head>
@includeif('user.layout.partials.head')
</head>

<body>
    <!-- header area start  -->
    @if (request()->path() == '/')
      @includeif('user.layout.partials.homeHeader')
    @else
      @includeif('user.layout.partials.header')
    @endif
    <!-- header area end  -->


    @yield('content')


    <!-- footer area start -->
    @includeif('user.layout.partials.footer')
    <!-- footer area end -->

    <!-- back to top btn start -->
    <div class="back-to-top">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- back to top btn end -->



    @includeif('user.layout.partials.scripts')

</body>

</html>
