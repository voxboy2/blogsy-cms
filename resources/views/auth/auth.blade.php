<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back_end/css/main.css') }}"/>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back_end/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

    <title>sosmart</title>
  </head>
  <body>

  @yield('content')


  <script src="{{ asset('back_end/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('back_end/popper.min.js') }}"></script>
    <script src="{{ asset('back_end/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_end/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('back_end/plugins/pace.min.js') }}"></script>
  </body>
</html>
