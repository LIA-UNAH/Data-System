<div>
    <!-- cart-model -->
    <div class="modal fade" wire:ignore id="cart_model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title f_13 font-weight-bold">Producto agregado exitosamente a su carrito de compras
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-4 col-xs-12 mb-3	">
                            <img src="assets/img/product/product_13.jpg"
                                class="fst-image mx-auto d-block img-fluid border rounded" alt="product_13"
                                id='imagen_prodcuto'>
                        </div>
                        <div class="col-sm-8 col-xs-12 ">
                            <h6 class="font-weight-bold" id='nombre_prodcuto'>Hummingbird printed t-shirt</h6>
                            <div class="font-weight-bold pb-1" id='precio_prodcuto'>$19.12</div>
                            <span class="font-weight-bold f_13 pb-1">Size: S</span><br>
                            <span class="font-weight-bold f_13 pb-1">Color: White</span><br>
                            <span class="font-weight-bold f_13 pb-1" id='existencia_prodcuto'>Qty: 2</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-12 ">
                            <div class="border rounded bg-white final_payment">
                                <div class="card-body  border-bottom">
                                    <p class="text-muted">1 items</p>
                                    <div>
                                        <span class="font-weight-bold">subtotal</span>
                                        <span class="float-right font-weight-bold" id='precio_prodcuto2'>$94.00</span>
                                    </div>
                                </div>
                                <div class="card-body ">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary mt-2 f_13 px-3 py-2 rounded" data-dismiss="modal">Continuar</a>
                </div>
            </div>
        </div>
    </div> <!-- cart_model -->

    <!-- eye-model -->
    <div class="modal fade" id="eye_model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 col-12">
                            <img src="assets/img/product/product_13.jpg"
                                class="fst-image mx-auto d-block img-fluid border rounded" alt="product_13">
                        </div>
                        <div class="col-sm-7 col-12">
                            <h5 class="font-weight-bold border-bottom me_name">Aliquam Top Erat Volutpat</h5>
                            <div class="font-weight-bold border-bottom me_price">$19.12</div>
                            <div class="my-2 border-bottom me_des">Fashion has been creating well-designed collections
                                since 2010. </div>
                            <div class="me_quan">
                                <div class="sp_counter ">

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number"
                                                disabled="disabled" data-type="minus" data-field="quant[1]"><span
                                                    class="minus">-</span></button>
                                        </span>
                                        <input type="number" name="quant[1]" class="form-control input-number"
                                            value="1" min="1" max="10">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                data-field="quant[1]"><span class="plus">+</span></button>
                                        </span>
                                    </div>

                                </div>
                                <span>
                                    <a href="cart.html" class="btn btn-primary primary mt-3">add to cart</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- eye_model -->

    <!-- compare-model -->
    <div class="modal fade" id="compare_model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p><svg width="30px" height="30px">
                            <use xlink:href="#checked"></use>
                        </svg></p>
                    <h5>Compare list updated!</h5>
                    <p class="text-muted font-weight-bold">Product successfully removed from the product comparison!
                    </p>
                    <div class="text-danger font-weight-bold">Go to Compare</div>
                </div>

            </div>
        </div>
    </div> <!-- compare_model -->

    <!-- heart-model -->
    <div class="modal fade" id="heart_model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p><svg width="30px" height="30px">
                            <use xlink:href="#checked"></use>
                        </svg></p>
                    <p class="text-muted font-weight-bold">You must be logged in to manage your wishlist.</p>
                    <div class="text-danger font-weight-bold">Go to wishlist</div>
                </div>

            </div>
        </div>
    </div> <!-- heart_model -->

    <div class="preloader" style="display: none;"></div>

    <!-- header area -->

    <!-- first row -->
    <header>
        <div class="topbar-outer py-2 border-bottom bg-white d-md-none d-none d-none d-lg-block">
            <div class="container custom_container">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-4 topbar_left">
                        {{-- <ul>
                            <li>
                                <span class="font-weight-bolder">Get 30% Off On Selected Items</span>
                            </li>
                        </ul> --}}
                    </div> <!-- col-lg-5 col-md-4 col-sm-4 hidden-md-down topbar_left -->
                    <div class="col-lg-7 col-md-8 col-sm-8 text-xs-right  topbar_right text-right">

                        <nav class="navbar ">
                            <div class="dropdown right1 md_acc ">
                                <span class="dropdown-toggle" role="menu" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><a href="#"
                                        class="font-weight-bolder">{{ Auth::user()->name }}<svg
                                            class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="angle-down"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></a>
                                </span>
                                <div class="dropdown-menu r_menu dropdown-menu-right">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/') }}"
                                                class="dropdown-item font-weight-bolder">Home</a>
                                            <a class="dropdown-item" href="{{ route('ver-carrito') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    Ver Varrito
                                            </a>

                                            <a class="dropdown-item" href="{{ route('ver-carrito-historial') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                                </svg>
                                                Ver Historial
                                            </a>

                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Cerrar sesión
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="dropdown-item font-weight-bolder">Log
                                                in</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="dropdown-item font-weight-bolder">Register</a>
                                            @endif
                                        @endauth
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="dropdown right1 md_1 hr_">
                                <span class="dropdown-toggle" role="menu" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><a href="#" class="font-weight-bolder"> USD&nbsp;<svg
                                            class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="angle-down" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></a>
                                </span>
                                <div class="dropdown-menu r_menu dropdown-menu-right">
                                    <a class="dropdown-item font-weight-bolder" href="#">SAR SAR</a>
                                    <a class="dropdown-item font-weight-bolder" href="#">USD $</a>
                                </div>
                            </div>

                            <div class="dropdown right1 md_2 hr_">
                                <span class="dropdown-toggle" role="menu" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><a href="#" class="font-weight-bolder">ENG&nbsp;<svg
                                            class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="angle-down" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></a>
                                </span>
                                <div class="dropdown-menu r_menu dropdown-menu-right">
                                    <a class="dropdown-item font-weight-bolder" href="#">English</a>
                                    <a class="dropdown-item font-weight-bolder" href="#">Polski</a>
                                    <a class="dropdown-item font-weight-bolder" href="#">Romana</a>
                                    <a class="dropdown-item font-weight-bolder" href="#">Deutsch</a>
                                    <a class="dropdown-item font-weight-bolder" href="#">Italiano</a>
                                </div>
                            </div> --}}
                        </nav>

                    </div> <!-- col-lg-7 col-md-8 col-sm-8 text-xs-right hidden-md-down topbar_right text-right -->
                </div> <!-- row -->
            </div> <!-- container custom_container -->
        </div> <!-- topbar-outer py-2 border-bottom bg-white -->

        <!-- second row -->

        <div class="header-top py-4 border-bottom bg-white sticky-md-top">
            <div class="container custom_container header-top-container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-6  head-logo">
                        <div class="text-left header-top-left pt-2"><a href="index.html"><img
                                    src="assets/img/Hitech..png" class="img-responsive img" alt="Hitech"></a></div>
                    </div> <!-- col-xl-2 col-lg-2 col-md-2 col-sm-3 head-logo -->
                    <div class="col-xl-10 col-lg-10 col-6  head-search">
                        <div class="d-flex navbar">
                            <div class="input-class  text-left col-xl-8 col-lg-7 col-md-12  ">
                                <div class="between-header border border-danger rounded mb-0 head-left">

                                    <select class="select-menu form-select d-none d-sm-block" wire:model='categoria'>
                                        <option value="0">Todas las Categorias</option>
                                        @foreach ($categorias as $categori)
                                            <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                                        @endforeach
                                    </select>


                                    <div class="input-group">
                                        <input type="text" placeholder="search" class="form-control"
                                            aria-label="search" aria-describedby="button-addon2">
                                        <div class="input-group-btn"><button type="button"
                                                class="btn btn-danger text-uppercase font-weight-normal">search</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- between-header text-left col-sm-8 head-left border border-danger rounded mb-0 -->
                            </div>

                            <div class="col-xl-4 col-lg-5 head-right text-right">
                                <ul>
                                    {{-- <li class="md_compare d-lg-inline-block">
                                        <a href="compare.html">
                                            <span class="rcom d-lg-inline-block d-md-none d-sm-none d-none"><svg
                                                    width="34px" height="34px">
                                                    <use xlink:href="#compare"></use>
                                                </svg></span>
                                            <span
                                                class="comp_wish align-middle d-lg-inline-block font-weight-bolder">compare</span>
                                        </a>
                                    </li>
                                    <li class="md_wish d-lg-inline-block d-md-none d-sm-none d-none">
                                        <a href="wishlist.html">
                                            <span class="rcom d-lg-inline-block d-md-none d-sm-none d-none"><svg
                                                    width="35px" height="35px">
                                                    <use xlink:href="#favourite"></use>
                                                </svg></span>
                                            <span
                                                class="comp_wish align-middle d-lg-inline-block font-weight-bolder">favourite</span>
                                        </a>
                                    </li> --}}

                                    <li class="d-lg-none d-md-inline-block user">
                                        <span>
                                            <a href="#"><span><svg width="35px" height="35px">
                                                        <use xlink:href="#header_user"></use>
                                                    </svg></span></a>
                                        </span>
                                        <div class="head_ border rounded bg-white text-left">
                                            <a class=" md_login" href="#"></a>
                                        </div>
                                    </li>

                                    <li class="dropdown d-inline-block">
                                        <span class="dropdown-toggle" role="menu" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <a href="#">
                                                <span><svg width="35px" height="35px">
                                                        <use xlink:href="#cart"></use>
                                                    </svg></span>
                                                <span
                                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                                                @if (\Cart::session(Auth::user()->id)->getContent()->count() > 0)
                                                    <span
                                                        class="text-danger price_cart d-md-inline-block align-middle font-weight-bolder">{{ \Cart::session(Auth::user()->id)->getContent()->count() }}</span>
                                                @endif

                                            </a>
                                        </span>
                                        <div class="dropdown-menu s_cart dropdown-menu-right">
                                            <ul class="shopping-cart p-2 ">
                                                @foreach (\Cart::session(Auth::user()->id)->getContent() as $item)
                                                    <li class="pb-2 d-block">
                                                        <div class="media ">
                                                            <div>
                                                                <a href="#"><img
                                                                        src="/images/products/{{ $item['associatedModel']['imagen_producto'] }}"
                                                                        class="fst-image img-fluid align-self-center"
                                                                        alt="product_13"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mt-0 f_15">{{ $item['name'] }}<a
                                                                        class="float-right cart_cross" href="#"
                                                                        onclick="removeCarrito({{ $item['id'] }})">X</a>
                                                                </h6>
                                                                <p><span class="f_13">{{ $item['quantity'] }} x L.
                                                                        {{ $item['price'] }}</span></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach

                                                <li class="d-block text-muted font-weight-bolder p-2 border-bottom">
                                                    <span class="text-left">subtotal:</span>
                                                    <span class="float-right">L.
                                                        {{ \Cart::session(Auth::user()->id)->getTotal() }}</span>
                                                </li>
                                                <li class="d-block font-weight-bolder pt-2">
                                                    <span class="text-left"><a href="{{ route('ver-carrito') }}">view cart</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div> <!-- col-sm-4 head-right text-right -->

                        </div> <!-- row -->
                    </div> <!-- col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 head-search -->
                </div> <!-- row -->
            </div> <!--  container custom_container -->
        </div> <!-- header-top py-4 border-bottom bg-white -->

        <!-- third row -->

        <div class="header_bottom shadow-sm bg-white rounded bg-white d-md-none d-sm-none d-none d-lg-block">
            <div class="container custom_container">
                <div class="row">
                    <div class="col-lg-9 text-left">
                        <ul class="main-menu navbar">
                            <li><a href="/">Home</a></li>
                        </ul>
                    </div> <!-- col-lg-9 text-left -->
                    <div class="col-lg-3 text-right">

                    </div> <!-- col-lg-3 text-right -->
                </div> <!-- row -->
            </div> <!-- container custom_container -->
        </div> <!-- header_bottom shadow-sm bg-white rounded bg-white -->

    </header> <!-- header -->

    <!-- header area end -->


    <!-- vertical menu and slider -->


    <div @if ($categoria > 0) hidden @endif>
        <div id="home_vertical_menu" class="container custom_container menu_slider ">
            <div class="row ">
                <div class="col-lg-3 vertical_menu ">
                    <div class="v_menu bg-white rounded">
                        <div class="cat_menu bg-warning rounded-top"><a href="#"
                                class="pe-auto text-uppercase d-md-none d-sm-none d-none d-lg-block font-weight-bold"><svg
                                    class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="bars" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                                    </path>
                                </svg><!-- <i class="fas fa-bars"></i> Font Awesome fontawesome.com -->all
                                categories</a>
                        </div>

                        <div class="navbar-header d-xl-none d-lg-none">
                            <button type="button" class="btn-navbar navbar-toggle" onclick="openNav()"
                                data-toggle="collapse" data-target=".navbar-ex1-collapse"><svg
                                    class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="bars" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                                    </path>
                                </svg><!-- <i class="fas fa-bars"></i> Font Awesome fontawesome.com --></button>
                        </div>
                        <div id="mySidenav" class="sidenav 	">
                            <div class="close-nav d-xl-none d-lg-none">
                                <span class="categories">Category</span>
                                <a href="javascript:void(0)" class="closebtn pull-right" onclick="closeNav()"><svg
                                        class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="times" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                                        </path>
                                    </svg><!-- <i class="fas fa-times"></i> Font Awesome fontawesome.com --></a>
                            </div>

                            <ul class="vertical_main_menu h_menu navbar navbar-nav">
                                <li class="dropdown mega_menu m1_menu level-1 font-weight-bolder">
                                    <a class="dropdown-toggle" href="single-product.html" role="button"
                                        data-toggle="dropdown" aria-expanded="false"><svg
                                            class="svg-inline--fa fa-mobile-alt fa-w-10" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="mobile-alt"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm112-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v312z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-mobile-alt"></i> Font Awesome fontawesome.com -->portfolio&nbsp;<span
                                            class="float-right mt-1"><svg class="svg-inline--fa fa-angle-down fa-w-10"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="angle-down" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <ul class="row mx-0">
                                                <li class="mg_menu col-lg-6 col-md-12 ">
                                                    <ul>
                                                        <li
                                                            class="h_title text-uppercase font-weight-bold border-bottom">
                                                            portfolio grid 2</li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="portfolio-grid-2.html">portfolio grid 2</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="portfolio-grid-3.html">portfolio grid 3</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="portfolio-grid-4.html">portfolio grid 4</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="mesonary-grid-2.html">mesonary grid 2</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="mesonary-grid-3.html">mesonary grid 3</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="mesonary-grid-4.html">mesonary grid 4</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mg_menu col-lg-6 col-md-12">
                                                    <ul>
                                                        <li
                                                            class="h_title text-uppercase font-weight-bold border-bottom">
                                                            theme elements</li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="title.html">title</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="category-style.html">category</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="services.html">services</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="product-tab.html">product tab</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="multi-slider-product.html">multi slider
                                                                product</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown level-1 font-weight-bolder">
                                    <a class="dropdown-toggle" href="blog.html" role="button"
                                        data-toggle="dropdown" aria-expanded="false"><svg
                                            class="svg-inline--fa fa-hourglass fa-w-12" aria-hidden="true"
                                            focusable="false" data-prefix="far" data-icon="hourglass" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M368 48h4c6.627 0 12-5.373 12-12V12c0-6.627-5.373-12-12-12H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h4c0 80.564 32.188 165.807 97.18 208C47.899 298.381 16 383.9 16 464h-4c-6.627 0-12 5.373-12 12v24c0 6.627 5.373 12 12 12h360c6.627 0 12-5.373 12-12v-24c0-6.627-5.373-12-12-12h-4c0-80.564-32.188-165.807-97.18-208C336.102 213.619 368 128.1 368 48zM64 48h256c0 101.62-57.307 184-128 184S64 149.621 64 48zm256 416H64c0-101.62 57.308-184 128-184s128 82.38 128 184z">
                                            </path>
                                        </svg>
                                        <!-- <i class="far fa-hourglass"></i> Font Awesome fontawesome.com -->blog&nbsp;<span
                                            class="float-right mt-1"><svg class="svg-inline--fa fa-angle-down fa-w-10"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="angle-down" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item font-weight-bolder" href="blog.html">blog</a></li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="blog-left-sidebar.html">left
                                                sidebar</a></li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="blog-right-sidebar.html">right
                                                sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown level-1 font-weight-bolder">
                                    <a class="dropdown-toggle" href="shop-left-sidebar.html" role="button"
                                        data-toggle="dropdown" aria-expanded="false"><svg
                                            class="svg-inline--fa fa-laptop fa-w-20" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="laptop" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-laptop"></i> Font Awesome fontawesome.com -->shop&nbsp;<span
                                            class="float-right mt-1"><svg class="svg-inline--fa fa-angle-down fa-w-10"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="angle-down" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="shop-left-sidebar.html">left
                                                sidebar</a></li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="shop-right-sidebar.html">right
                                                sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown mega_menu level-1 font-weight-bolder">
                                    <a class="dropdown-toggle" href="single-product.html" role="button"
                                        data-toggle="dropdown" aria-expanded="false"><svg
                                            class="svg-inline--fa fa-mobile-alt fa-w-10" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="mobile-alt"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm112-108c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12V60c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v312z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-mobile-alt"></i> Font Awesome fontawesome.com -->Smartphone&nbsp;<span
                                            class="float-right mt-1"><svg class="svg-inline--fa fa-angle-down fa-w-10"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="angle-down" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <ul class="row mx-0">
                                                <li class="mg_menu col-lg-4 col-md-12 ">
                                                    <ul>
                                                        <li
                                                            class="h_title text-uppercase font-weight-bold border-bottom">
                                                            fashion</li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">Laptop</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">head phone</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">computer</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">chair</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">mobile</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mg_menu col-lg-4 col-md-12">
                                                    <ul>
                                                        <li
                                                            class="h_title text-uppercase font-weight-bold border-bottom">
                                                            fashion</li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">Laptop</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">head phone</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">computer</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">chair</a></li>
                                                        <li><a class="dropdown-item font-weight-bolder"
                                                                href="single-product.html">mobile</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mg_menu col-lg-4 col-md-12">
                                                    <ul>
                                                        <li><a href="single-product.html"><img
                                                                    src="assets/img/product/deal2.jpg"
                                                                    class="fst-image mx-auto d-block mb-1 img-fluid"
                                                                    alt="deal2"></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown level-1 font-weight-bolder">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-expanded="false"><svg class="svg-inline--fa fa-laptop fa-w-20"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="laptop" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M624 416H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33.02-17.47-32.77-32H16c-8.8 0-16 7.2-16 16v16c0 35.2 28.8 64 64 64h512c35.2 0 64-28.8 64-64v-16c0-8.8-7.2-16-16-16zM576 48c0-26.4-21.6-48-48-48H112C85.6 0 64 21.6 64 48v336h512V48zm-64 272H128V64h384v256z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-laptop"></i> Font Awesome fontawesome.com -->pages&nbsp;<span
                                            class="float-right mt-1"><svg class="svg-inline--fa fa-angle-down fa-w-10"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="angle-down" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com --></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item font-weight-bolder" href="about-us.html">about
                                                us</a>
                                        </li>
                                        <li><a class="dropdown-item font-weight-bolder" href="login.html">login</a>
                                        </li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="registration.html">registration</a></li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="single-product.html">single
                                                product</a></li>
                                        <li><a class="dropdown-item font-weight-bolder" href="single-blog.html">single
                                                blog</a></li>
                                        <li><a class="dropdown-item font-weight-bolder" href="cart.html">cart</a></li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="compare.html">compare</a>
                                        </li>
                                        <li><a class="dropdown-item font-weight-bolder"
                                                href="wishlist.html">wishlist</a>
                                        </li>
                                        <li><a class="dropdown-item font-weight-bolder" href="checkout.html">check
                                                out</a>
                                        </li>
                                        <li><a class="dropdown-item font-weight-bolder" href="forgot.html">forgot
                                                password</a></li>
                                    </ul>
                                </li>
                                <li class="level-1 font-weight-bolder"><a href="single-product.html"><svg
                                            class="svg-inline--fa fa-tv fa-w-20" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="tv" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M592 0H48A48 48 0 0 0 0 48v320a48 48 0 0 0 48 48h240v32H112a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16H352v-32h240a48 48 0 0 0 48-48V48a48 48 0 0 0-48-48zm-16 352H64V64h512z">
                                            </path>
                                        </svg><!-- <i class="fas fa-tv"></i> Font Awesome fontawesome.com -->TV &amp;
                                        Audio</a></li>
                                <li class="level-1 font-weight-bolder"><a href="single-product.html"><svg
                                            class="svg-inline--fa fa-headphones-alt fa-w-16" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="headphones-alt"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M160 288h-16c-35.35 0-64 28.7-64 64.12v63.76c0 35.41 28.65 64.12 64 64.12h16c17.67 0 32-14.36 32-32.06V320.06c0-17.71-14.33-32.06-32-32.06zm208 0h-16c-17.67 0-32 14.35-32 32.06v127.88c0 17.7 14.33 32.06 32 32.06h16c35.35 0 64-28.71 64-64.12v-63.76c0-35.41-28.65-64.12-64-64.12zM256 32C112.91 32 4.57 151.13 0 288v112c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16V288c0-114.67 93.33-207.8 208-207.82 114.67.02 208 93.15 208 207.82v112c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16V288C507.43 151.13 399.09 32 256 32z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-headphones-alt"></i> Font Awesome fontawesome.com -->Headphone</a>
                                </li>
                                <li class="level-1 font-weight-bolder"><a href="single-product.html"><svg
                                            class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true"
                                            focusable="false" data-prefix="far" data-icon="clock" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z">
                                            </path>
                                        </svg><!-- <i class="far fa-clock"></i> Font Awesome fontawesome.com -->Smart
                                        watch</a></li>
                                <li class="level-1 font-weight-bolder"><a href="shop-left-sidebar.html"><svg
                                            class="svg-inline--fa fa-keyboard fa-w-18" aria-hidden="true"
                                            focusable="false" data-prefix="far" data-icon="keyboard" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M528 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm8 336c0 4.411-3.589 8-8 8H48c-4.411 0-8-3.589-8-8V112c0-4.411 3.589-8 8-8h480c4.411 0 8 3.589 8 8v288zM170 270v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm-336 82v-28c0-6.627-5.373-12-12-12H82c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm384 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zM122 188v-28c0-6.627-5.373-12-12-12H82c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm-98 158v-16c0-6.627-5.373-12-12-12H180c-6.627 0-12 5.373-12 12v16c0 6.627 5.373 12 12 12h216c6.627 0 12-5.373 12-12z">
                                            </path>
                                        </svg>
                                        <!-- <i class="far fa-keyboard"></i> Font Awesome fontawesome.com -->Accessories</a>
                                </li>
                                <li class="level-1 font-weight-bolder"><a href="single-product.html"><svg
                                            class="svg-inline--fa fa-tshirt fa-w-20" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="tshirt" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M631.2 96.5L436.5 0C416.4 27.8 371.9 47.2 320 47.2S223.6 27.8 203.5 0L8.8 96.5c-7.9 4-11.1 13.6-7.2 21.5l57.2 114.5c4 7.9 13.6 11.1 21.5 7.2l56.6-27.7c10.6-5.2 23 2.5 23 14.4V480c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V226.3c0-11.8 12.4-19.6 23-14.4l56.6 27.7c7.9 4 17.5.8 21.5-7.2L638.3 118c4-7.9.8-17.6-7.1-21.5z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-tshirt"></i> Font Awesome fontawesome.com -->Fashion</a>
                                </li>
                                <li class="level-1 font-weight-bolder"><a href="single-product.html"><svg
                                            class="svg-inline--fa fa-universal-access fa-w-16" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="universal-access"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 48c114.953 0 208 93.029 208 208 0 114.953-93.029 208-208 208-114.953 0-208-93.029-208-208 0-114.953 93.029-208 208-208m0-40C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 56C149.961 64 64 149.961 64 256s85.961 192 192 192 192-85.961 192-192S362.039 64 256 64zm0 44c19.882 0 36 16.118 36 36s-16.118 36-36 36-36-16.118-36-36 16.118-36 36-36zm117.741 98.023c-28.712 6.779-55.511 12.748-82.14 15.807.851 101.023 12.306 123.052 25.037 155.621 3.617 9.26-.957 19.698-10.217 23.315-9.261 3.617-19.699-.957-23.316-10.217-8.705-22.308-17.086-40.636-22.261-78.549h-9.686c-5.167 37.851-13.534 56.208-22.262 78.549-3.615 9.255-14.05 13.836-23.315 10.217-9.26-3.617-13.834-14.056-10.217-23.315 12.713-32.541 24.185-54.541 25.037-155.621-26.629-3.058-53.428-9.027-82.141-15.807-8.6-2.031-13.926-10.648-11.895-19.249s10.647-13.926 19.249-11.895c96.686 22.829 124.283 22.783 220.775 0 8.599-2.03 17.218 3.294 19.249 11.895 2.029 8.601-3.297 17.219-11.897 19.249z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-universal-access"></i> Font Awesome fontawesome.com -->Sale
                                        and Offers</a></li>
                                <li class="level-1 font-weight-bolder wr_hide_menu" style="display: none;"><a
                                        href="shop-left-sidebar.html"><svg class="svg-inline--fa fa-keyboard fa-w-18"
                                            aria-hidden="true" focusable="false" data-prefix="far"
                                            data-icon="keyboard" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M528 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm8 336c0 4.411-3.589 8-8 8H48c-4.411 0-8-3.589-8-8V112c0-4.411 3.589-8 8-8h480c4.411 0 8 3.589 8 8v288zM170 270v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm-336 82v-28c0-6.627-5.373-12-12-12H82c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm384 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zM122 188v-28c0-6.627-5.373-12-12-12H82c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm-98 158v-16c0-6.627-5.373-12-12-12H180c-6.627 0-12 5.373-12 12v16c0 6.627 5.373 12 12 12h216c6.627 0 12-5.373 12-12z">
                                            </path>
                                        </svg>
                                        <!-- <i class="far fa-keyboard"></i> Font Awesome fontawesome.com -->Accessories</a>
                                </li>
                                <li class="level-1 font-weight-bolder wr_hide_menu" style="display: none;"><a
                                        href="single-product.html"><svg class="svg-inline--fa fa-tshirt fa-w-20"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="tshirt" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M631.2 96.5L436.5 0C416.4 27.8 371.9 47.2 320 47.2S223.6 27.8 203.5 0L8.8 96.5c-7.9 4-11.1 13.6-7.2 21.5l57.2 114.5c4 7.9 13.6 11.1 21.5 7.2l56.6-27.7c10.6-5.2 23 2.5 23 14.4V480c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V226.3c0-11.8 12.4-19.6 23-14.4l56.6 27.7c7.9 4 17.5.8 21.5-7.2L638.3 118c4-7.9.8-17.6-7.1-21.5z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-tshirt"></i> Font Awesome fontawesome.com -->Fashion</a>
                                </li>
                                <li class="level-1 font-weight-bolder wr_hide_menu" style="display: none;"><a
                                        href="single-product.html"><svg
                                            class="svg-inline--fa fa-universal-access fa-w-16" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="universal-access"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 48c114.953 0 208 93.029 208 208 0 114.953-93.029 208-208 208-114.953 0-208-93.029-208-208 0-114.953 93.029-208 208-208m0-40C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 56C149.961 64 64 149.961 64 256s85.961 192 192 192 192-85.961 192-192S362.039 64 256 64zm0 44c19.882 0 36 16.118 36 36s-16.118 36-36 36-36-16.118-36-36 16.118-36 36-36zm117.741 98.023c-28.712 6.779-55.511 12.748-82.14 15.807.851 101.023 12.306 123.052 25.037 155.621 3.617 9.26-.957 19.698-10.217 23.315-9.261 3.617-19.699-.957-23.316-10.217-8.705-22.308-17.086-40.636-22.261-78.549h-9.686c-5.167 37.851-13.534 56.208-22.262 78.549-3.615 9.255-14.05 13.836-23.315 10.217-9.26-3.617-13.834-14.056-10.217-23.315 12.713-32.541 24.185-54.541 25.037-155.621-26.629-3.058-53.428-9.027-82.141-15.807-8.6-2.031-13.926-10.648-11.895-19.249s10.647-13.926 19.249-11.895c96.686 22.829 124.283 22.783 220.775 0 8.599-2.03 17.218 3.294 19.249 11.895 2.029 8.601-3.297 17.219-11.897 19.249z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-universal-access"></i> Font Awesome fontawesome.com -->Sale
                                        and Offers</a></li>

                                <li class="view_more"><a><svg class="svg-inline--fa fa-plus fa-w-14"
                                            aria-hidden="true" focusable="false" data-prefix="fa" data-icon="plus"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fa fa-plus"></i> Font Awesome fontawesome.com --><span>More</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- v_menu bg-white rounded -->
                </div> <!-- col-md-3 vertical_menu -->
                <div class="col-lg-9 col-md-12 main_slider">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100 img-fluid"
                                    alt="s1">
                            </div> <!-- carousel-item active -->
                            <div class="carousel-item active">
                                <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100 img-fluid"
                                    alt="s2">
                            </div> <!-- carousel-item -->
                            <div class="carousel-item">
                                <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100 img-fluid"
                                    alt="s3">
                            </div> <!-- carousel-item -->
                        </div> <!-- carousel-inner -->
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div> <!-- carousel slide carousel-fade -->
                </div> <!-- col-md-9 main_slider -->
            </div> <!-- row -->
        </div> <!-- container custom_container menu_slider mt-4 -->

        <!-- vertical menu and slider end -->

        <div wire:ignore class="container custom_container t_pro_container  animate__animated animate__fadeInUp">
            <div class="row">
                <div class="col-12">
                    <div class="title_outer">
                        <h5 class="font-weight-bolder mb-4 d-inline-block pr-3"><span class="text-danger">top</span>
                            products</h5>
                    </div> <!-- title_outer -->
                </div> <!-- col-12 -->
            </div> <!-- row -->

            <div class="row">
                <div class="owl-carousel owl-theme owl-loaded" id="carrusel1">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach ($productos as $product)
                                <div class="owl-item" style="width: 100px;">
                                    <div class="item">
                                        <div class="col-12">
                                            <div class="product_thumb bg-white rounded">
                                                <div class="pro_image">

                                                    <a href="single-product.html"><img
                                                            src="/images/products/{{ $product->imagen_producto }}"
                                                            class="fst-image mx-auto d-block img-fluid"
                                                            alt="product_13"></a>
                                                    <a href="single-product.html"><img
                                                            src="/images/products/{{ $product->imagen_producto }}"
                                                            class="second-img mx-auto d-block img-fluid"
                                                            alt="product_14"></a>

                                                </div>

                                                <div class="text-center">
                                                    <div class="button-group">
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#cart_model"
                                                            onclick="modal_mostra({{ json_encode($product) }})"><svg
                                                                width="20px" height="19px">
                                                                <use xlink:href="#pro_cart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#compare_model"><svg width="20px"
                                                                height="19px">
                                                                <use xlink:href="#pro_compare"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#eye_model">
                                                            <svg width="20px" height="19px">
                                                                <use xlink:href="#pro_eye"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#heart_model"><svg width="20px"
                                                                height="19px">
                                                                <use xlink:href="#pro_heart"></use>
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    <div class="main_text">
                                                        <div class="star">
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                        </div>
                                                        <h2 class="text-center pro-heading my-2">
                                                            <a href="single-product.html" class="font-weight-bolder">
                                                                {{ $product->marca . ' ' . $product->modelo }}
                                                            </a>
                                                        </h2>
                                                        <span class="text-center">
                                                            <span class="font-weight-bolder price">L.
                                                                {{ $product->prec_venta_fin }}</span>
                                                            <del class="text-muted">L.
                                                                {{ $product->prec_venta_fin + 100 }}</del>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav">
                        <button type="button" role="presentation" class="owl-prev" id="btPrevio">
                            <svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false"
                                data-prefix="fa" data-icon="chevron-left" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z">
                                </path>
                            </svg><!-- <i class="fa fa-chevron-left"></i> Font Awesome fontawesome.com --></button>
                        <button type="button" role="presentation" class="owl-next" id="btNext">
                            <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" focusable="false"
                                data-prefix="fa" data-icon="chevron-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                                </path>
                            </svg><!-- <i class="fa fa-chevron-right"></i> Font Awesome fontawesome.com --></button>
                    </div>
                </div>
                <div class="owl-dots">
                    <div class="owl-dot active"><span></span></div>
                    @foreach ($productos as $product)
                        <div class="owl-dot"><span></span></div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- top product end -->

        <!-- banner -->

        <div class="container custom_container banner_container ">
            <div class="row bnr_row">
                <div class="col-md-6 col-12 bnr_col">
                    <div class="banner">
                        <a href="#">
                            <img src="assets/img/ban1.jpg"
                                class="rounded float-left img-fluid  animate__animated animate__fadeInUp "
                                data-wow-duration="0.8s" data-wow-delay="0.2s" alt="ban1">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-12 bnr_col">
                    <div class="banner">
                        <a href="#">
                            <img src="assets/img/ban2.jpg"
                                class="rounded float-right img-fluid  animate__animated animate__fadeInUp "
                                data-wow-duration="0.8s" data-wow-delay="0.4s" alt="ban2">
                        </a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container custom_container main_banner -->

        <!-- banner end -->

        <div wire:ignore class="container custom_container t_pro_container  animate__animated animate__fadeInUp">
            <div class="row">
                <div class="col-12">
                    <div class="title_outer">
                        <h5 class="font-weight-bolder mb-4 d-inline-block pr-3"><span class="text-danger">Top
                                10</span>
                            Mejor Vendidos</h5>
                    </div> <!-- title_outer -->
                </div> <!-- col-12 -->
            </div> <!-- row -->

            <div class="row">
                <div class="owl-carousel owl-theme owl-loaded" id="carrusel2">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach ($mas_vendidos as $product)
                                <div class="owl-item" style="width: 100px;">
                                    <div class="item">
                                        <div class="col-12">
                                            <div class="product_thumb bg-white rounded">
                                                <div class="pro_image">

                                                    <a href="single-product.html"><img
                                                            src="/images/products/{{ $product->imagen_producto }}"
                                                            class="fst-image mx-auto d-block img-fluid"
                                                            alt="product_13"></a>
                                                    <a href="single-product.html"><img
                                                            src="/images/products/{{ $product->imagen_producto }}"
                                                            class="second-img mx-auto d-block img-fluid"
                                                            alt="product_14"></a>

                                                </div>

                                                <div class="text-center">
                                                    <div class="button-group">
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#cart_model"
                                                            onclick="modal_mostra({{ json_encode($product) }})"><svg
                                                                width="20px" height="19px">
                                                                <use xlink:href="#pro_cart"></use>
                                                            </svg></a>
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#compare_model"><svg width="20px"
                                                                height="19px">
                                                                <use xlink:href="#pro_compare"></use>
                                                            </svg></a>
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#eye_model"><svg width="20px"
                                                                height="19px">
                                                                <use xlink:href="#pro_eye"></use>
                                                            </svg></a>
                                                        <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#heart_model"><svg width="20px"
                                                                height="19px">
                                                                <use xlink:href="#pro_heart"></use>
                                                            </svg></a>
                                                    </div>

                                                    <div class="main_text">
                                                        <div class="star">
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false" data-prefix="fa"
                                                                data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                            <svg class="svg-inline--fa fa-star fa-w-18"
                                                                aria-hidden="true" focusable="false"
                                                                data-prefix="fa" data-icon="star" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                                </path>
                                                            </svg>
                                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                                        </div>
                                                        <h2 class="text-center pro-heading my-2">
                                                            <a href="single-product.html"
                                                                class="font-weight-bolder">
                                                                {{ $product->marca . ' ' . $product->modelo }}
                                                            </a>
                                                        </h2>
                                                        <span class="text-center">
                                                            <span class="font-weight-bolder price">L.
                                                                {{ $product->prec_venta_fin }}</span>
                                                            <del class="text-muted">L.
                                                                {{ $product->prec_venta_fin + 100 }}</del>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav">
                        <button type="button" role="presentation" class="owl-prev" id="btPrevio2">
                            <svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true"
                                focusable="false" data-prefix="fa" data-icon="chevron-left" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z">
                                </path>
                            </svg><!-- <i class="fa fa-chevron-left"></i> Font Awesome fontawesome.com --></button>
                        <button type="button" role="presentation" class="owl-next" id="btNext2">
                            <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true"
                                focusable="false" data-prefix="fa" data-icon="chevron-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                                </path>
                            </svg><!-- <i class="fa fa-chevron-right"></i> Font Awesome fontawesome.com --></button>
                    </div>
                </div>
                <div class="owl-dots">
                    <div class="owl-dot active"><span></span></div>
                    @foreach ($mas_vendidos as $product)
                        <div class="owl-dot"><span></span></div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- banner -->

        <div class="container custom_container main_banner  animate__animated animate__fadeInUp">
            <div class="row">
                <div class="col-12">
                    <div class="banner">
                        <a href="#">
                            <img src="{{ asset('images/bannerfull1-1.png') }}" class="rounded img-fluid"
                                alt="full_banner">
                        </a>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
        <!-- container custom_container main_banner -->
    </div>

    <div @if ($categoria == 0) hidden @endif>
        <div class="sp_header bg-white p-3">
            <div class="container custom_container ">
                <div class="row ">
                    <div class="col-12 ">

                    </div>
                </div>
            </div>
        </div>

        <div class="container custom_container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="shop_sidebar border card-body rounded bg-white">

                        <h2 class="text-uppercase card-title  font-weight-bold d-md-block d-none">filter by</h2>

                        <div class="s_filter mt-0">
                            <h6 class="text-uppercase  border-bottom font-weight-bold">Range<button
                                    class="toggle collapsed" data-toggle="collapse"
                                    data-target="#shop_range_collapse"></button></h6>
                            <div class="collapse " id="shop_range_collapse">
                                <div class="col-md-6 col-sm-12 pl-0 pr-md-2 pr-sm-0 pr-0">
                                    <label class="font-weight-bolder">min</label>
                                    <input type="number" class="form-control" placeholder="$0">
                                </div>
                                <div class="col-md-6 col-sm-12 pr-0 pl-md-2 pl-sm-0 pl-0 ">
                                    <label class="font-weight-bolder">max</label>
                                    <input type="number" class="form-control" placeholder="$0">
                                </div>
                            </div>
                        </div>

                        <div class="s_filter form">
                            <h6 class="text-uppercase  border-bottom font-weight-bold">color<button
                                    class="toggle collapsed" data-toggle="collapse"
                                    data-target="#shop_color_collapse"></button></h6>
                            <div class="collapse" id="shop_color_collapse">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">pink</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input " type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">yellow</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">white</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">black</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                            </div>
                        </div>

                        <div class="s_filter">
                            <h6 class="text-uppercase border-bottom font-weight-bold">brand<button
                                    class="toggle collapsed" data-toggle="collapse"
                                    data-target="#shop_brand_collapse"></button></h6>
                            <div class="collapse" id="shop_brand_collapse">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">brand1</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">brand1</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">another brand</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                            </div>
                        </div>

                        <div class="s_filter">
                            <h6 class="text-uppercase border-bottom font-weight-bold">size<button
                                    class="toggle collapsed" data-toggle="collapse"
                                    data-target="#shop_size_collapse"></button></h6>
                            <div class="collapse" id="shop_size_collapse">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">s</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">m</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">l</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label font-weight-bolder">xl</span>
                                    <span class="text-right float-right font-weight-bolder">(1)</span>
                                </label>
                            </div>
                        </div>


                        <button data-search-url="#" class="btn btn-primary clear_btn ">Clear all</button>


                    </div>

                </div>

                <div class="col-lg-9 col-md-8">

                    <div class="row shop_grid_list_row mb-5 bg-white p-2 p-md-1 mb-lg-3 mx-0">
                        <div class="col-xl-2 col-sm-2 col-4 pl-0">
                            <a href="#" id="grid" class="btn">
                                <span class="grid_icon  p-1"><svg class="svg-inline--fa fa-th fa-w-16"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z">
                                        </path>
                                    </svg><!-- <i class="fas fa-th"></i> Font Awesome fontawesome.com --></span>
                            </a>
                            <a href="#" id="list" class="btn">
                                <span class="list_icon  p-1"><svg class="svg-inline--fa fa-list fa-w-16"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M80 368H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0-16-16zm0 160H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16zm416 176H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z">
                                        </path>
                                    </svg><!-- <i class="fas fa-list"></i> Font Awesome fontawesome.com --></span>
                            </a>
                        </div>
                        <div class="col-xl-4 d-xl-inline-block d-lg-none d-sm-none d-none">
                            <div class="show-product pt-1"><a href="#"> Se encontraron {{ count($productoCategoria) }} producto(s). </a></div>
                        </div>
                        <div class="col-xl-6 col-sm-10 col-8 pr-0 sortpro">
                            <div class="sort-by text-right">
                                <div class="sort">
                                    <select class="custom-select" id="inlineFormCustomSelect">
                                        <option selected="">Relevance...</option>
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="3">Price, low to high</option>
                                        <option value="3">Price, high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="products" class="row">
                        @foreach ($productoCategoria as $product)
                        <div class="item col-xl-3">
                            <div class="product_thumb bg-white rounded" style="width: 100%;">
                                <div class="pro_image">
                                    <a href="single-product.html"><img src="/images/products/{{ $product->imagen_producto }}"
                                            class="fst-image mx-auto d-block img-fluid" alt="product_1"></a>
                                    <a href="single-product.html"><img src="/images/products/{{ $product->imagen_producto }}"
                                            class="second-img mx-auto d-block img-fluid" alt="product_2"></a>
                                </div>

                                <div class="text-center main_text pt-3">
                                    <div>
                                        <div class="star mb-2">
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                focusable="false" data-prefix="fa" data-icon="star"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                focusable="false" data-prefix="fa" data-icon="star"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                focusable="false" data-prefix="fa" data-icon="star"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                focusable="false" data-prefix="fa" data-icon="star"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                            <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true"
                                                focusable="false" data-prefix="fa" data-icon="star"
                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa fa-star" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                                        </div>
                                        <h2 class="pro-heading  font-weight-bolder mb-1	"><a
                                                href="single-product.html"> {{ $product->marca . ' ' . $product->modelo }}</a></h2>

                                        <span>
                                            <span class="font-weight-bold price">L. {{ $product->prec_venta_fin }}</span>
                                            <del class="text-muted">L. {{ $product->prec_venta_fin + 100 }}</del>
                                        </span>

                                        <p class="description mt-1 text-muted">{{$product->descripcion}}</p>

                                        <div class="button-group">
                                            <a href="#" class="symbol" data-toggle="modal"
                                                            data-target="#cart_model"
                                                            onclick="modal_mostra({{ json_encode($product) }})"><svg
                                                                width="20px" height="19px">
                                                    <use xlink:href="#pro_cart"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="symbol" data-toggle="modal"
                                                data-target="#compare_model"><svg width="20px" height="19px">
                                                    <use xlink:href="#pro_compare"></use>
                                                </svg></a>
                                            <a href="#" class="symbol" data-toggle="modal"
                                                data-target="#eye_model"><svg width="20px" height="19px">
                                                    <use xlink:href="#pro_eye"></use>
                                                </svg></a>
                                            <a href="#" class="symbol" data-toggle="modal"
                                                data-target="#heart_model"><svg width="20px" height="19px">
                                                    <use xlink:href="#pro_heart"></use>
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- item -->

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer animate__animated animate__fadeInUp">


        <div class="fifth_footer">
            <div class="container custom_container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center demo_link d-block">2022 @ All rights reserved Powered by <a
                                href="#">Data System</a></div>
                    </div>
                </div>
            </div>
        </div> <!-- row first_footer -->
    </div>

