<div>
    <div class="l-block"></div>
    <div class="container-sm">
        <div class="ed-grid s-grid-12">
            <div class="s-cols-11">
                <input class="form-control" type="text" wire:model='busqueda'>
            </div>
            <div class="s-cols-1" style="padding: 5px">
                <a href="{{ route('ver-carrito') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
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
        <div class="ed-grid rows-gap s-grid-2 m-grid-3 lg-grid-4">
            @foreach ($productos as $producto)
                <div>
                    <article class="s-shadow-bottom">
                        <!--Contenedor de la imagen-->
                        <div class="s-ratio-1-1 img-container s-radius-tl s-radius-tr">
                            <img src="/images/products/{{ $producto->imagen_producto }}" alt="Product" />
                        </div>
                        <!--Contenido-->
                        <div class="s-bg-white s-pxy-2">
                            <h3>{{ $producto->marca . ' ' . $producto->modelo }}</h3>
                            <p class="s-mb-0">HNL {{ $producto->prec_venta_fin }}</p>
                            <p class="s-mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                                </svg> {{ $producto->existencia }}</p>

                        </div>
                        <footer class="s-cross-center s-bg-grey s-pxy-2 s-radius-br s-radius-bl">
                            <!--Define el ancho máximo de la imagen-->
                            <div class="s-7 s-mr-1" style="font-size: 0.9em">

                            </div>
                            <!--Boton-->
                            <div class="button s-to-right" wire:click="addCarrito({{ $producto }})">Añadir al carrito</div>
                        </footer>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</div>
