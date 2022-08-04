@extends('Layouts.Layouts')
@section('title', 'Usuarios')
@section('content')

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Visualizar {{$user->type}}</h2>
            </div>
        </div>

        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background: #4a5568">
                <div class="col-lg-7" style="background: #1a202c; color: white; font-family: monospace">
                    <div class="p-5">
                        <h2 style="text-align: center; background: #4a5568">{{$user->name}}</h2>
                        <br>
                        <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información principal</h5>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="m-b-10 f-w-600" style="color: #0d6efd">Correo electrónico:</h6>
                                <h6  style="color: white; font-family:monospace;">{{$user->email}}</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="m-b-10 f-w-600" style="color: #0d6efd">Telefóno:</h6>
                                <h6  style="color: white; font-family:monospace;">{{$user->telephone}}</h6>
                            </div>
                        </div>

                        <br>
                        <h5 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Información adicional</h5>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h6 class="m-b-10 f-w-600" style="color: #0d6efd">Dirección:</h6>
                                <h6  style="color: white; font-family:monospace; text-align: justify">{{$user->address}}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 d-none d-lg-block" style="text-align: center; padding-top: 10px">
                    <img src="/images/uploads/{{ $user->image }}" class="img-fluid" >

                    <div class="col-sm-12 col-xs-12" style="text-align: center; margin-top: 15px; margin-bottom: 15px">
                        <a href="{{route("usuarios.edit",["id"=>$user->id])}}" style="margin-right: 4px; width: 145px; display: inline-block; background: #0f6848; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Editar') }}
                        </a>
                        <a href="/usuarios" style="margin-left: 4px; width: 145px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                           class="btn btn-google btn-user ">
                            {{ __('Regresar') }}
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
