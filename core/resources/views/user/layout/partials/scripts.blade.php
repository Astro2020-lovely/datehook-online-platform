<!-- jquery -->
<script src="{{asset('assets/user/js/jquery.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
<!-- slicknav -->
<script src="{{asset('assets/user/js/jquery.slicknav.min.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
<!-- magnific popup -->
<script src="{{asset('assets/user/js/jquery.magnific-popup.js')}}"></script>
<!-- way point -->
<script src="{{asset('assets/user/js/waypoints.min.js')}}"></script>
<!-- counter up -->
<script src="{{asset('assets/user/js/jquery.counterup.min.js')}}"></script>
<!-- imageloaded -->
<script src="{{asset('assets/user/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- Isotope -->
<script src="{{asset('assets/user/js/isotope.pkgd.min.js')}}"></script>
<!-- Progress Bar -->
<script src="{{asset('assets/user/js/jquery.lineProgressbar.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/plugins/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<!-- main -->
<script src="{{asset('assets/user/js/main.js')}}"></script>
@if (session('success'))
<script type="text/javascript">
        $(document).ready(function(){
            swal("Success!", "{{ session('success') }}", "success");
        });
</script>
@endif

@if (session('alert'))
<script type="text/javascript">
        $(document).ready(function(){
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
</script>
@endif
{{-- Increase Ad Views... --}}
<script>
   function increaseAdView(adID) {
      var fd = new FormData();
      fd.append('adID', adID);
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
          }
      });
      $.ajax({
         url: '{{route('ad.increaseAdView')}}',
         type: 'POST',
         data: fd,
         contentType: false,
         processData: false,
         success: function(data) {
            // console.log(data);
         }
      });
   }
</script>
@stack('scripts')
