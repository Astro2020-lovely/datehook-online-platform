<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{$gs->website_title}}</title>
<!-- favicon -->
<link rel="shortcut icon" href="{{asset('assets/user/interfaceControl/logoIcon/icon.jpg')}}" type="image/x-icon">
<!-- bootstrap -->
<link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
<!-- Flaticon -->
<link rel="stylesheet" href="{{asset('assets/user/css/flaticon.css')}}">
<!-- fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- slicknav -->
<link rel="stylesheet" href="{{asset('assets/user/css/slicknav.min.css')}}">
<!-- animate.css -->
<link rel="stylesheet" href="{{asset('assets/user/css/animate.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('assets/user/css/owl.carousel.min.css')}}">
<!-- magnific popup -->
<link rel="stylesheet" href="{{asset('assets/user/css/magnific-popup.css')}}">
{{-- File input CSS --}}
<link href="{{ asset('assets/plugins/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
<!-- stylesheet -->
<link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
<!-- responsive -->
<link rel="stylesheet" href="{{asset('assets/user/css/responsive.css')}}">
{{-- Base Color Change... --}}
<link href="{{url('/')}}/assets/user/css/themes/base-color.php?color={{$gs->base_color_code}}" rel="stylesheet">
@stack('styles')
@stack('nicedit-scripts')
