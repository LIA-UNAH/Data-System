@extends('Layouts.Layouts')
@section('content')
<link href={{ asset("css/target.css") }} rel="stylesheet" type="text/css">
    <div class="container py-1">
        <!-- Carta -->
        <div class="card">
            <div class=" text-center" style="font-size: 2em; background-color: #0c63e4; color: white"><strong>DETALLES DEL PEDIDO</strong></div>
            <div class="row ">
                <div class="col-lg-8" style="background: whitesmoke; color: white; font-family: 'Nunito', sans-serif; font-size: small; text-align: justify"> <div class="p-4">
                    <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Cliente:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-transform: uppercase;">{{$pedido->nombre_Cliente}}</div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Telefono del cliente:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none; text-transform:uppercase">{{$pedido->telefon_Cliente}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Ciudad:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none; text-transform:uppercase">{{$pedido->ciudad}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Fecha de orden:</strong></div>
                        <div
                              style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$pedido->fecha_de_orden}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                             <strong>Estado pedido:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$pedido->estado_Pedido}} </div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                             <strong>Detalle pedido:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$pedido->detalle_Pedido}}</div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Total pedido:</strong><br> <br></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$pedido->total_Pedido}}</div>
                        <br>
                    </div>
                </div>
              </div>
            </div>
                 <div class="text-center">
                          <br>
                               <a href="{{ route('pedido.edit', ['id' => $pedido->id]) }}"
                                  style=" width: 130px; display: inline-block; background: #0d6efd; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                    class="btn btn-google btn-user">Editar</a>

                               <a href="/pedidos" style="width: 130px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                 class="btn btn-google btn-user">Volver</a>
                               <br>
                             <br>                  
                  </div>    
           <!-- End of card -->
 </div>       
@endsection