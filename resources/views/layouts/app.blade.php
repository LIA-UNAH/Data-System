<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DSA - @yield('title')</title>

    <link href={{ asset("admin/vendor/fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset("admin/css/sb-admin-2.min.css") }} rel="stylesheet">
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
    <script src={{ asset("admin/vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset("admin/vendor/jquery-easing/jquery.easing.min.js") }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset("admin/js/sb-admin-2.min.js") }}></script>

    <!-- Page level plugins -->
    <script src={{ asset("admin/vendor/chart.js/Chart.min.js") }}></script>

    <!-- Page level custom scripts -->
    <script src={{ asset("admin/js/demo/chart-area-demo.js") }}></script>
    <script src={{ asset("admin/js/demo/chart-pie-demo.js") }}></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Js de boostrat 5.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.min.js"></script>

    @stack('scripsss')
</body>

</html>
