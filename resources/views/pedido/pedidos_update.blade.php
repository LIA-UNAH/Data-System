@extends('Layouts.Layouts')

@section('content')
<div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar pedido</h2>
            </div>
        </div>

        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background: whitesmoke">
                <div class="col-lg-12">
                    <div class="p-5" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                        <form method="POST" action="{{route("pedido.edit",["id"=>$pedido->id])}}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="nombre_Cliente">Nombre del cliente:</label>
                                    <input type="text" class="form-control @error('nombre_Cliente') is-invalid @enderror" id="nombre_Cliente"
                                           @if(old("nombre_Cliente"))
                                               value="{{old("nombre_Cliente")}}"
                                           @else
                                               value="{{$pedido->nombre_Cliente}}"
                                           @endif
                                           name="nombre_Cliente" value="{{ old('nombre_Cliente') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('nombre_Cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="telefon_Cliente">Telefono del cliente:</label>
                                    <input type="tel" class="form-control @error('telefon_Cliente') is-invalid @enderror" id="telefon_Cliente"
                                           @if(old("telefon_Cliente"))
                                               value="{{old("telefon_Cliente")}}"
                                           @else
                                               value="{{$pedido->telefon_Cliente}}"
                                           @endif
                                           name="telefon_Cliente" value="{{ old('telefon_Cliente') }}" required autocomplete="telefon_Cliente"
                                           onkeypress="return funcionNumeros(event);" minlength="12" maxlength="12">
                                    @error('telefon_Clienter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="ciudad">Ciudad:</label>
                                    <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad"
                                           @if(old("ciudad"))
                                               value="{{old("ciudad")}}"
                                           @else
                                               value="{{$pedido->ciudad}}"
                                           @endif
                                           name="ciudad" value="{{ old('ciudad') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="fecha_de_orden">Fecha del Orden:</label>
                                    <input type="tel" class="form-control @error('fecha_de_orden') is-invalid @enderror" id="fecha_de_orden"
                                           @if(old("fecha_de_orden"))
                                               value="{{old("fecha_de_orden")}}"
                                           @else
                                               value="{{$pedido->fecha_de_orden}}"
                                           @endif
                                           name="fecha_de_orden" value="{{ old('fecha_de_orden') }}" required autocomplete="fecha_de_orden"
                                           onkeypress="return funcionLetras(event);"
                                    @error('fecha_de_orden')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                              <br>
                            </div>

                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="estado_Pedido">Estado del pedido:</label>
                                    <input type="text" class="form-control @error('estado_Pedido') is-invalid @enderror" id="estado_Pedido"
                                           @if(old("estado_Pedido"))
                                               value="{{old("estado_Pedido")}}"
                                           @else
                                               value="{{$pedido->estado_Pedido}}"
                                           @endif
                                           name="estado_Pedido" value="{{ old('estado_Pedido') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('estado_Pedido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div>
                                  <br>
                                </div>

                            <div class="mb-0">
                                <label class="form-label" for="detalle_Pedido">Detalle del pedido:</label>
                                <textarea class="form-control @error('detalle_Pedido') is-invalid @enderror" id="detalle_Pedido"
                                          name="detalle_Pedido"  required
                                          autofocus placeholder="{{ __('Detalle') }}"
                                          minlength="3" maxlength="250" rows="3"
                                >@if(old("detalle_Pedido")){{old("detalle_Pedido")}}@else{{$pedido->detalle_Pedido}}@endif</textarea>
                                @error('detalle_Pedido')
                             
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                              <br>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="total_Pedido">Total del pedido:</label>
                                    <input type="text" class="form-control @error('total_Pedido') is-invalid @enderror" id="total_Pedido"
                                           @if(old("total_Pedido"))
                                               value="{{old("total_Pedido")}}"
                                           @else
                                               value="{{$pedido->total_Pedido}}"
                                           @endif
                                           name="total_Pedido" value="{{ old('total_Pedido') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('total_Pedido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            <div class="form-group row" style="margin-top: 15px">
                                <div class="col-sm-6">
                                    <a href="/pedidos" style="display: inline-block; background: #2c3034; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                       class="btn btn-google btn-user btn-block">
                                        {{ __('Regresar') }}
                                    </a>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button type="submit" style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                            class="btn btn-primary btn-user btn-block">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripsss')
    <script type="text/javascript">
        function funcionLetras(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8 || code == 32 || code == 46) {
                return true;
            } else if (code >= 65) {
                return true;
            } else {
                return false;
            }
        }

        function funcionNumeros(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) {
                return true;
            } else if (code == 45) {
                return true;
            } else if (code >= 48 && code <= 57) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endpush
