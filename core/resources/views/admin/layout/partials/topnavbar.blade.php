<header class="app-header"><a class="app-header__logo" href="{{route('admin.dashboard')}}">{{$gs->website_title}}</a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="{{route('admin.editProfile', Auth::guard('admin')->user()->id)}}"><i class="fa fa-cog fa-lg"></i> Edit Profile</a></li>
        <li><a class="dropdown-item" href="{{route('admin.changePass')}}"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
        <li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</header>