</div>



@push('scripsss')
    <script>
        $(document).ready(function() {

            $('#carrusel2').owlCarousel({
                items: {{ count($mas_vendidos) }},
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: false
            })


        });

        $(document).ready(function() {
            $('#list').click(function(event){4
                event.preventDefault();
                $('#products .item').addClass('shop_list_item');

            });
            $('#grid').click(function(event){
                event.preventDefault();
                $('#products .item').removeClass('shop_list_item');
                $('#products .item').addClass('shop_grid_item');
            });
        });

        var carruserl2 = $('#carrusel2');



        $('#btNext2').click(function() {
            carruserl2.trigger('next.owl.carousel');
        })
        $('#btPrevio2').click(function() {
            carruserl2.trigger('prev.owl.carousel', [300]);
        })

        function modal_mostra(productos) {

            $('#precio_prodcuto').html("L. " + productos['prec_venta_fin']);
            $('#nombre_prodcuto').html(productos['modelo']);
            $('#imagen_prodcuto').attr("src", "/images/products/" + productos['imagen_producto']);
            $('#existencia_prodcuto').html("Existencia: " + productos['existencia']);


            $('#precio_prodcuto2').html("L. " + productos['prec_venta_fin']);

            @this.addCarrito(productos);

        }

        function removeCarrito(id) {
            @this.quitar_item(id);
        }
    </script>
@endpush
