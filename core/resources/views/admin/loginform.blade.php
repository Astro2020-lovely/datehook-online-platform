<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/user/interfaceControl/logoIcon/icon.jpg')}}" type="image/x-icon">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
    <title>{{$gs->website_title}}</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>{{$gs->website_title}}</h1>
      </div>
      <div class="login-box">
        <form method="post" class="login-form" action="{{route('admin.login')}}">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input name="username" class="form-control" type="text" placeholder="Username" autofocus>
            @if ($errors->has('username'))
              <p style="color:red;">{{$errors->first('username')}}</p>
            @endif
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input name="password" class="form-control" type="password" placeholder="Password">
            @if ($errors->has('password'))
              <p style="color:red;">{{$errors->first('password')}}</p>
            @endif
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>


    @if (session('alert'))
    <script type="text/javascript">
            $(document).ready(function(){
                swal("Sorry!", "{{ session('alert') }}", "error");
            });
    </script>
    @endif
  </body>
</html>
