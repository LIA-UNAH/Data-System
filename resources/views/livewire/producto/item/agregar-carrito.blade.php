<div>
    <div class="l-block" style="margin-top: -30px"></div>
    <div class="container-sm">
        <div class="ed-grid s-grid-12">
            <div class="s-cols-11">
                <input class="form-control" type="text" wire:model='busqueda' placeholder="Buscar producto">
            </div>
            <div class="s-cols-1" style="padding: 5px">
                <a href="{{ route('ver-carrito') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    @if(!(\Cart::session(Auth::user()->id)->isEmpty()))
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                            {{ count(\Cart::session(Auth::user()->id)->getContent() )}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif

                </a>
            </div>
        </div>
    </div>
    <div class="l-block"></div>
    <div style="overflow-y: auto; height: calc(75vh);">
        <div class="ed-grid rows-gap s-grid-2 m-grid-3 lg-grid-6">
            @foreach ($productos as $producto)
                <div>
                    <article class="s-shadow-bottom">
                        <!--Contenedor de la imagen-->
                        <div class="s-ratio-1-1 img-container s-radius-tl s-radius-tr">
                            <img src="/images/products/{{ $producto->imagen_producto }}" alt="Product" />
                        </div>
                        <!--Contenido-->
                        <div class="s-bg-white s-pxy-2">
                            <h6 style=" white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><strong>{{ $producto->marca . ' ' . $producto->modelo }}</strong></h6>
                            <p class="s-mb-0">L. {{ number_format($producto->prec_venta_fin, 2, ".", ",") }}</p>
                        </div>
                        <footer class="s-cross-center s-bg-grey s-pxy-2 s-radius-br s-radius-bl">
                            <!--Define el ancho máximo de la imagen-->
                            <div class="s-7 s-mr-1" style="font-size: 0.9em">

                            </div>
                            <!--Boton-->
                            @if($producto->existencia == 0)
                                <div class="button s-to-right">Sin Existencia</div>
                            @else
                                <div class="button s-to-right" wire:click="addCarrito({{ $producto }})">Añadir</div>
                            @endif
                        </footer>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</div>
