@extends('Layouts.Layouts')
@section('title', 'Cobros')
@section('content')
<div class="card shadow mb-4 ">
        <div></div>
        <div class="card-header py-3" style="background: #0d6efd; border-radius:5px 5px 0 0;">

            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Añadir cobro</h2>
            </div>
        </div>
        <br>
        <div class="container">
            <form action="{{ route('cobro.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="nombre_cliente" class="form-label">Nombre cliente:</label>
                                    <input type="text" 
                                           id="nombre_cliente"
                                           name="nombre_cliente" value="{{ old('nombre_cliente') }}" required
                                           autocomplete="nombre_cliente"
                                           autofocus maxlength="10">
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="identidad" class="form-label">Identidad:</label>
                                    <input type="text"
                                           id="identidad"
                                           name="identidad" value="{{ old('identidad') }}" required
                                           autocomplete="identidad"
                                           autofocus maxlength="10">
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="domicilio" class="form-label">Domicilio:</label>
                                    <input type="text"
                                           id="domicilio"
                                           name="domicilio" value="{{ old('domicilio') }}" required
                                           autocomplete="domicilio"
                                           autofocus maxlength="10">
                                 
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="numTelefono" class="form-label">Numero telefono:</label>
                                    <input type="text" 
                                           id="numTelefono"
                                           name="numTelefono" value="{{ old('numTelefono') }}" required
                                           autocomplete="numTelefono"
                                           autofocus maxlength="7">
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="numTelefono" class="form-label">Estado:</label>
                                    <input type="text" 
                                           id="estado"
                                           name="estado" value="{{ old('estado') }}" required
                                           autocomplete="estado"
                                           autofocus maxlength="7">
                                </div>
                               

                                
                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="fecha" class="form-label">Fecha limite:</label>
                                    <input type="text" 
                                           id="fecha"
                                           name="fecha" value="{{ old('fecha') }}" required
                                           autocomplete="fecha"
                                           autofocus maxlength="7">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="venta" class="form-label"> Venta:</label>
                                    <input type="text" 
                                           id="venta"
                                           name="venta" value="{{ old('venta') }}" required
                                           autocomplete="venta"
                                           autofocus maxlength="7">
                                </div>


                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fecha_limiter">Fecha:</label>
                                <input type="datetime-local" 
                                       id="fecha_limiter"
                                       name="fecha_limite" value="{{Carbon\Carbon::now()->setTimezone('America/Costa_Rica')->format('Y-m-d') . 'T' . Carbon\Carbon::now()->setTimezone('America/Costa_Rica')->format('H:i')}}"
                                       required
                                       autocomplete="fecha_limiter"
                                       autofocus readonly
                                       style="background-color: white"
                                       autofocus maxlength="7">
                            </div>
                        </div>

                                    <div class="form-group row" style="margin-top: 15px">
                                        <div class="col-sm-6">
                                            <a href="/cobros"
                                               style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                               class="btn btn-google btn-user btn-block">
                                                {{ __('Regresar') }}
                                            </a>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit"
                                                    style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                                    class="btn btn-primary btn-user btn-block">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <br>
    



@endsection