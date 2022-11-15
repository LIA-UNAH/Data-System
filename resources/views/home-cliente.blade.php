<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DataSystem's AlekIsa</title>

    <!-- CSS Fontawesome -->
    <link href={{ asset("admin/fontawesome/css/all.min.css") }} rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href={{ asset("css/fonts.css") }} rel="stylesheet" type="text/css">

    <!-- CSS de Mejoras visuales -->
    <link href={{ asset("css/ed-grid.css") }} rel="stylesheet" type="text/css">

    <!-- CSS SB Admin -->
    <link href={{ asset("admin/css/sb-admin-2.min.css") }} rel="stylesheet" type="text/css">

    <!-- CSS Bootstrap 5.2 -->
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet" type="text/css">

    {{-- AlpineJS --}}
    <script defer src={{ asset("js/alpinejs/alpinejs.min.js") }}></script>

    <svg style="display: none" xmlns="http://www.w3.org/2000/svg">
        <symbol id="notes" viewBox="0 0 24 24">
            <rect fill="none" height="24" width="24"></rect>
            <path
                d="M19,3H4.99C3.89,3,3,3.9,3,5l0.01,14c0,1.1,0.89,2,1.99,2h10l6-6V5C21,3.9,20.1,3,19,3z M7,8h10v2H7V8z M12,14H7v-2h5V14z M14,19.5V14h5.5L14,19.5z">
            </path>
        </symbol>
        <symbol id="studies" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"></path>
        </symbol>
        <symbol id="courses" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none"></path>
            <path
                d="M19 3H4.99c-1.11 0-1.98.89-1.98 2L3 19c0 1.1.88 2 1.99 2H19c1.1 0 2-.9 2-2V5c0-1.11-.9-2-2-2zm0 12h-4c0 1.66-1.35 3-3 3s-3-1.34-3-3H4.99V5H19v10z">
            </path>
        </symbol>
        <symbol id="home" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path>
        </symbol>
    </svg>

    <style>
        body {
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            background: #C1CCF9
        }

        .ed-header {
            height: 100p;
            border-bottom: 1px solid #FFF;
            background: #FFF;
            position: fixed;
            top: 0;
            width: 100%;
            left: 0;
            z-index: 100;
        }

        .ed-menu .menu {
            list-style: none;

        }

        .ed-grid .ed-grid,
        .ed-grid.full {
            width: 100%;
            max-width: 100%;
            margin-right: 0;
            margin-left: 0;
        }

        @media screen and (max-width: 1023px) {
            .ed-menu .nav {
                position: absolute;
                left: 0;
                bottom: 0;
                background: black;
                z-index: 100;
            }
        }

        .icon {
            --size: 1.5rem;
            width: var(--size);
            height: var(--size);
            fill: currentColor;
        }

        .link {
            color : lightgrey;
        }
        .active {
            color : cornflowerblue
        }

        .logo {
            height: 2rem
        }

        .user-avatar-round {
            border-radius: 50%;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .s-relative {
            position: relative;
        }

        .s-cross-center {
            align-items: center;
            align-content: center;
        }
        .s-cursor-pointer {
            cursor: pointer;
        }

        .cart-product-wrap {
            padding: 16px 0;
            border-top: 1px solid #f2f2f2;
        }
        .cart-product {
            display: flex;
        }
        .cart-product-body {
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .comet-checkbox {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
            color: #222;
            font-size: 14px;
            font-variant: tabular-nums;
            line-height: 1.5;
            list-style: none;
            -webkit-font-feature-settings: "tnum","tnum";
            font-feature-settings: "tnum","tnum";
            display: inline-flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 8px 0 0;
            cursor: pointer;
            vertical-align: middle;
        }
        .comet-checkbox-icon {
            padding: 2px;
        }
        .comet-checkbox-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 50%;
        }
        .comet-checkbox-input {
            position: absolute;
            opacity: 0;
            height: 0;
            width: 0;
        }
        .comet-checkbox-checked>span:first-child.comet-icon {
            color: #ff472e;
        }
        .cart-product-info {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            width: 0;
            min-width: 0;
        }
        .cart-product-name {
            margin-bottom: 8px;
            font-size: 14px;
            color: #222;
        }
        .cart-product-sku {
            margin-bottom: 12px;
        }
        .cart-product-name-img {
            line-height: 0;
        }
        .cart-product-img-tip, .cart-product-name {
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .cart-product-name a {
            margin-right: 18px;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            width: 0;
            min-width: 0;
            font-weight: 600;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            word-wrap: normal;
        }
        .cart-product-name-ope .comet-icon-account {
            padding: 0 12px;
        }
        .cart-product-block {
            margin-top: 8px;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
        .cart-product-block-left {
            margin-right: 12px;
        }
        .cart-product-price {
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .cart-product-price-s span {
            font-weight: 400;
            font-size: 12px;
        }
        .cart-product-price>span {
            margin-right: 4px;
            font-size: 16px;
            font-weight: 700;
        }

        .cart-product-price-s {
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .cart-product-ship {
            margin-top: 8px;
            font-size: 12px;
            color: #999;
            cursor: pointer;
        }
        .cart-product-price-picker {
            font-size: 12px;
            text-align: right;
        }

        .comet-input-number {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            color: #222;
            font-size: 14px;
            font-variant: tabular-nums;
            line-height: 1.5;
            list-style: none;
            -webkit-font-feature-settings: "tnum","tnum";
            font-feature-settings: "tnum","tnum";
            display: inline-flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .comet-input-number-btn {
            width: 24px;
            height: 24px;
            background-color: #f5f5f5;
            font-size: 12px;
            line-height: 24px;
            text-align: center;
            border-radius: 100%;
            cursor: pointer;
        }
        .comet-input-number-input {
            margin: 0 4px;
            height: 24px;
            width: 32px;
            background-color: #fff;
            border: none;
            line-height: 24px;
            letter-spacing: 0;
            text-align: center;
            outline: 0;
        }

        .comet-icon {
            display: inline-block;
            color: inherit;
            font-style: normal;
            line-height: 0;
            text-align: center;
            text-transform: none;
            vertical-align: -0.125em;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .box {
            width: 300px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),
            0 10px 10px rgba(0,0,0,0.22);
        }

        .box-header {
            padding: 10px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--box-header-bg);
            color: var(--box-header-color);
        }

        .list {
            position: relative;
            padding: unset;
            margin: 0;
            width: 100%;
        }

        .item {
            list-style: none;
            padding: 15px 40px;
            box-shadow: 0 5px 25px rgba(0,0,0,.1);
            position: relative;
            background: var(--item-bg-color);
            cursor: pointer;
            transition: all 0.3s;
        }

        .item:hover {
            transform: scale(1.1);
            z-index: 100;
            background: var(--item-hover-bg);
            color: var(--item-hover-color);
        }

        .item i {
            color: var(--item-hover-bg);
        }

        .item:hover i {
            color: var(--item-hover-color);
        }

        .right-icon {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
        }

        .left-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
    @livewireStyles
</head>

<body id="page-top">
@livewireScripts

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" style="background: grey">

            <!-- Topbar -->
            <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background: #1a202c; color:whitesmoke;">
                <!-- End of Sidebar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw" style="color: whitesmoke"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Centro de notificaciones
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white" style="color: whitesmoke"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw" style="color: whitesmoke"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src=""
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.
                                    </div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="/admin/img/undraw_profile_2.svg"
                                         alt="...">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?
                                    </div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="/admin/img/undraw_profile_3.svg"
                                         alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!
                                    </div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src=""
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...
                                    </div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: white">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="/images/uploads/{{ Auth::user()->image }}" alt="Profile">

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/profile_cliente">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="/info">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Información
                            </a>
                            <a class="dropdown-item" href="{{ route('ver-carrito-historial') }}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Historial
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar sesión
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div id="contaire" style="overflow-y: auto; height: calc(70vh);">
                    @yield('content')
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer " style="background: #1a202c; color: whitesmoke">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Data System 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #0d6efd; color: white">
                <h5 class="modal-title" id="exampleModalLabel" >¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>
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

<!-- Tom Select js -->
<script src={{ asset("js/tom-select.js") }}></script>

@stack('scripsss')
</body>

</html>
