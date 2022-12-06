@extends('Layouts.Layouts')
@section('title', 'Reparaciones')
@section('content')
    <link href={{ asset("css/target.css") }} rel="stylesheet" type="text/css">
    <div class="container py-1">
        <!-- Carta -->
        <div class="card">
            <div class=" text-center" style="font-size: 2em; background-color: #0c63e4; color: white"><strong>DETALLES DE LA REPARACIÓN</strong></div>
            <div class="row ">
                <div class="col-lg-8" style="background: whitesmoke; color: white; font-family: 'Nunito', sans-serif; font-size: small; text-align: justify">
                    <div class="p-5">
                        <h5 class="m-b-20 p-b-5 b-b-default f-w-600" style="color: #1a202c; font-size: large"><strong>{{$reparacion->cliente->name}}</strong></h5>
                        <hr style="color: #1a202c; font-family: 'Nunito', sans-serif; font-size: large">
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Teléfono: </strong>{{$reparacion->cliente->telephone}}</h6>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Dispositivo: </strong>{{$reparacion->marca}} {{$reparacion->modelo}}</h6>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Fecha de entrega: </strong>{{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('DD') }} de
                                    {{ \Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat('MMMM') }} a las {{$reparacion->hora_salida}}</h6>
                            </div>

                            <div class="col-sm-12"style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Costo: </strong>L {{ number_format($reparacion->costo_reparacion, 2, '.', ',') }}</h6>
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <h6  style="color: #1a202c; font-size: large"><strong>Descripción: </strong>{{$reparacion->descripcion}}</h6>
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
                        <a href="{{route("reparaciones.edit",["id"=>$reparacion->id])}}" style=" width: 130px; display: inline-block; background: #0d6efd; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Editar') }}
                        </a>
                        <a href="/reparaciones" style="width: 130px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Regresar') }}
                        </a>

                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-envelope"></i></button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Cliente:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Mensaje:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                                        <button type="button" class="btn btn-primary">enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Carta -->
    </div>

@endsection
