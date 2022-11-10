@extends('Layouts.Layouts')
@section('content')

    @include('layouts.flash-message')

 <!-- CSS Fontawesome -->
 <link href={{ asset("admin/fontawesome/css/all.min.css") }} rel="stylesheet" type="text/css">

<!-- Google Fonts -->
<link href={{ asset("css/fonts.css") }} rel="stylesheet" type="text/css">

<!-- CSS de Mejoras visuales -->
<link href={{ asset("css/card.css") }} rel="stylesheet" type="text/css">

<!-- CSS SB Admin -->
<link href={{ asset("admin/css/sb-admin-2.min.css") }} rel="stylesheet" type="text/css">

<!-- CSS Bootstrap 5.2 -->
<link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet" type="text/css">

<!-- CSS Factura -->
<link href={{ asset("css/factura.css") }} rel="stylesheet" type="text/css">

{{-- AlpineJS --}}
<script defer src={{ asset("js/alpinejs/alpinejs.min.js") }}></script>

@livewireStyles

    

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Factura
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: {{$venta->numero_factura_venta}}
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">

            
                <a href="/ventas" class="  btn bg-white btn-light mx-1px text-95" style=" ; color: red"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                Cerrar
                </a>

                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="  mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Imprimir
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="{{route('ventas.pdf', ['id' =>$venta->id])}}" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Guardar
                </a>
                
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row-reverse">
                    <div class="col">
                        <div class="text-right text-150">
                            <span class="text-default-d3">Estado:</span>
                            @if ($venta->estado == "en_proceso")
                                <p class="badge bg-primary">En Proceso</p>
                            @else
                                <p class="badge bg-success">Pagado</p>
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
                
                <!--Datos del Cliente-->
                <div class="row">
                    <div class="text-start col-sm-6 t">
                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125" style="color:gray">
                            <strong>Datos del Cliente</strong>
                        </div>

                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nombre del Cliente:</span>
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
                               <strong>Datos de la Factura</strong>
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
                            <th class="opacity-2">#Num</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        @php
                            $total=0;
                        @endphp
                        @foreach ($venta->detalle_venta as $i => $detalle )
                            <tr>
                                <td class="num" >{{++$i}}</td>
                                <td class="descripcion">{{$detalle->producto->marca." ".$detalle->producto->modelo}}</td>
                                <td class="cant">{{$detalle->cantidad_detalle_venta}}</td>
                                <td class="precu">L {{ number_format($detalle->precio_venta, 2, ".", ",") }}</td>
                                <td  class="total" >L {{ number_format($detalle->precio_venta*$detalle->cantidad_detalle_venta, 2, ".", ",") }}</td>
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
                        @if ($venta->estado == "en_proceso")
                            <a href="{{route('ventas.pagar', $venta->id)}}" class="btn btn-success btn-bold px-4 float-right mt-3 mt-lg-0 ml-2">Pagar</a>
                        @endif                            
                       
                    </div>
                        </div>
                    </div>
                    <span class="text-secondary-d1 text-105" style="text: size 40px;">Gracias Por Comprar En Nuestro Negocio</span>
                    
                </div>
            </div>
        </div>
    </div>
@endsection








