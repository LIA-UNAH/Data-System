@extends('Layouts.Layouts')
@section('content')
    <link href="/verproducto.css" rel="stylesheet" type="text/css"/>

    <div class="container py-1">
        <!-- Carta -->
        <div class="card">
            <div class=" text-center" style="font-size: 2em; background-color: #0c63e4; color: white"><strong>DETALLES DEL PROVEEDOR</strong></div>
            <div class="row ">
                <div class="col-lg-8" style="background: whitesmoke; color: white; font-family: 'Nunito', sans-serif; font-size: small; text-align: justify">
                    <div class="p-5">
                        <h5 class="m-b-20 p-b-5 b-b-default f-w-600" style="color: #1a202c; font-size: large"><strong>{{$proveedor->nombre_proveedor}}</strong></h5>
                        <hr style="color: #1a202c; font-family: 'Nunito', sans-serif; font-size: large">
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>RTN: </strong>{{$proveedor->rtn_proveedor}}</h6>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Nombre de encargado: </strong>{{$proveedor->contacto_proveedor}}</h6>
                            </div>

                            <div class="col-sm-12"style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Telefóno (encargado): </strong>{{$proveedor->telefono_contacto_proveedor}}</h6>
                            </div>

                            <div class="col-sm-12"style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Telefóno (empresa): </strong>{{$proveedor->telefono_proveedor}}</h6>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Dirección: </strong>{{$proveedor->direccion_proveedor}}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 text-center" style="padding-bottom: 10px">
                    <div>
                        <img src="/images/resources/bg_proveedor.jpg" width="290px" height="290px"
                             style="border-radius: 10%; padding: 15px">
                    </div>

                    <div class="text-center">
                        <a href="{{route("proveedor.edit",["id"=>$proveedor->id])}}" style=" width: 130px; display: inline-block; background: #0d6efd; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Editar') }}
                        </a>
                        <a href="/proveedor" style="width: 130px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Regresar') }}
                        </a>
                    </div>

                </div>



            </div>
        </div>
        <!-- Carta -->
    </div>

@endsection
