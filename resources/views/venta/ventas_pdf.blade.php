<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data-system's AlekIsa</title>


    <!-- CSS Fontawesome -->
    <link href={{ asset("admin/fontawesome/css/all.min.css") }} rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href={{ asset("css/fonts.css") }} rel="stylesheet" type="text/css" media="screen">

    <!-- CSS SB Admin -->
    <link href={{ asset("admin/css/sb-admin-2.min.css") }} rel="stylesheet" type="text/css" media="screen">

    <!-- CSS Bootstrap 5.2 -->
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet" type="text/css" media="screen"/>

    <!-- CSS Factura -->
    <link href={{ asset("css/factura.css") }} rel="stylesheet" type="text/css" media="screen"/>

    {{-- AlpineJS --}}
    <script defer src={{ asset("js/alpinejs/alpinejs.min.js") }}></script>

    @livewireStyles

</head>
<body style"width:70%;">


<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Factura
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: {{$venta->numero_factura_venta}}
            </small>
        </h1>
    </div>


    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row-reverse">
                    <div class="col">
                        <div class="text-right text-150">
                            <span class="text-default-d3">Estado</span>
                            @if ($venta->estado == "en_proceso")
                                <i class="fas fa-circle text-blue-m2" title="En Proceso"></i>

                            @else
                                <i class="fas fa-circle text-success-m2" title="Pagado"></i>
                            @endif
                        </div>
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

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nombre Cliente:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$venta->cliente->name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Teléfono:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$venta->cliente->telephone}}</span>
                            </div>
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Correo Electrónico:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$venta->cliente->email}}</span>
                            </div>
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Dirección:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$venta->cliente->address}}</span>
                            </div>

                            </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Datos Factura
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1">
                                </i>
                                <span class="text-600 text-90">ID: {{$venta->numero_factura_venta}}</span>
                            </div>

                            <div class="my-2" >
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"  ></i>
                                <span class="text-600 text-90" >Fecha: {{\Carbon\Carbon::parse($venta->fecha_factura)->isoFormat("DD")}} de {{\Carbon\Carbon::parse($venta->fecha_factura)->isoFormat("MMMM")}}, {{\Carbon\Carbon::parse($venta->fecha_factura)->isoFormat("YYYY")}}
                                </span>
                            </div>

                            <div class="my-2">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                <span class="text-600 text-90">Vendido Por:  {{$venta->user->name}}</span>
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
                            <th class="opacity-2">Numero</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th width="140">Total</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        @php
                            $total=0;
                        @endphp
                        @foreach ($venta->detalle_venta as $i => $detalle )
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$detalle->producto->marca." ".$detalle->producto->modelo}}</td>
                                <td>{{$detalle->cantidad_detalle_venta}}</td>
                                <td>L {{ number_format($detalle->precio_venta, 2, ".", ",") }}</td>
                                <td>L {{ number_format($detalle->precio_venta*$detalle->cantidad_detalle_venta, 2, ".", ",") }}</td>
                            </tr>
                            @php
                                $total+=$detalle->precio_venta*$detalle->cantidad_detalle_venta;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>


                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Reaizar Pago imediato de factura
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5" style="text-align: right">
                                    <span class="text-150 text-success-d3 opacity-2">L {{ number_format($total *  0.85, 2, ".", ",") }}</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Impuesto s/v. (15%)
                                </div>
                                <div class="col-5" style="text-align: right">
                                    <span class="text-150 text-success-d3 opacity-2" >L {{ number_format($total *  0.15, 2, ".", ",") }}</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total
                                </div>
                                <div class="col-5" style="text-align: right">
                                    <span class="text-150 text-success-d3 opacity-2">L {{ number_format($total, 2, ".", ",") }}</span>
                                </div>
                            </div>
                            <div>
                        <span class="text-secondary-d1 text-105" style="text: size 40px;">Gracias Por Comprar En Nuestro Negocio</span>
                        @if ($venta->estado == "en_proceso")
                            <a href="{{route('ventas.pagar', $venta->id)}}" class="btn btn-success btn-bold px-4 float-right mt-3 mt-lg-0 ml-2">Pagar</a>
                        @endif
                    </div>
                        </div>
                    </div>

                    <hr />


                </div>
            </div>
        </div>
    </div>

</body>
</html>