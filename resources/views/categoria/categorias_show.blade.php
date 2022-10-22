@extends('Layouts.Layouts')
@section('content')
    <link href={{ asset("css/target.css") }} rel="stylesheet" type="text/css">
    <div class="container py-1">
        <!-- Carta -->
        <div class="card">
            <div class=" text-center" style="font-size: 2em; background-color: #0c63e4; color: white"><strong>DETALLES DE LA CATEGORIA</strong></div>
            <div class="row ">
                <div class="col-lg-8" style="background: whitesmoke; color: white; font-family: 'Nunito', sans-serif; font-size: small; text-align: justify">
                    <div class="p-5">
                        <h5 class="m-b-20 p-b-5 b-b-default f-w-600" style="color: #1a202c; font-size: large"><strong>Datos generales</strong></h5>
                        <hr style="color: #1a202c; font-family: 'Nunito', sans-serif; font-size: large">
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Categoria: </strong>{{$categoria->name}}</h6>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">

                                @if( $categoria->status == 0)
                                    <h6 style="color: #1a202c; font-size: large"><strong style="color: #1a202c">Estado: </strong> Inactivo</h6>
                                @endif
                                @if( $categoria->status == 1)
                                    <h6 style="color: #1a202c; font-size: large"><strong style="color: #1a202c">Estado: </strong> Activo</h6>
                                @endif

                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Descripción: </strong>{{$categoria->description}}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 text-center" style="padding-bottom: 10px">
                    <div>
                        <img src="/images/resources/bg_categoria.jpg" width="290px" height="290px"
                             style="border-radius: 10%; padding: 15px">
                    </div>

                    <div class="text-center">
                        <a href="{{route("categorias.edit",["id"=>$categoria->id])}}" style=" width: 130px; display: inline-block; background: #0d6efd; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Editar') }}
                        </a>
                        <a href="/categorias" style="width: 130px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
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
