@extends('Layouts.Layouts')
@section('title', 'Proveedores')
@section('content')
    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar proveedor</h2>
            </div>
        </div>

        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background: whitesmoke">
                <div class="col-lg-12">
                    <div class="p-5" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                        <form method="POST" action="{{route("proveedor.edit",["id"=>$proveedor->id])}}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="nombre_proveedor">Empresa:</label>
                                    <input type="text" class="form-control @error('nombre_proveedor') is-invalid @enderror" id="nombre_proveedor"
                                           @if(old("nombre_proveedor"))
                                               value="{{old("nombre_proveedor")}}"
                                           @else
                                               value="{{$proveedor->nombre_proveedor}}"
                                           @endif
                                           name="nombre_proveedor" value="{{ old('nombre_proveedor') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('nombre_proveedor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="telefono_proveedor">Teléfono de la Empresa :</label>
                                    <input type="tel" class="form-control @error('telefono_proveedor') is-invalid @enderror" id="telefono_proveedor"
                                           @if(old("telefono_proveedor"))
                                               value="{{old("telefono_proveedor")}}"
                                           @else
                                               value="{{$proveedor->telefono_proveedor}}"
                                           @endif
                                           name="telefono_proveedor" value="{{ old('telefono_proveedor') }}" required autocomplete="telefono_proveedor"
                                           onkeypress="return funcionNumeros(event);" minlength="8" maxlength="8">
                                    @error('telefono_proveedor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="rtn_proveedor">RTN:</label>
                                    <input type="tel" class="form-control @error('rtn_proveedor') is-invalid @enderror" id="rtn_proveedor"
                                           @if(old("rtn_proveedor"))
                                               value="{{old("rtn_proveedor")}}"
                                           @else
                                               value="{{$proveedor->rtn_proveedor}}"
                                           @endif
                                           pattern="^[0-9]{4}-[0-9]{4}-[0-9]{6}$" placeholder="####-####-######"
                                           name="rtn_proveedor" value="{{ old('rtn_proveedor') }}" required autocomplete="rtn_proveedor"
                                           onkeypress="return funcionNumeros(event);" minlength="16" maxlength="16">
                                    @error('rtn_proveedor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="contacto_proveedor">Nombre del encargado:</label>
                                    <input type="text" class="form-control @error('contacto_proveedor') is-invalid @enderror" id="contacto_proveedor"
                                           @if(old("contacto_proveedor"))
                                               value="{{old("contacto_proveedor")}}"
                                           @else
                                               value="{{$proveedor->contacto_proveedor}}"
                                           @endif
                                           name="contacto_proveedor" value="{{ old('contacto_proveedor') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('contacto_proveedor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label" for="telefono_contacto_proveedor">Teléfono del encargado:</label>
                                    <input type="tel" class="form-control @error('telefono_contacto_proveedor') is-invalid @enderror" id="telefono_contacto_proveedor"
                                           @if(old("telefono_contacto_proveedor"))
                                               value="{{old("telefono_contacto_proveedor")}}"
                                           @else
                                               value="{{$proveedor->telefono_contacto_proveedor}}"
                                           @endif
                                           name="telefono_contacto_proveedor" value="{{ old('telefono_contacto_proveedor') }}" required autocomplete="telefono_contacto_proveedor"
                                           onkeypress="return funcionNumeros(event);" minlength="8" maxlength="8">
                                    @error('telefono_contacto_proveedor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label" for="direccion_proveedor">Dirección de la empresa:</label>
                                <textarea class="form-control @error('direccion_proveedor') is-invalid @enderror" id="direccion_proveedor"
                                          name="direccion_proveedor"  required
                                          autofocus placeholder="{{ __('Dirección') }}"
                                          minlength="3" maxlength="250" rows="3"
                                >@if(old("direccion_proveedor")){{old("direccion_proveedor")}}@else{{$proveedor->direccion_proveedor}}@endif</textarea>
                                @error('direccion_proveedor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row" style="margin-top: 15px">
                                <div class="col-sm-6">
                                    <a href="/proveedor" style="display: inline-block; background: #2c3034; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
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
            const tecla = event.key;
                    const regex = /^[a-zA-Z]+$/;

                    if (!regex.test(tecla)) {
                        event.preventDefault();
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
