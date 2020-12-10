<!-- navbar area start -->
<nav class="navbar-area" id="main-menu">
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-6 col-xs-6" style="padding:50px 0px;">
                <a href="{{route('user.home')}}" class="logo">
                    <img style="max-width:190px;max-height:50px;" src="{{asset('assets/user/interfaceControl/logoIcon/logo.jpg')}}" alt="footer logo">
                </a>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="responsive-menu"></div>
                <ul id="main-menu">
                    <li><a class="@if(request()->path() == '/') active @endif" href="{{route('user.home')}}">Home</a></li>
                    @guest
                      @foreach ($menus as $menu)
                        <li class='@if(request()->path() == "$menu->slug/pages") active @endif'>
                            <a class="@if(request()->path() == "$menu->slug/pages") active @endif" href="{{route('user.dynamicPage', $menu->slug)}}">{{$menu->name}}</a>
                        </li>
                      @endforeach
                      <li>
                          <a class="@if(request()->path() == "contact") active @endif" href="{{route('user.contact')}}">Contact</a>
                      </li>
                    @endguest

                    @guest
                      <li><a class="@if(request()->path()=='login') active @endif" href="{{route('login')}}">Login</a></li>
                    @endguest
                    @auth
                      <li><a class="@if(request()->path() == "user/packages") active @endif" href="{{route('package.index')}}">Packages</a></li>
                      <li><a class="@if(request()->path() == "user/requests") active @endif" href="{{route('user.requests')}}">Requests</a></li>
                      <li><a class="@if(request()->path() == "user/matches") active @endif" href="{{route('user.matches')}}">Matches</a></li>
                      <li><a class="@if(request()->path() == "user/depositMethods") active @endif" href="{{route('users.showDepositMethods')}}">Deposit Now</a></li>
                        @php
                          $username = Auth::user()->username;
                        @endphp
                      <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="
                        @if(request()->path() == "$username/profile")
                          active
                        @elseif (request()->path() == 'user/edit-profile')
                          active
                        @elseif (request()->path() == 'user/change-password')
                          active
                        @elseif (request()->path() == 'user/transactions')
                          active
                        @endif
                        ">{{Auth::user()->username}} <span class="caret"></span></button></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="{{route('users.profile', Auth::user()->username)}}">Profile</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{route('users.editProfile')}}">Edit Profile</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{route('users.editPassword')}}">Change Password</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{route('user.trxLog')}}">Transaction Log</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                          </li>
                        </ul>
                      </li>
                    @endauth

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- end nav bar -->
