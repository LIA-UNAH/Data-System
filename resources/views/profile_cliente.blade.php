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
            <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background: #1a202c; color:whitesmoke;">
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: white">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="/images/uploads/{{ Auth::user()->image }}" alt="Profile">

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


<div style="float: left;margin-left: 46px">
    <h2 class="m-0 font-weight-bold" style="color: rgb(0, 0, 0)">Perfil de usuario</h2>
</div>
<br>
<br>
<br>
<center>
    <div class="row" style="width: 96%">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3">
          <div class="card border-left-info shadow">
            <div class="card-body">
              <center class="mt-4">
                <img src="/images/uploads/{{ $user->image }}"  class="img-profile rounded-circle"  width="158px">
                <h4 class="card-title mt-2"><strong>{{$user->name}}</strong></h4>
                <br>
                <div class="row text-center justify-content-md-center">
                  <div class="col-4">
                    <a class="rounded-pill" href="{{route("usuarios.edit_profile",["id"=>$user->id])}}" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                     </a>
                  </div>

                  <div class="col-4">
                    <a class="rounded-pill" href="javascript:history.back()" class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                          </svg>
                        </a>
                  </div>
                </div>
              </center>
            </div>
          </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-lg-8 col-xlg-6">
          <div class="card border-left-info shadow">
            <div class="card-body">
              <form class="form-horizontal form-material mx-2" data-bitwarden-watching="1">
                <div class="form-group">
                  <label for="example-email" class="col-md-12" style="text-align: left"><b>Correo:</b></label>
                  <div class="col-md-12">
                    <input readonly type="email" value="{{$user->email}}" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12" style="text-align: left"><b>Teléfono:</b></label>
                  <div class="col-md-12">
                    <input readonly type="text" value="{{$user->telephone}}" placeholder="123 456 7890" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12" style="text-align: left"><b>Dirección</b></label>
                  <div class="col-md-12">
                    <textarea readonly rows="2" class="form-control form-control-line">{{$user->address}}</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Column -->
    </div>


</center>
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


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #0d6efd; color: white">
                    <h5 class="modal-title" id="exampleModalLabel" >¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
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

    @stack('scripsss')
    </body>

</html>

