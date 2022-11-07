@extends('Layouts.Layouts')
@section('content')
<link href={{ asset("css/target.css") }} rel="stylesheet" type="text/css">
    <div class="container py-1">
        <!-- Carta -->
        <div class="card">
            <div class=" text-center" style="font-size: 2em; background-color: #0c63e4; color: white"><strong>DETALLES DEL COBRO</strong></div>
            <div class="row ">
                <div class="col-lg-8" style="background: whitesmoke; color: white; font-family: 'Nunito', sans-serif; font-size: small; text-align: justify"> <div class="p-4">
                    <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Cliente:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-transform: uppercase;">{{$cobro->nombre_cliente}}</div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Identidad:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none; text-transform:uppercase">{{$cobro->identidad}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                           <strong>Numero de telefono:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none; text-transform:uppercase">{{$cobro->numTelefono}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                        <strong>Estado:</strong></div>
                        <div
                              style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$cobro->estado}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                             <strong>Fecha:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$cobro->fecha}}</div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Fecha limite:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$cobro->fecha_limite}}</div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Venta:</strong><br> <br></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">{{$cobro->venta}}</div>
                        <br>
                    </div>
                </div>                       
                </div>
            </div>
                        <div class="text-center">
                              <br>
                                  <a href="/cobros" style="width: 130px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                      class="btn btn-google btn-user">Volver</a>
                                  <br>
                            <br>                  
                       </div>
           <!-- End of card -->
 </div>
@endsection