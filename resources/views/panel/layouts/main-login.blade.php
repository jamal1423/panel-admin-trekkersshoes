<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="#">
  <link rel="icon" type="image/png" href="#">
  <title>
    Form Login
  </title>
  <link href="{{ asset('panel/login/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('panel/login/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="{{ asset('panel/login/assets/css/material-kit.css') }}" rel="stylesheet" />
</head>

<body class="sign-in-basic">
  
  @yield('content')

  <script src="{{ asset('panel/login/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('panel/login/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('panel/login/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('panel/login/assets/js/plugins/parallax.min.js') }}"></script>
  <script src="{{ asset('panel/login/assets/js/material-kit.min.js') }}" type="text/javascript"></script>
</body>
</html>