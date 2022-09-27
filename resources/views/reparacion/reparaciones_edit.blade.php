@extends('Layouts.Layouts')
@section('content')
    <div class="card shadow mb-4 ">
        <div></div>
        <div class="card-header py-3" style="background: #0d6efd; border-radius:5px 5px 0 0;">

            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar reparacion</h2>
            </div>
        </div>
        <br>
        <div class="container">
            <form action="{{ route( 'reparaciones.edit', ['id'=>$reparacion->id]) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method ('put')
                <div class="modal-body" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="fecha_entrada" class="form-label">Fecha de ingreso:</label>
                                    <input type="text" class="form-control @error('fecha_entrada') is-invalid @enderror"
                                           id="fecha_entrada"
                                           name="fecha_entrada" value="{{old('fecha_salida', $reparacion->fecha_entrada)}}"
                                           required
                                           autocomplete="fecha_entrada"
                                           autofocus readonly
                                           style="background-color: white">
                                    @error('fecha_entrada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="fecha_salida" class="form-label">Fecha de entrega:</label>
                                    <input type="date"
                                           class="form-control @error('fecha_salida') is-invalid @enderror"
                                           id="fecha_salida"
                                           name="fecha_salida"
                                           value="{{old('fecha_salida', $reparacion->fecha_salida)}}"
                                           required
                                           autocomplete="fecha_salida"
                                           autofocus >
                                    @error('fecha_salida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="hora_salida" class="form-label">Hora de entrega:</label>
                                    <input type="text"
                                           class="form-control @error('hora_salida') is-invalid @enderror"
                                           id="hora_salida"
                                           name="hora_salida"
                                           value="{{old('hora_salida', $reparacion->hora_salida)}}" required
                                           autocomplete="hora_salida"
                                           autofocus minlength="8" maxlength="8" >
                                    @error('hora_salida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="costo_reparacion" class="form-label">Costo de la reparación:</label>
                                    <input type="text" class="form-control @error('fecha_entrada') is-invalid @enderror"
                                           id="costo_reparacion"
                                           name="costo_reparacion" value="{{old('costo_reparacion', $reparacion->costo_reparacion)}}"
                                           required
                                           autocomplete="costo_reparacion"
                                           autofocus >
                                    @error('costo_reparacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-3 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="marca" class="form-label">Marca:</label>
                                    <input type="text" class="form-control @error('marca') is-invalid @enderror"
                                           id="marca"
                                           name="marca" value="{{old('marca', $reparacion->marca)}}" required
                                           autocomplete="marca"
                                           autofocus minlength="2" maxlength="40">
                                    @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-3 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="modelo" class="form-label">Modelo:</label>
                                    <input type="text" class="form-control @error('modelo') is-invalid @enderror"
                                           id="modelo"
                                           name="modelo" value="{{old('modelo', $reparacion->modelo)}}" required
                                           autocomplete="modelo"
                                           autofocus minlength="0" maxlength="40">
                                    @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="cliente_id" class="form-label">Cliente:</label>
                                    <select class="form-control @error('cliente_id') is-invalid @enderror"
                                            id="cliente_id"
                                            required autocomplete="cliente_id" name="cliente_id"
                                            autofocus>
                                        <option value=""></option>
                                        @foreach ($usuarios as $usuario)
                                            <option @if ($reparacion->cliente_id == $usuario['id'])selected
                                                    @endif
                                                    value="{{$usuario['id']}}">{{$usuario['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="descripcion" class="form-label">Descripción:</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                              id="descripcion"
                                              name="descripcion" required
                                              autofocus placeholder=""
                                              minlength="5" maxlength="255" rows="3">@if(old("descripcion")){{old("descripcion")}}@else{{$reparacion->descripcion}}@endif</textarea>
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row" style="margin-top: 15px; text-align: center">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="javascript:history.back()"
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

                <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
            </form>
        </div>
        <br>
    </div>
@endsection
@push('scripsss')
    <script>
        function funcionLempiras(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 46) {
                return true;
            } else if (code >= 48 && code <= 57) {
                return true;
            } else {
                return false;
            }
        }

        function mostrar() {
            if (document.getElementById("imagen_producto").files.length <= 0) return;

            var archivo = document.getElementById("imagen_producto").files[0];

            if (archivo.size > 1000000) {
                const tamanioEnMb = 1000000 / 1000000;
                alert(`El tamaño máximo es ${tamanioEnMb} MB`);

                document.getElementById("imagen_producto").value = "";
            } else {

                var reader = new FileReader();
                if (archivo) {
                    reader.readAsDataURL(archivo);
                    reader.onloadend = function () {
                        document.getElementById("imagen").src = reader.result;
                    }
                }
            }
        }
    </script>
@endpush
