@extends('layouts.app')
@section('title', 'Registro')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <img class="col-lg-6 d-none d-lg-block" src="/images/resources/bg_register.jpg">
                    <div class="col-lg-6">
                        <div class="p-5" >
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar cuenta</h1>
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
                                    <div class="col-sm-5 mb-3 mb-sm-0" style="margin-right: -10px">
                                        <input id="password-confirm" name="password_confirmation" type="password"
                                               class="form-control"
                                               placeholder="{{ __('Confirmar') }}" required autocomplete="new-password">
                                    </div>
                                    <div class="col-sm-1" style="margin-right: -8px">
                                        <button id="show_password" class="btn btn-primary" style="display: inline-block; background: #1a202c; color: white; " type="button" onclick="fShowPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
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
                                               onkeypress="return funcionNumeros(event);"
                                               minlength="8" maxlength="8">
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

                                <div class="form-group row" style="margin-top: 15px">
                                    <div class="col-sm-6">
                                        <a href="/login" style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                           class="btn btn-google btn-user btn-block">
                                            {{ __('Regresar') }}
                                        </a>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <button type="submit" style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                                class="btn btn-primary btn-user btn-block">
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
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
        $("#show_password").click(function () {

            var control = $(this);
            var estatus = control.data('activo');

            var image = control.find('img');
            if (estatus == false) {

                control.data('activo', true);
                $("#password").attr('type', 'text');
                $("#password-confirm").attr('type', 'text');


            }
            else {

                control.data('activo', false);
                $("#password").attr('type', 'password');
                $("#password-confirm").attr('type', 'password');
            }
        });
    </script>
@endpush






