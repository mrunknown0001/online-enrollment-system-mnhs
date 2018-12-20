<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    {{-- mobile menu --}}
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/morrisjs/morris.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metisMenu/metisMenu-vertical.css') }}">



    <link rel="stylesheet" href="{{ asset('css/form/all-type-forms.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">

    <script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>

    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-datatable.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datatable.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.print.min.css') }}">

    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @yield('sidebar')
    
    <div class="all-content-wrapper">
        @yield('header')
        @yield('content')
    </div>

    <script src="{{ asset('js/wow.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery-price-slider.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
    {{-- <script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>

    {{-- <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>

    <script src="{{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/scrollbar/mCustomScrollbar-active.js') }}"></script> --}}

    <script src="{{ asset('js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu/metisMenu-active.js') }}"></script>

{{--     <script src="{{ asset('js/morrisjs/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morrisjs/morris.js') }}"></script>
    <script src="{{ asset('js/morrisjs/morris-active.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/sparkline/jquery.sparkline.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/sparkline/jquery.charts-sparkline.js') }}"></script> --}}

    <script src="{{ asset('js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/calendar/fullcalendar-active.js') }}"></script>

    {{-- <script src="{{ asset('js/tab.js') }}"></script> --}}

    <script src="{{ asset('js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/icheck/icheck-active.js') }}"></script>

    {{-- <script src="{{ asset('js/plugins.js') }}"></script> --}}

    <script src="{{ asset('js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>