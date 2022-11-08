<div>
    <div class="l-block"></div>
    <div style="height: calc(85vh);">
        <div class="ed-grid s-grid-4" style="height: calc(85vh)">
            <div class="s-cols-3" style="height: 100%;overflow-y: auto;">
                @forelse ( $datos as $items)
                    <div class="card" style="padding-top: 10px; padding-right: 15px">
                        <div style="text-align: right">
                            <div class="cart-product-name-ope">
                                <span class="comet-icon comet-icon-delete" style="font-size: 16px;"
                                      wire:click="quitar_item({{ $items['id'] }})">
                                    <svg viewBox="0 0 1024 1024" width="1em" height="1em"
                                         fill="currentColor" aria-hidden="false" focusable="false">
                                        <path
                                            d="M615.253333 85.226667a99.2 99.2 0 0 1 99.072 94.336l0.128 4.544 0.042667 18.538666 186.304 0.021334a32 32 0 0 1 3.072 63.850666l-3.072 0.149334-37.653333-0.021334-57.066667 570.368a121.6 121.6 0 0 1-116.096 109.781334l-4.928 0.106666H353.642667a121.6 121.6 0 0 1-120.832-107.946666L166.016 266.624 128 266.666667a32 32 0 0 1-3.072-63.850667L128 202.666667l182.165333-0.021334 0.704-21.504A99.2 99.2 0 0 1 405.461333 85.333333l4.544-0.106666h205.226667z m183.082667 188.586666H230.997333l65.429334 557.952a57.6 57.6 0 0 0 53.589333 51.029334l3.626667 0.106666h331.413333a57.6 57.6 0 0 0 57.322667-52.053333l55.957333-557.034667z m-179.52 152.874667l3.072 0.042667c17.493333 0.938667 31.146667 15.146667 31.744 32.298666l-0.021333 3.072-13.461334 246.528a33.6 33.6 0 0 1-67.136-0.597333l0.042667-3.072 13.44-246.528c0.96-17.493333 15.146667-31.146667 32.32-31.744z m-209.578667 0c17.173333 0.618667 31.36 14.250667 32.32 31.744l13.44 246.528 0.042667 3.072a33.6 33.6 0 0 1-67.136 0.597333l-13.44-246.528-0.042667-3.072a33.6 33.6 0 0 1 31.744-32.298666zM615.253333 149.226667h-205.226666c-17.941333 0-32.832 13.44-34.944 30.912l-0.256 3.114666-0.64 19.392h276.309333l-0.042667-18.346666a35.2 35.2 0 0 0-32.170666-34.944l-3.029334-0.128z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="cart-product-wrap">
                                <div class="cart-product">
                                    <div class="cart-product-body" style="opacity: 1;">
                                        <div class="cart-product-img" style="opacity: 1;"
                                             data-spm-anchor-id="a2g0o.cart.0.i3.db0c7a9dnQaSo5">
                                            <img src="/images/products/{{ $items['associatedModel']['imagen_producto'] }}"
                                                 alt="" style="width: 144px; height: 144px;">
                                        </div>
                                    </div>
                                    <div class="cart-product-info" style="margin-top: 10px">
                                        <div class="cart-product-name">
                                            <a href="#" style="opacity: 1; color: #1a202c; font-size: 18px"> <strong>{{ $items['name'] }}</strong></a>
                                        </div>
                                        <div class="cart-product-name">
                                            <p>{{$items['associatedModel']['descripcion'] }}</p>

                                        </div>



                                        <div class="cart-product-block" style="opacity: 1;">
                                            <div class="cart-product-block-left">
                                                <div class="cart-product-price">
                                                    <span>L. {{ number_format($items['price'], 2, ".", ",") }}</span>
                                                    <span class="cart-product-price-s">
                                                    <span style="text-decoration: line-through;color: #CCCCCC;">L. {{ number_format($items['price'], 2, ".", ",") }}</span>
                                                    <span
                                                        style="font-size: 12px;margin-left: 4px;padding: 2px 4px;background: rgba(255,71,46,0.1);border-radius: 2px;color: #FF472E;transform: scale(0.9);">-58%</span>
                                                </span>
                                                </div>
                                                <div class="cart-product-ship">Gastos de envío: L. 0.00</div>
                                            </div>
                                            <div class="cart-product-block-right">
                                                <div class="cart-product-price-picker">
                                                    <div class="comet-input-number">
                                                        <div class="comet-input-number-btn">
                                                        <span class="comet-icon comet-icon-subtract"
                                                              wire:click="actualizar_cantidad(-1,{{ $items['id'] }},{{ $items['associatedModel']['existencia'] }},{{ $items['quantity'] }})">
                                                            <svg viewBox="0 0 1024 1024" width="1em" height="1em"
                                                                 fill="currentColor" aria-hidden="false"
                                                                 focusable="false">
                                                                <path
                                                                    d="M864 480a32 32 0 0 1 1.877333 63.946667L864 544H160a32 32 0 0 1-1.877333-63.946667L160 480h704z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        </div>
                                                        <input type="text" class="comet-input-number-input"
                                                               value="{{ $items['quantity'] }}">
                                                        <div class="comet-input-number-btn">
                                                        <span class="comet-icon comet-icon-add "
                                                              wire:click="actualizar_cantidad(1,{{ $items['id'] }},{{ $items['associatedModel']['existencia'] }},{{ $items['quantity'] }})">
                                                            <svg viewBox="0 0 1024 1024" width="1em" height="1em"
                                                                 fill="currentColor" aria-hidden="false"
                                                                 focusable="false">
                                                                <path
                                                                    d="M864 480a32 32 0 0 1 1.877333 63.946667L864 544H160a32 32 0 0 1-1.877333-63.946667L160 480h704z">
                                                                </path>
                                                                <path
                                                                    d="M512 128a32 32 0 0 1 31.946667 30.122667L544 160v704a32 32 0 0 1-63.946667 1.877333L480 864V160a32 32 0 0 1 32-32z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>
            <div>
                <div class="card" style="height: 300px; width: 100%">
                    <div class="card-body">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen</h3>
                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-4">
                            <h6 class="text-uppercase">Articulos {{ $total_items }}</h6>
                            <h6>L. {{ number_format($precio_total, 2, ".", ",") }}</h6>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-5">
                            <h6 class="text-uppercase">Precio Total</h6>
                            <h6>L. {{ number_format($precio_total, 2, ".", ",") }}</h6>
                        </div>

                        @if(count($datos) > 0)
                            <a type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark" href="#"
                               data-bs-toggle="modal" data-bs-target="#exampleModal">Facturar</a>
                        @else

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Factura</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label">Nombre:</label>
                        </div>
                        <div class="col">
                            <input type="text" style="width: 100%;height: 100%;">
                        </div>
                        <div class="col">
                            <label class="col-form-label">Fecha:</label>
                        </div>
                        <div class="col">
                            <input type="date" style="width: 100%;height: 100%;" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>N#</th>
                                <th>Descripcion</th>
                                <th>unidades</th>
                                <th>Precio U</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $ite = 0;
                                $total = 0;
                            @endphp

                            @foreach ( $datos as $i => $items )
                                <tr>
                                    <td>{{ ++$ite }}</td>
                                    <td>{{ $items['associatedModel']['codigo'] }} - {{ $items['name'] }}</td>
                                    <td>{{ $items['quantity'] }}</td>
                                    <td>{{ $items['price'] }}</td>
                                    <td style="text-align: right">{{ $items['quantity']*$items['price'] }}</td>
                                    @php
                                        $total+= $items['quantity']*$items['price'];
                                    @endphp
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td style="text-align: right"><strong>{{ $total }}</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='guardar_venta()'>Guardar e Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>
