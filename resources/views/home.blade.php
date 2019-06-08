<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <link href="{{ asset('css/bootstrap.min.4.1.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('css/full-slider.css') }}"> --}}

    <style type="text/css">
      body {
        /* The image used */
        background-image: url("images/school-bus.jpg");

        /* Full height */
        height: 100%; 
        min-height: 800px;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

      }

      #center-button {
        /*vertical-align: middle;*/

        min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
      }


    </style>

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="javascript:void(0)">Online Enrollment System for Maliwalo High School</a>
      </div>
    </nav>
    
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-2 offset-5" id="center-button">
            <a href="{{ route('login') }}" class="btn btn-danger btn-lg btn-block" style="border: 2px solid #cccccc;">Login</a>
          </div>
        </div>
      </div>
    </section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
