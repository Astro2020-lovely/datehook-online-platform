<div class="support-bar">
    <div class="container">
       <div class="row">
            <div class="col-lg-6">
                <div class="support-left"><!-- support left start -->
                    <ul>
                        <li><a href="mailTo:info@icominer.com"><i class="fa fa-envelope"></i> {{$gs->email}}</a></li>
                        <li><a href="tel:123456898"><i class="fa fa-phone"></i> {{$gs->phone}}</a></li>
                    </ul>
                </div><!-- support left end -->
            </div>
            <div class="col-lg-6">
                <div class="support-right"> <!-- support right start -->
                    <div class="social-links">
                        <ul>
                          @foreach ($socials as $social)
                            <li><a href="{{$social->url}}" target="_blank"><i class="fa fa-{{$social->fontawesome_code}}"></i></a></li>
                          @endforeach
                        </ul>
                    </div>
                </div><!-- support right end -->
            </div>
       </div> <!-- row end -->
    </div><!-- container end -->
</div>
