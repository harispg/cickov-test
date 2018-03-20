<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Artists of the earth</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body>


  @include('layouts.nav')


    <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 bg-light">
        SIDE PANNEL
      </div>
      <div class="col-md-8 bg-light">
        @yield('content')
      </div>
      <div class="col-md-2 bg-light">
        commercials
      </div>
    </div>

  </div>
@yield('myScripts')
</body>
</html>
