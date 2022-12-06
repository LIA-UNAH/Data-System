
<link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">


<div class="page-content container-fluid">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Compra
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: {{ $compra->docummento_compra }}
            </small>
        </h1>
    </div>

    <div class="container-fluid px-0" style="width: 95%">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row-reverse">
                    <div class="col">

                    </div>
                    <div class="col">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Data-System</span>
                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>


                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <!--Datos del Cliente-->
                <div class="row">
                    <div class="text-start col-sm-6 t">
                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125" style="color:gray">
                            <strong>Datos del Proveedor</strong>
                        </div>

                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nombre del Proveedor:</span>
                            <span
                                class="text-600 text-110 text-blue align-middle">{{ $compra->proveedor->nombre_proveedor }}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                <span class="text-sm text-grey-m2 align-middle">Teléfono:</span>
                                <span
                                    class="text-600 text-110 text-blue align-middle">{{ $compra->proveedor->telefono_proveedor }}</span>
                            </div>
                            <div class="my-1">
                                <span class="text-sm text-grey-m2 align-middle">RTN:</span>
                                <span
                                    class="text-600 text-110 text-blue align-middle">{{ $compra->proveedor->rtn_proveedor }}</span>
                            </div>
                            <div class="my-1">
                                <span class="text-sm text-grey-m2 align-middle">Dirección:</span>
                                <span
                                    class="text-600 text-110 text-blue align-middle">{{ $compra->proveedor->direccion_proveedor }}</span>
                            </div>

                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                <strong>Datos de la Factura</strong>
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1">
                                </i>
                                <span class="text-600 text-90">ID: {{ $compra->docummento_compra }}</span>
                            </div>

                            <div class="my-2">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                <span class="text-600 text-90">Fecha:
                                    {{ \Carbon\Carbon::parse($compra->fecha_compra)->isoFormat('DD') }} de
                                    {{ \Carbon\Carbon::parse($compra->fecha_compra)->isoFormat('MMMM') }},
                                    {{ \Carbon\Carbon::parse($compra->fecha_compra)->isoFormat('YYYY') }}
                                </span>
                            </div>

                            <div class="my-2">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                <span class="text-600 text-90">Comprado Por: {{ $compra->user->name }}</span>
                                <span class="badge badge-warning badge-pill px-25"></span>
                            </div>
                        </div>
                    </div>

                </div>




                <!-- or use a table instead -->

                <div class="table-responsive" id="tblaBody">
                    <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                        <thead class="bg-none bgc-default-tp1">
                            <tr class="text-white">
                                <th class="opacity-2">#Num</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody class="text-95 text-secondary-d3">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($compra->detalle_compra as $i => $detalle)
                                <tr>
                                    <td class="num">{{ ++$i }}</td>
                                    <td class="descripcion" style="text-align: center">
                                        {{ $detalle->producto->marca . ' ' . $detalle->producto->modelo }}</td>
                                    <td class="cant">{{ $detalle->cantidad_detalle_compra }}</td>
                                    <td class="precu">L {{ number_format($detalle->precio, 2, '.', ',') }}</td>
                                    <td class="total">L
                                        {{ number_format($detalle->precio * $detalle->cantidad_detalle_compra, 2, '.', ',') }}
                                    </td>
                                </tr>
                                @php
                                    $total += $detalle->precio * $detalle->cantidad_detalle_compra;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="row mt-3">
                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                    </div>

                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                        <div class="row my-2">
                            <div class="col-7 text-right">
                                SubTotal
                            </div>
                            <div class="col-5" style="text-align: right">
                                <span class="text-150 text-success-d3 opacity-2">L
                                    {{ number_format($total * 0.85, 2, '.', ',') }}</span>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-7 text-right">
                                Impuesto s/v. (15%)
                            </div>
                            <div class="col-5" style="text-align: right">
                                <span class="text-150 text-success-d3 opacity-2">L
                                    {{ number_format($total * 0.15, 2, '.', ',') }}</span>
                            </div>
                        </div>

                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                            <div class="col-7 text-right">
                                Total
                            </div>
                            <div class="col-5" style="text-align: right">
                                <span class="text-150 text-success-d3 opacity-2">L
                                    {{ number_format($total, 2, '.', ',') }}</span>
                            </div>
                        </div>
                        <div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
