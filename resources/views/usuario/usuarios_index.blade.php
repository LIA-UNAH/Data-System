@extends('Layouts.Layouts')
@section('content')

    {{-- Mensajes de las operaciones realizadas --}}
    {{--Para los mensajes afirmativos y sin errores --}}
    @if (session()->has('exito'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suce') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{--Para los mensajes de errores --}}
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('erorr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Usuarios</h2>
            </div>

            <div style="float: right">
                <!-- HU8 - Buscar y recargar usuario -->
                <form action="{{ route('usuarios.searchIndex') }}" method="GET" style=""
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="busqueda" class="form-control bg-light border-0 small" style="color: #1a202c"
                               placeholder="Buscar"
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn " type="submit" value="Buscar" style="background: white">
                                <i class="fas fa-search fa-sm" style="color: #0d6efd"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- HU8 - Buscar y recargar usuario -->
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table" id="dataTable" width="100%" >
                    <thead class="card-header py-3" style="background: #1a202c; color: white">
                    <tr>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Rol de usuario</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Desactivar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        @if($user->type== 'cliente')
                        @else
                        <tr>
                            <td scope="row">{{ $user->name }}</td>
                            <td>{{ $user->email}} </td>
                            <td scope="row">{{ $user->type }}</td>

                            <td style="text-align: center"><a class="btn btn-primary" href=""><i class="fa fa-eye" style="color: white"></i></a></td>
                            <td style="text-align: center"><a class="btn btn-success" href=""><i class="fa fa-edit" style="color: white"></i></a></td>
                            {{-- Eliminar usuario se valiada para evitar que el usuario
                            actualmente logueado no se pueda eliminar a si mismo o si es administrador  H6 --}}
                            @if($user->id == Auth::user()->id OR $user->type== 'administrador')
                                <td>
                                </td>
                            @else
                                <td style="text-align: center">
                                    <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                       data-bs-target="#modal_eliminar_cliente"><i class="fa fa-window-close" style="color: white"></i></a>
                                </td>

                                <div class="modal fade" id="modal_eliminar_cliente" tabindex="-1"
                                     aria-labelledby="modal_eliminar_cliente" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: darkred; color: white">
                                                <h5 class="modal-title"  id="ModalLabel">Eliminar usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" style="color: white"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Desea eliminar el usuario "{{ $user->name }}?"
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar
                                                </button>
                                                <form action="{{ route('usuarios.destroy', ['user'=>$user->id ]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endif
                            {{-- Hasta aqui el modal de eliminar --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay usuarios</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
