@extends('Layouts.Layouts')
@section('content')
    <div class="card shadow mb-4 ">
        <div></div>
        <div class="card-header py-3" style="background: #0d6efd; border-radius:5px 5px 0 0;">

            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar cliente</h2>
            </div>
        </div>
        <br>
        <div class="container">
            <form method="POST" action="{{route("clientes.edit",["id"=>$user->id])}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="modal-body" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <label for="name" class="form-label">Nombre completo:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                           @if(old("name"))
                                               value="{{old("name")}}"
                                           @else
                                               value="{{$user->name}}"
                                           @endif
                                           name="name" value="{{ old('name') }}" required maxlength="70"
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="telephone" class="form-label">Teléfono:</label>
                                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                           @if(old("telephone"))
                                               value="{{old("telephone")}}"
                                           @else
                                               value="{{$user->telephone}}"
                                           @endif
                                           name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                                           onkeypress="return funcionNumeros(event);" minlength="8" maxlength="8">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-7 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="email" class="form-label">Correo electrónico:</label>
                                    <input  type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            @if(old("email"))
                                                value="{{old("email")}}"
                                            @else
                                                value="{{$user->email}}"
                                            @endif
                                            name="email" value="{{ old('email') }}" maxlength="70"
                                            required autocomplete="email" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="customer" class="form-label">Tipo de cliente:</label>
                                    <select class="form-control @error('customer') is-invalid @enderror"  id="customer"
                                            required autocomplete="customer" name="customer"
                                            autofocus>
                                        if({{$user->customer}} == "minorista"){
                                        <option value="{{$user->customer}}" style="display: none">Cliente Final</option>
                                        } else {
                                        <option value="{{$user->customer}}" style="display: none">Mayorista</option>
                                        }
                                        <option value="Mayorista">Mayorista</option>
                                        <option value="Minorista">Cliente final</option>
                                    </select>
                                    @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-5 mb-3 mb-sm-0" style="margin-top: 6px; display: none" >
                                    <label for="type" class="form-label">Rol de usuario:</label>
                                    <input type="text"
                                           class="form-control @error('type') is-invalid @enderror"
                                           id="type"
                                           name="type" value="Cliente" required
                                           autocomplete="type"
                                           autofocus readonly
                                           style="background-color: white">
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="address" class="form-label">Dirección:</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                              name="address"  required
                                              autofocus placeholder="{{ __('Dirección') }}"
                                              minlength="3" maxlength="250" rows="3"
                                    >@if(old("address")){{old("address")}}@else{{$user->address}}@endif</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label class="form-label" for="image">Imagen:</label>
                                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image"
                                           name="image" value="{{ old('image') }}" autocomplete="image"
                                           autofocus placeholder="{{ __('image') }}" onchange="mostrar()">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 6px; display: none">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                           @if(old("password"))
                                               value="{{old("password")}}"
                                           @else
                                               value="{{$user->password}}"
                                           @endif
                                           name="password" placeholder="{{ __('Contraseña') }}"
                                           autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-5 mb-sm-0" style="margin-top: 6px; display: none">
                                    <label for="confirm" class="form-label">Confirmar contraseña:</label>
                                    <div class="input-group">
                                        <input
                                            @if(old("password"))
                                                value="{{old("password")}}"
                                            @else
                                                value="{{$user->password}}"
                                            @endif
                                            id="password-confirm" name="password_confirmation" type="password"
                                            class="form-control"
                                            placeholder="{{ __('Confirmar') }}" autocomplete="new-password">
                                        <div class="input-group-append">
                                            <button id="show_password" class="btn btn-primary" style="display: inline-block; background: #2c3034; color: white; " type="button" onclick="fShowPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12 mb-3 mb-sm-0"
                                 style="display: flex; align-items: center; justify-content: center;padding: 10px">
                                <div class="col-lg-7 d-none d-lg-block">
                                    <div class="text-center">
                                        <img id="imagen" src="/images/uploads/{{ $user->image }}" class="img-fluid rounded" width="430" height="430">

                                    </div>

                                    <div class="form-group row" style="margin-top: 15px">
                                        <div class="col-sm-6">
                                            <a href="javascript:history.back()"
                                               style="display: inline-block; background: #1a202c; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                               class="btn btn-google btn-user btn-block">
                                                {{ __('Regresar') }}
                                            </a>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit"
                                                    style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                                    class="btn btn-primary btn-user btn-block">
                                                {{ __('Guardar') }}
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
    </div>

@endsection
@push('scripsss')
    <script type="text/javascript">
        function funcionLetras(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8 || code == 32) {
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
            } else if (code >= 48 && code <= 57) {
                return true;
            } else {
                return false;
            }
        }

        function fShowPassword(){
            var cambio_b = document.getElementById("password");
            var cambio_a = document.getElementById("password-confirm");

            if(cambio_a.type === "password" && cambio_b.type === "password" ){
                cambio_a.type = "text";
                cambio_b.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio_a.type = "password";
                cambio_b.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }


        function mostrar(){
            if (document.getElementById("image").files.length <= 0) return;

            var archivo = document.getElementById("image").files[0];

            if (archivo.size > 1000000) {
                const tamanioEnMb = 1000000 / 1000000;
                alert(`El tamaño máximo es ${tamanioEnMb} MB`);

                document.getElementById("image").value = "";
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
