@extends('Layouts.Layouts')
@section('title', 'Categorias')
@section('content')
    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar categoria</h2>
            </div>
        </div>

        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background: whitesmoke">
                <div class="col-lg-12">
                    <div class="p-5" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                        <form method="POST" action="{{route("categorias.edit",["id"=>$categoria->id])}}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="name">Empresa:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                           @if(old("name"))
                                               value="{{old("name")}}"
                                           @else
                                               value="{{$categoria->name}}"
                                           @endif
                                           name="name" value="{{ old('name') }}" required maxlength="20"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="status" class="form-label">Estado:</label>
                                    <select class="form-control @error('status') is-invalid @enderror"  id="status"
                                            required autocomplete="status" name="status"
                                            autofocus>
                                        @if($categoria->status == 1)
                                            <option value="{{$categoria->status}}" style="display: none">Activo</option>
                                        @endif

                                        @if($categoria->status == 0)
                                            <option value="{{$categoria->status}}" style="display: none">Inactivo</option>
                                        @endif
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-0">
                                <label class="form-label" for="direccion_proveedor">Dirección de la empresa:</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                          name="description"  required
                                          autofocus placeholder="{{ __('Descripción') }}"
                                          minlength="3" maxlength="255" rows="3"
                                >@if(old("description")){{old("description")}}@else{{$categoria->description}}@endif</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row" style="margin-top: 15px">
                                <div class="col-sm-6">
                                    <a href="/categorias" style="display: inline-block; background: #2c3034; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
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
