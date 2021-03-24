<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MMM - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logo/logo-vertical.png') }}">

    <link href="{{ asset('iconfont/material-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/system.css') }}" rel="stylesheet" />

    @stack('styles')
  </head>

  <body class="blue-gradient-dark" id="body" >
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('scripts')
     
    <style>
         #body{

          background-image: url("{{asset('/images/fondo/fondo_pagina.png') }}");    
          background-repeat: repeat;
          background-position: 30px;
          background:linear-gradient(to right,#2B89D2,#0C59A7,#085E90);
    
        }
    </style>
  </body>
</html>
