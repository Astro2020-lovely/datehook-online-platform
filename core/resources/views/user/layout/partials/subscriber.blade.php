<!-- subscribe area start -->
<section class="subscribe-area subscribe-bg">
    <div class="conteainer">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="subscribe-wrapper"><!-- subscribe wrapper start-->
                    <h3 class="wow fadeInDown">{{$gs->subsc_title}}</h3>
                    <p class="wow fadeInDown">{{$gs->subsc_details}}</p>
                    <div class="subscribe-form wow fadeInUp"><!-- subscribe form start-->
                        <form action="{{route('users.subsc.store')}}" method="post">
                            {{ csrf_field() }}
                            <input style="color:white;" type="email" class="subs-input" name="email" placeholder="Enter your email address">
                            <button type="submit" class="submit-btn"> submit </button>
                        </form>
                        @if ($errors->has('email'))
                            <p style="color:red;">{{$errors->first('email')}}</p>
                        @endif
                    </div><!-- /. subscribe form -->
                </div><!-- /.subscribe wrapper -->
            </div><!-- /.col-lg-10 -->
        </div><!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- subscribe area end -->
