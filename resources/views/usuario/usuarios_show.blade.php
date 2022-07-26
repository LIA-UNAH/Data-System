@extends('Layouts.Layouts')
@section('title', 'Usuarios')
@section('content')

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Visualizar usuario</h2>
            </div>
        </div>

        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background: #4a5568">
                <div class="col-lg-5 d-none d-lg-block" style="text-align: center; padding: 80px">
                    <img src="/images/uploads/{{ $user->image }}" width="300px" style="border-radius: 4%">
                </div>
                <div class="col-lg-7" style="padding: 50px; color: white">
                    <div class="p-5">
                        <div style="font-size: 30px; float: left; width: 45%; text-align: left;"><strong>Nombre:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: left;"> {{$user->name}} </div>
                        <div style="font-size: 25px; float: left; width: 45%; text-align: left;"><strong>Correo:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: left;">  {{$user->email}}</div>
                        <div style="font-size: 25px; float: left; width: 45%; text-align: left;"><strong>Telefóno:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: left;"> {{$user->telephone}}</div>
                        <div style="font-size: 25px; float: left; width: 45%; text-align: left;"><strong>Rol de usuario:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: left;"> {{$user->type}}</div>
                        <div style="font-size: 25px; float: left; width: 45%; text-align: left;"><strong>Dirección:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: left;"> {{$user->address}}</div>
                    </div>
                </div>
                <div class="form-group row" style="margin-top: 15px">
                    <div class="row-sm-6">
                        <a href="/usuarios" style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                           class="btn btn-google btn-user btn-block">
                            {{ __('Regresar') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
