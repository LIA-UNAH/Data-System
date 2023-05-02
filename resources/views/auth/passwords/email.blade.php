@extends('layouts.app')
@section('title', 'Reestablecer contraseña')
@section('content')
    <style>
        .custom-progress-bar {
            transition: width 0.5s ease-in-out;
        }

        #loading-message {
            text-align: center;
            margin-top: 10px;
        }

        #confirmation-message {
            text-align: center;
            margin-top: 10px;
            display: none; /* Ocultar inicialmente */
        }
    </style>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <img class="col-lg-6 d-none d-lg-block" src="/images/resources/bg_password_reset.jpg">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reestablecer contraseña</h1>
                                        <p class="mb-4">¡Que las cosas suceden; sólo tienes que introducir tu dirección de correo electrónico a continuación y te enviaremos un enlace para restablecer tu contraseña!</p>
                                    </div>
                                    <form id="reset-form" method="POST" class="user" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? '' }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
                                            @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button id="submit-button" type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Enviar enlace') }}
                                        </button>

                                        <div id="confirmation-message" class="text-center d-none">
                                            <p>¡Se ha enviado un enlace para restablecer tu contraseña a tu dirección de correo electrónico!</p>
                                        </div>

                                    </form>
                                    <hr>
                                    <div id="loading-bar" class="progress d-none">
                                        <div class="progress-bar custom-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <p id="loading-message" class="d-none">Cargando...</p>

                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Inicia de sesión!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('loading-bar').classList.remove('d-none');
            document.getElementById('loading-message').classList.remove('d-none');
            simulateProgress();
        });

        function simulateProgress() {
            var progress = 0;
            var progressBar = document.querySelector(".custom-progress-bar");

            var interval = setInterval(function() {
                progress += 20;
                progressBar.style.width = progress + "%";
                progressBar.setAttribute("aria-valuenow", progress);

                if (progress >= 100) {
                    clearInterval(interval);
                    document.getElementById('loading-message').classList.add('d-none');
                    document.getElementById('confirmation-message').classList.remove('d-none');

                }
            }, 500);
        }
    </script>
@endsection
