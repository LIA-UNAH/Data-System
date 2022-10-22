<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DSA - @yield('title')</title>

    <!-- CSS Fontawesome -->
    <link href={{ asset("admin/fontawesome/css/all.min.css") }} rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href={{ asset("css/fonts.css") }} rel="stylesheet" type="text/css">

    <!-- CSS SB Admin -->
    <link href={{ asset("admin/css/sb-admin-2.min.css") }} rel="stylesheet" type="text/css">

</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src={{ asset("admin/jquery/jquery.min.js") }}></script>
    <script src={{ asset("admin/bootstrap/js/bootstrap.bundle.min.js") }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset("admin/jquery-easing/jquery.easing.min.js") }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset("admin/js/sb-admin-2.min.js") }}></script>

    <!-- jQuery -->
    <script src={{ asset("js/jquery/jquery-3.6.1.min.js") }}></script>

    <!-- Popper -->
    <script src={{ asset("js/popper/popper.min.js") }}></script>

    <!-- Bootstrap js -->
    <script src={{ asset("js/bootstrap/bootstrap.min.js") }}></script>


    @stack('scripsss')
</body>

</html>
