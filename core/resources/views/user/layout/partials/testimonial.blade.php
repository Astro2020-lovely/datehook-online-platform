<section class="testimonial-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <!-- section title start -->
                    <h2>{{$gs->testm_title}}</h2>
                    <p>{{$gs->testm_details}}</p>
                </div>
                <!-- section title end -->
            </div>
        </div>
        <!-- ./row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-wrapper" id="testimonial-carousel"><!-- testimonial wrapper start -->
                    @foreach ($testms as $testm)
                      <div class="single-testimonial-item"><!-- single testimonial item start -->
                          <div class="thumb"> <!--thumb start-->
                              <img src="{{asset('assets/user/interfaceControl/testimonial/'.$testm->image)}}" alt="tesimonial image">
                          </div><!--thumb end-->
                          <div class="content"><!--content start-->
                              <h5 class="name">{{$testm->name}}</h5>
                              <span class="post">{{$testm->company}}</span>
                              <p class="descripton">{{$testm->comment}}</p>
                          </div><!--content end-->
                      </div><!-- single testimonial item end -->
                    @endforeach
                </div><!-- testimonial wrapper end -->
            </div>
        </div><!-- / .row-->
    </div><!-- ./ container  -->
</section>
