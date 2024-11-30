<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/modules/fontawesome/css/all.min.css') }}">

  <!-- Favicons -->
  <link href="{{ asset('assets/user/img/logo.png') }}" rel="icon">
  <link href="{{ asset('assets/user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- CSS Libraries -->
  <style>
        /* Menambahkan efek hover pada tombol pagination */
        .pagination .page-link:hover {
            background-color: #d3d3d3; /* Warna abu-abu */
            border-color: #d3d3d3; /* Warna border yang sama */
            color: #333; /* Warna teks */
        }
  </style>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>

  <title>@yield('title')</title>
</head>
<body>
  @include('sweetalert::alert')
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('layouts.kasir.navbar')
      @include('layouts.kasir.sidebar')
      @yield('content')
      @include('layouts.kasir.footer')
    </div>
  </div>
  
  @include('layouts.kasir.script')
</body>
</html>