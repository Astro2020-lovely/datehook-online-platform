
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/chart.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/chart.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-fileinput.js') }}" type="text/javascript"></script>


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

@stack('scripts')
