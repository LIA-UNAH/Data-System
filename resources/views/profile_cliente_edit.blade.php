<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DataSystem's AlekIsa</title>

    <!-- CSS Fontawesome -->
    <link href={{ asset("admin/fontawesome/css/all.min.css") }} rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href={{ asset("css/fonts.css") }} rel="stylesheet" type="text/css">

    <!-- CSS de Mejoras visuales -->
    <link href={{ asset("css/ed-grid.css") }} rel="stylesheet" type="text/css">

    <!-- CSS SB Admin -->
    <link href={{ asset("admin/css/sb-admin-2.min.css") }} rel="stylesheet" type="text/css">

    <!-- CSS Bootstrap 5.2 -->
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet" type="text/css">

    {{-- AlpineJS --}}
    <script defer src={{ asset("js/alpinejs/alpinejs.min.js") }}></script>
    <style>
        select.form-control.form-control-line {
            -webkit-appearance: auto;
            -moz-appearance: auto;
        }

        /*Material inputs*/
        .form-material .form-group {
            overflow: hidden;
        }

        .form-material .form-control {
            background-color: rgba(0, 0, 0, 0);
            background-position: center bottom, center calc(100% - 1px);
            background-repeat: no-repeat;
            background-size: 0 2px, 100% 1px;
            padding: 0;
            -webkit-transition: background 0s ease-out 0s;
            transition: background 0s ease-out 0s;
        }

        .form-material .form-control,
        .form-material .form-control.focus,
        .form-material .form-control:focus {
            background-image: -webkit-gradient(linear, left top, left bottom, from(#398bf7), to(#398bf7)), -webkit-gradient(linear, left top, left bottom, from(#e9edf2), to(#e9edf2));
            background-image: linear-gradient(#398bf7, #398bf7), linear-gradient(#e9edf2, #e9edf2);
            border: 0 none;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            float: none;
        }

        .form-material .form-control.focus,
        .form-material .form-control:focus {
            background-size: 100% 2px, 100% 1px;
            outline: 0 none;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .form-control-line .form-group {
            overflow: hidden;
        }

        .form-control-line .form-control {
            border: 0px;
            border-radius: 0px;
            padding-left: 0px;
            border-bottom: 1px solid #f6f9ff;
        }

        .form-control-line .form-control:focus {
            border-bottom: 1px solid #398bf7;
        }
    </style>
    @livewireStyles
</head>

<body id="page-top">
@livewireScripts

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content" style="background: whitesmoke">
            <!-- Topbar -->
            <nav class="navbar navbar-expand topbar mb-4 static-top shadow"
                 style="background: #1a202c; color:whitesmoke;">
                <!-- End of Sidebar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw" style="color: whitesmoke"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Centro de notificaciones
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white" style="color: whitesmoke"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw" style="color: whitesmoke"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src=""
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.
                                    </div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="/admin/img/undraw_profile_2.svg"
                                         alt="...">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?
                                    </div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="/admin/img/undraw_profile_3.svg"
                                         alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!
                                    </div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src=""
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...
                                    </div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                                  style="color: white">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="/images/uploads/{{ Auth::user()->image }}"
                                 alt="Profile">

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/profile_cliente">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Configuración
                            </a>
                            <a class="dropdown-item" href="/info">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Información
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div id="contaire" style="overflow-y: auto; height: calc(70vh);">
                    <div class="card shadow mb-4">
                        <div class="container">
                            <form method="POST" action="{{route("usuarios.edit_profile_cliente",["id"=>$user->id])}}"
                                  enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="modal-body"
                                     style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <div class="col-sm-7 mb-3 mb-sm-0">
                                                    <label for="name" class="form-label">Nombre completo:</label>
                                                    <input type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           id="name"
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
                                                    <input type="tel"
                                                           class="form-control @error('telephone') is-invalid @enderror"
                                                           id="telephone"
                                                           @if(old("telephone"))
                                                               value="{{old("telephone")}}"
                                                           @else
                                                               value="{{$user->telephone}}"
                                                           @endif
                                                           name="telephone" value="{{ old('telephone') }}" required
                                                           autocomplete="telephone"
                                                           onkeypress="return funcionNumeros(event);" minlength="8"
                                                           maxlength="8">
                                                    @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-7 mb-3 mb-sm-0" style="margin-top: 6px">
                                                    <label for="email" class="form-label">Correo electrónico:</label>
                                                    <input type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email"
                                                           @if(old("email"))
                                                               value="{{old("email")}}"
                                                           @else
                                                               value="{{$user->email}}"
                                                           @endif
                                                           name="email" value="{{ old('email') }}" maxlength="70"
                                                           required autocomplete="email"
                                                           pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-5 mb-3 mb-sm-0" style="margin-top: 6px">
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
                                                    <textarea
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address"
                                                        name="address" required
                                                        autofocus placeholder="{{ __('Dirección') }}"
                                                        minlength="3" maxlength="250" rows="3">@if(old("address")){{old("address")}}@else{{$user->address}}@endif</textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 6px">
                                                    <label class="form-label" for="image">Imagen:</label>
                                                    <input type="file" accept="image/*"
                                                           class="form-control @error('image') is-invalid @enderror"
                                                           id="image"
                                                           name="image" value="{{ old('image') }}" autocomplete="image"
                                                           autofocus placeholder="{{ __('image') }}"
                                                           onchange="mostrar()">
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0"
                                                     style="margin-top: 6px; display: none">
                                                    <label for="password" class="form-label">Contraseña:</label>
                                                    <input type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           id="password"
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

                                                <div class="col-sm-6 mb-5 mb-sm-0"
                                                     style="margin-top: 6px; display: none">
                                                    <label for="confirm" class="form-label">Confirmar
                                                        contraseña:</label>
                                                    <div class="input-group">
                                                        <input
                                                            @if(old("password"))
                                                                value="{{old("password")}}"
                                                            @else
                                                                value="{{$user->password}}"
                                                            @endif
                                                            id="password-confirm" name="password_confirmation"
                                                            type="password"
                                                            class="form-control"
                                                            placeholder="{{ __('Confirmar') }}"
                                                            autocomplete="new-password">
                                                        <div class="input-group-append">
                                                            <button id="show_password" class="btn btn-primary"
                                                                    style="display: inline-block; background: #2c3034; color: white; "
                                                                    type="button" onclick="fShowPassword()"><span
                                                                    class="fa fa-eye-slash icon"></span></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="col-sm-12 mb-3 mb-sm-0"
                                                 style="display: flex; align-items: center; justify-content: center;padding: 10px">
                                                <div class="col-lg-7 d-lg-block">
                                                    <div class="text-center">
                                                        <img id="imagen" @if (old('image'))
                                                            src="/images/uploads/{{old('image')}}"
                                                             @else
                                                                 src="/images/uploads/{{ $user->image }}"
                                                             @endif  class="img-fluid rounded" width="430" height="430">

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
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer " style="background: #1a202c; color: whitesmoke">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Data System 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #0d6efd; color: white">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión
                actual.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src={{ asset("admin/jquery/jquery.min.js") }}></script>

<script src={{ asset("admin/bootstrap/js/bootstrap.bundle.min.js") }}></script>

<!-- Core plugin JavaScript-->
<script src={{ asset("admin/jquery-easing/jquery.easing.min.js") }}></script>

<!-- Custom scripts for all pages-->
<script src={{ asset("admin/js/sb-admin-2.min.js") }}></script>

<!-- jQuery -->
<script src={{ asset("js/jquery/jquery-3.6.1.min.js") }}></script>

<!-- Popper -->
<script src={{ asset("js/popper/popper.min.js") }}></script>

<!-- Bootstrap js -->
<script src={{ asset("js/bootstrap/bootstrap.min.js") }}></script>

<!-- Tom Select js -->
<script src={{ asset("js/tom-select.js") }}></script>

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

    function fShowPassword() {
        var cambio_b = document.getElementById("password");
        var cambio_a = document.getElementById("password-confirm");

        if (cambio_a.type === "password" && cambio_b.type === "password") {
            cambio_a.type = "text";
            cambio_b.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio_a.type = "password";
            cambio_b.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }


    function mostrar() {
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

@stack('scripsss')
</body>

</html>
