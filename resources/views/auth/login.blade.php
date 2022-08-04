@extends('layouts.app')
@section('title', 'Iniciar sesión')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <img class="col-lg-6 d-none d-lg-block" src="/images/resources/bg_login.jpg">

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Iniciar sesión</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <div class="input-group-append">
                                                <button id="show_password" class="btn btn-primary" style="display: inline-block; background: #1a202c; color: white; " type="button" onclick="fShowPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                                style="display: inline-block; background: #1a202c; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"> Ingresar </button>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordar datos') }}
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidó Su Contraseña? ') }}
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">¡Crear una Cuenta! </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripsss')

    <script type="text/javascript">
        function fShowPassword(){
            var cambio = document.getElementById("password");
            if(cambio.type === "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>

@endpush




