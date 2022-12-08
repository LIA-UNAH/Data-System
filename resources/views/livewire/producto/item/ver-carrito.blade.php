<div>


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
                                <span class="dropdown-toggle" role="menu" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><a href="/"
                                        class="font-weight-bolder">{{ Auth::user()->name }}<svg
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
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/') }}" class="dropdown-item font-weight-bolder">Home</a>
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
                        <div class="text-left header-top-left pt-2"><a href="/"><img src="assets/img/Hitech..png"
                                    class="img-responsive img" alt="Hitech"></a></div>
                    </div> <!-- col-xl-2 col-lg-2 col-md-2 col-sm-3 head-logo -->
                    <div class="col-xl-10 col-lg-10 col-6  head-search">
                        <div class="d-flex navbar">
                            <div class="input-class  text-left col-xl-8 col-lg-7 col-md-12  ">


                            </div>

                            <div class="col-xl-4 col-lg-5 head-right text-right">
                                <ul>

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
                                                @foreach ($datos as $item)
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
                                                    <span class="text-left"><a href="{{ route('ver-carrito') }}">view
                                                            cart</a></span>
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


    <div id="cart_page" class="cart-page animate__animated animate__fadeInUp">


        <div class="sp_header bg-white p-3 ">
            <div class="container custom_container ">
                <div class="row ">
                    <div class="col-12 ">

                    </div>
                </div>
            </div>
        </div>

        <div class="container custom_container ">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">

                        <div class="card-header cart_header bg-white">
                            <div class="card-title mb-0">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="mb-0"><svg class="svg-inline--fa fa-shopping-cart fa-w-18"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="shopping-cart" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fas fa-shopping-cart"></i> Font Awesome fontawesome.com -->&nbsp;&nbsp;Carrito
                                            de compras</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body cart_body">
                            @foreach ($datos  as $item)
                            <div class="row">
                                <div class="col-12 col-md-6 pr-0">
                                    <div class="d-flex">
                                        <div class=" col-xl-4 col-lg-5 col-md-4 col-4 px-0">
                                            <a href="#"><img src="/images/products/{{ $item['associatedModel']['imagen_producto'] }}"
                                                    class="fst-image mx-auto d-block img-fluid" alt="product_13"></a>
                                        </div>
                                        <div class=" col-xl-8 col-lg-7 col-md-8 col-8 pr-0">
                                            <h4
                                                class="product-name font-weight-bold mb-2 mb-sm-3 mb-xl-3 mt-sm-2 mt-md-2">
                                                <a href="#">{{ $item['name'] }}</a></h4>
                                            <div><span class="font-weight-bolder price">L. {{ number_format($item['price'], 2, ".", ",") }}</span> <del
                                                    class="text-muted">L. {{ number_format($item['price'] + 100, 2, ".", ",") }}</del></div>
                                            <div class="my-1 f_13">
                                                <span>size:</span>
                                                <span></span>
                                            </div>
                                            <div class="f_13">
                                                <span>color:</span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <div class="d-flex">
                                        <div class="col-md-3 col-sm-4 col-5 text-left text-md-right my-2 ">
                                            <span class="font-weight-bold">L. {{ number_format($item['price'] * $item['quantity'], 2, ".", ",") }}</span>
                                        </div>
                                        <div class="col-md-7 col-sm-4 col-5">
                                            <input type="number" class="form-control border" min="1" wire:change="actualizar_total($event.target.value, {{$item['id']}})" value="{{ $item['quantity'] }}">
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-2 my-2 mt-1 text-right text-md-left">
                                            <a href="#" wire:click="quitar_item({{$item['id']}})">
                                                <svg class="svg-inline--fa fa-trash-alt fa-w-14"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="trash-alt" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 col-sm-7 text-right">
                                    <div class="my-2 font-weight-bold">
                                        <span>Total:</span>
                                        <span>{{ $precio_total }}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <a wire:click="guardar_venta()"
                                        class="btn btn-success btn-block f_13 font-weight-bold">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="border rounded bg-white final_payment">
                        <div class="card-body  border-bottom">
                            <p class="text-muted">{{ $total_items }} Items</p>
                            <p class="font-weight-bolder">Ver Detalles</p>
                            <div>
                                <span class="font-weight-bold">Subtotal</span>
                                <span class="float-right font-weight-bold">{{ $precio_total }}</span>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div>
                                <span class="font-weight-bold">Total</span>
                                <span class="float-right font-weight-bold">{{ $precio_total }}</span>
                            </div>
                        </div>
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

<div class="modal fade" id="vaciar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #0d6efd; color: white">
                <h5 class="modal-title" id="exampleModalLabel">Vaciar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white">×</span>
                </button>
            </div>
            <div class="modal-body">¿Desea vaciar la canasta?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="button" data-dismiss="modal"
                    onclick="vaciar()">Aceptar</button>
            </div>
        </div>
    </div>
</div>

@push('scripsss')
    <script>
        function vaciar() {
            @this.vaciar_carrito()
        }
    </script>
@endpush
