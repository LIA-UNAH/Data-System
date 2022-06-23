@extends('layouts.app')
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
                                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Nombre') }}"
                                           onkeypress="return funcionLetras(event);" style="text-transform: capitalize;">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                       placeholder="{{ __('Correo electrónico') }}" value="{{ old('email') }}" required autocomplete="email"
                                pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                                @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                         placeholder="{{ __('Contraseña') }}" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control form-control-user"
                                         placeholder="{{ __('Confirmar contraseña') }}"  required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Registro') }}
                            </button>

                            <a href="/" class="btn btn-google btn-user btn-block">
                                {{ __('Regresar') }}
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">
                                {{ __('¿Olvidó su contraseña? ') }}
                            </a>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <script>
        function funcionLetras(evt){
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code==8 || code==32) {
                return true;
            } else if(code>=65) {
                return true;
            } else{
                return false;
            }
        }
    </script>
@endsection






