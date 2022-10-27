<!DOCTYPE html>
<html lang="es">

<head>
    <title>Data System's AlekIsa</title>

    <!-- CSS Bootstrap 5.2 -->
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet" type="text/css">

    <link href={{ asset('css/ed-grid.css') }} rel="stylesheet">
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
            height: 100px;
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
    </style>
    @livewireStyles
</head>

<body>

    <header class="ed-menu s-bg-grey s-py-2 s-px-2 lg-px-4">
        <div class="ed-grid lg-grid-5">
            <div class="s-cross-center s-main-center lg-main-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg>
            </div>
            <nav class="nav lg-cols-4 s-cross-center ed-grid full">
                <ul class="menu s-main-distribute lg-to-right s-mb-0 s-pl-0 s-py-1">
                    <li class="lg-mr-3"><a class="link s-column s-cross-center active" href="#">
                            <svg class="icon to-lg s-mb-0">
                                <use href="/"></use>
                            </svg><span>Inicio</span></a></li>
                    <li class="lg-mr-3"><a class="link s-column s-cross-center" href="#">
                            <svg class="icon to-lg s-mb-0">
                                <use href="#studies"></use>
                            </svg><span>Item A</span></a></li>
                    <li class="lg-mr-3"><a class="link s-column s-cross-center" href="#">
                            <svg class="icon to-lg s-mb-0">
                                <use href="#courses"></use>
                            </svg><span>Item B</span>
                        </a>
                    </li>
                    @if (Auth::guest())
                    <li><a href="{{ url('admin/auth/login') }}">Login</a></li>
                    @else
                    <li class="dropdown">
                        <div class="user-header-menu s-relative" style="width: 35px">
                            <div>
                                <div class="user-button s-cross-center s-cursor-pointer bg-transition relative">
                                    <span class="s-mr-05 user-avatar round flex-none background-color-avatar s-main-center round s-cross-center">
                                        <img class="user-avatar-round" alt="Nahun-avatar" src="/images/uploads/{{ Auth::user()->image }}">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <ul class="dropdown-menu">
                        <li><a href="#">Mi perfil</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                            </a>
                            <form id="logout-form" action="{{ url('admin/auth/logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                        </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')


    <footer>

    </footer>


    <!-- jQuery -->
    <script src={{ asset("js/jquery/jquery-3.6.1.min.js") }}></script>

    <!-- Popper -->
    <script src={{ asset("js/popper/popper.min.js") }}></script>

    <!-- Bootstrap js -->
    <script src={{ asset("js/bootstrap/bootstrap.min.js") }}></script>

    <!-- Tom Select js -->
    <script src={{ asset('js/tom-select.js') }}></script>

    <script>
        posicionarMenu();

        $(window).scroll(function() {
            posicionarMenu();
        });

        function posicionarMenu() {
            var altura_del_header = $('.header').outerHeight(true);
            var altura_del_menu = $('.menu').outerHeight(true);

            if ($(window).scrollTop() >= altura_del_header){
                $('.menu').addClass('fixed');
                $('.wrapper').css('margin-top', (altura_del_menu) + 'px');
            } else {
                $('.menu').removeClass('fixed');
                $('.wrapper').css('margin-top', '0');
            }
        }

    </script>
    @livewireScripts
</body>

</html>
