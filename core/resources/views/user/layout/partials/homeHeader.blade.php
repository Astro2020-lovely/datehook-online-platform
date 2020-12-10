<!-- header-area start -->
<header class="header-area header-area-bg" id="home" style="background-image:url('{{asset('assets/user/interfaceControl/backgroundImage/banner.jpg')}}')">
    @includeif('user.layout.partials.navbar')
    <div class="slider-area-wrapper">
        <div class="single-slide-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>
                            <span>{{$gs->header_stext}}</span>
                        </h1>
                        <div class="row">
                          <div class="col-md-6 col-md-offset-3" style="padding-top: 20px;">
                            <form id="searchform" action="{{route('user.searchResults')}}" class="search-container">
                              <input name="term" type="text" id="search-bar" placeholder="Search users by username, name, religion...">
                              <a href="#" onclick="event.preventDefault();document.getElementById('searchform').submit();"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header-area -->
