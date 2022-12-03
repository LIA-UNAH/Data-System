<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data-system's AlekIsa</title>


    <style>
           body{

color: #484b51;

}
.cuerpo{
width: 100%;   
}
.text-secondary-d1 {
color: #728299!important;
}
.text-secondary-d3 {
text-align: center;
margin-right: 3px;
}
.text-white{
text-align: center;
}
.descripcion {
width: 60%;
text-align:left;
}
.num, .cant {
width: 5%;
text-align: left;
}
.precu {
width: 15%;
text-align: right;
}
.total{
width: 15%;
text-align: right;
}



.page-header {
margin: 0 0 1rem;
padding-bottom: 1rem;
padding-top: .5rem;
border-bottom: 1px dotted #e2e2e2;
display: -ms-flexbox;
display: flex;
-ms-flex-pack: justify;
justify-content: space-between;
-ms-flex-align: center;
align-items: center;
}
.page-title {
padding: 0;
margin: 0;
font-size: 1.75rem;
font-weight: 300;
}
.brc-default-l1 {
border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
margin-right: -.25rem!important;
}
.mb-4, .my-4 {
margin-bottom: 1.5rem!important;
}

hr {
margin-top: 1rem;
margin-bottom: 1rem;
border: 0;
border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
color: #888a8d!important;
}

.text-success-m2 {
color: #86bd68!important;
}

.font-bolder, .text-600 {
font-weight: 600!important;
}

.text-110 {
font-size: 110%!important;
}
.text-blue {
color: #478fcc!important;
}
.pb-25, .py-25 {
padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
padding-top: .75rem!important;
}
.bgc-default-tp1 {
background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
background-color: #f3f8fa!important;
}
.page-header .page-tools {
-ms-flex-item-align: end;
align-self: flex-end;
}

.btn-light {
color: #757984;
background-color: #f5f6f9;
border-color: #dddfe4;
}
.w-2 {
width: 1rem;
}

.text-120 {
font-size: 120%!important;
}
.text-primary-m1 {
color: #4087d4!important;
}

.text-danger-m1 {
color: #dd4949!important;
}
.text-blue-m2 {
color: #68a3d5!important;
}
.text-150 {
font-size: 150%!important;
}
.text-60 {
font-size: 60%!important;
}
.text-grey-m1 {
color: #7b7d81!important;
}
.align-bottom {
vertical-align: bottom!important;
}
    </style>


</head>
<body class="cuerpo" id="cuerpo">


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

                <div class="row">
                    <div class="text-grey-m2 col-sm-6">
                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            Datos del Cliente
                        </div>
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
                                Datos de la Factura
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
                            <th >Total</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        @php
                            $total=0;
                        @endphp
                        @foreach ($venta->detalle_venta as $i => $detalle )
                            <tr>
                                <td class="num">{{++$i}}</td>
                                <td class="descripcion">{{$detalle->producto->marca." ".$detalle->producto->modelo}}</td>
                                <td class="cant">{{$detalle->cantidad_detalle_venta}}</td>
                                <td class="precu">L. {{ number_format($detalle->precio_venta, 2, ".", ",") }}</td>
                                <td class="total">L. {{ number_format($detalle->precio_venta*$detalle->cantidad_detalle_venta, 2, ".", ",") }}</td>
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
                                    SubTotal:
                                </div>
                                <div class="col-5" style="text-align: right">
                                    <span class="text-150 text-success-d3 opacity-2">L. {{ number_format($total *  0.85, 2, ".", ",") }}</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Impuesto s/v. (15%):
                                </div>
                                <div class="col-5" style="text-align: right">
                                    <span class="text-150 text-success-d3 opacity-2" >L. {{ number_format($total *  0.15, 2, ".", ",") }}</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total:
                                </div>
                                <div class="col-5" style="text-align: right">
                                    <span class="text-150 text-success-d3 opacity-2">L. {{ number_format($total, 2, ".", ",") }}</span>
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