<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.layout.partials.head')
  </head>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    @includeif('admin.layout.partials.topnavbar')

    <!-- Sidebar menu-->
    @includeif('admin.layout.partials.sidenavbar')

    @yield('content')

    <!-- Essential javascripts for application to work-->
    @includeif('admin.layout.partials.scripts')
  </body>
</html>
