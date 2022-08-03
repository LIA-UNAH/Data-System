@extends('layouts.app')
@section('title', 'Registro')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crear una cuenta!</h1>
                            </div>
                            <form method="POST" class="user" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                               name="name" value="{{ old('name') }}" required autocomplete="name"
                                               autofocus placeholder="{{ __('Nombre') }}"
                                               onkeypress="return funcionLetras(event);"
                                               style="text-transform: capitalize;">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input  type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="{{ __('Correo electrónico') }}" value="{{ old('email') }}"
                                            required autocomplete="email" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                               name="password" placeholder="{{ __('Contraseña') }}" required
                                               autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-5">
                                        <input id="password-confirm" name="password_confirmation" type="password"
                                               class="form-control"
                                               placeholder="{{ __('Confirmar') }}" required autocomplete="new-password">
                                    </div>
                                    <div class="col-sm-1">
                                        <span id="imgContrasena" data-activo=false><img  style="width: 25px; height: 25px;" src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" class="icon"></span>
                                    </div>
                                    <div class="col-sm-1">

                                    </div>
                                </div>

                                <div class="mb-0">
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                          name="address"  required
                                          autofocus placeholder="{{ __('Dirección') }}"
                                          minlength="3" maxlength="250" rows="3">{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group row" style="margin-top: 15px">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                               name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                                               autofocus placeholder="{{ __('Teléfono') }}"
                                               onkeypress="return funcionNumeros(event);" minlength="8" maxlength="8">
                                        @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="margin-top: 15px; display: none">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                                               name="type" value="cliente" required autocomplete="type"
                                               autofocus>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" style="display: inline-block;"
                                            class="btn btn-primary btn-user btn-block">
                                        {{ __('Registrar') }}
                                    </button>

                                    <a href="/" style="display: inline-block;"
                                       class="btn btn-google btn-user btn-block">
                                        {{ __('Regresar') }}
                                    </a>
                                </div>

                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" style="color: #78261f; margin-right: 15px"
                                   href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a> |
                                <a class="small" style="color: #1a202c; margin-left: 15px" href="{{ route('login') }}">Ya
                                    tienes cuenta ¡Inicia sesión!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
@endsection

@push('scripsss')
<script>
    $("#imgContrasena").click(function () {

    var control = $(this);
    var estatus = control.data('activo');

    var image = control.find('img');
        if (estatus == false) {

            control.data('activo', true);
            $(image).attr('src', 'https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-10-256.png');
            $("#password").attr('type', 'text');
            $("#password-confirm").attr('type', 'text');


        }
        else {

            control.data('activo', false);
            $(image).attr('src', 'https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png');
            $("#password").attr('type', 'password');
            $("#password-confirm").attr('type', 'password');
        }
    });
</script>
@endpush






