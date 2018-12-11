<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
        =========================================== -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.print.min.css') }}">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/form/all-type-forms.css') }}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

    {{-- <div class="color-line"></div> --}}
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="back-link back-backend">
            <a href="javascript:void(0)" class="btn btn-primary">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
          <div class="text-center m-b-md custom-login">
            <h3>Login</h3>
            <p></p>
          </div>
          <div class="hpanel">
            <div class="panel-body">
              <form action="#" id="loginForm" autocomplete="off">
                <div class="form-group">
                  <label class="control-label" for="username">Username</label>
                  <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                  <span class="help-block small">Your unique username to app</span>
                </div>
                <div class="form-group">
                  <label class="control-label" for="password">Password</label>
                  <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                  <span class="help-block small">Yur strong password</span>
                </div>
                <div class="checkbox login-checkbox">
                  <label>
                    <input type="checkbox" class="i-checks"> Remember me 
                  </label>
                  <p class="help-block small">(if this is a private computer)</p>
                </div>
                <button class="btn btn-success btn-block loginbtn">Login</button>
                <a class="btn btn-default btn-block" href="#">Register</a>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
      </div>
      <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
          {{-- <p>Copyright &copy; {{ date('Y') }} <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p> --}}
        </div>
      </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- tab JS
        ============================================ -->
    <script src="{{ asset('js/tab.js') }}"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="{{ asset('js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/icheck/icheck-active.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>