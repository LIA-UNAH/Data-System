@extends('Layouts.Layouts')



@section('content')

    <h1 style="text-align:center ;">LISTA DE USUARIOS</h1>

    {{-- Mensajes de las operaciones realizadas --}}
    {{--Para los mensajes afirmativos y sin errores --}}
    @if (session()->has('suce'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suce') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{--Para los mensajes de errores --}}
    @if (session()->has('erorr'))
        <div class="alert alert-danger" role="alert">
            {{ session('erorr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <!--  HU8 - Buscar y recargar usuario -->
    <div class="card" style="padding: 10px; margin-bottom: 15px">

        <form action="{{ route('usuarios.searchIndex') }}" method="GET" style="width: 500px"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                       aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" value="Buscar">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!--  HU8 - Buscar y recargar usuario -->

    <!--  HU5 - Visualizar usuarios -->
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Rol de usuario</th>
            <th>Ver usuario</th>
            <th>Editar suario</th>
            <th>Eliminar usuario</th>
        </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td scope="row">{{ $user->name }}</td>
                    <td>{{ $user->email}} </td>
                    <td> </td>

                    <td><a class="btn btn-info" href="">Ver</a></td>
                    <td><a class="btn btn-success" href="">Editar</a></td>
                    {{-- Eliminar usuario se valiada para evitar que el usuario
                    actualmente logueado no se pueda eliminar a si mismo  H6 --}}
                    @if($user->id == Auth::user()->id)
                        <td>
                        </td>
                    @else
                        <td>
                            <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#modal_eliminar_cliente">Eliminar</a>
                        </td>

                        <div class="modal fade" id="modal_eliminar_cliente" tabindex="-1" aria-labelledby="modal_eliminar_cliente" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Eliminar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar a "{{ $user->name }}"
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra</button>
                                        <form action="{{ route('usuarios.destroy', ['user'=>$user->id ]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- Hasta aqui el modal de eliminar --}}

                </tr>
            @empty
                <tr>
                    <td colspan = "4">No hay usuarios</td>
                </tr>

            @endforelse
            </tbody>
        </table>
@endsection
