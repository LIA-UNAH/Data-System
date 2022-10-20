@extends('Layouts.Layouts')
@section('title', 'Usuarios')
@section('content')

    {{-- Mensajes de las operaciones realizadas --}}
    {{--Para los mensajes afirmativos y sin errores --}}
    @if(session('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('exito') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Usuarios</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar usuario -->
                    <form action="{{ route('usuarios.searchIndex') }}" method="GET"
                          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                                   value="" aria-label=""
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn" type="submit" value="Buscar" style="background: white">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- HU8 - Buscar y recargar usuario -->
                </div>

                <div style="float: right">
                    <!-- Cambio de vista -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center">
                            <a class="btn btn-dark" style="border: 2px solid #ffffff;border-radius: 4px" onclick="cambio_vista()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                </svg>
                            </a>
                    </div>
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/usuarios" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{route("usuarios.create")}}" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i></a>
                    </div>
                    <!-- Añadir -->
                </div>

            </div>
        </div>

        <div class="card-body" style="padding-left: 35px; padding-right: 35px" id="lineas_table" >
            <div class="table-responsive" id="tblaBody">
                <table class="table table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color: white">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Rol de usuario</th>
                        <th style="text-align: center">Visualizar</th>
                        <th style="text-align: center">Editar</th>
                        <th style="text-align: center">Desactivar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $valor=> $user)
                            <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                                <td scope="row"><strong>{{ $valor +$users->firstItem() }}</strong></td>
                                <td scope="row"><strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email}} </td>
                                <td scope="row">{{ $user->type }}</td>

                                <td style="text-align: center"><a class="btn btn-primary" href="{{route('usuarios.show',['id'=>$user->id])}}"><i class="fa fa-eye" style="color: white"></i></a></td>
                                <td style="text-align: center"><a class="btn btn-success" href="{{route("usuarios.edit",["id"=>$user->id])}}"><i class="fa fa-edit" style="color: white"></i></a></td>
                                {{-- Eliminar usuario se valiada para evitar que el usuario
                                actualmente logueado no se pueda eliminar a si mismo o si es administrador  H6 --}}
                                @if($user->id == Auth::user()->id OR $user->type== 'administrador')
                                    <td></td>
                                @else
                                    <td style="text-align: center">
                                        <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                           data-bs-target={{"#modal_eliminar_cliente".$user->id}}><i class="fa fa-window-close" style="color: white"></i></a>
                                    </td>

                                    <div class="modal fade" id={{"modal_eliminar_cliente".$user->id}} tabindex="-1"
                                         aria-labelledby={{"modal_eliminar_cliente".$user->id}} aria-hidden="true">
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
                                {{-- Hasta aqui el modal de eliminar --}}
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No hay usuarios</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
                <div class="col-sm-6" style="text-align: center; margin: 0 auto">{{ $users->links() }}</div>
            </div>
        </div>

        <div class="card-body" style="padding-left: 35px; padding-right: 35px; display: none" id="cartas_table" >
            <div class="table-responsive" id="tblaBody" style="padding: 50px">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="text-align: center">
                    @forelse($users as $valor=> $user)
                            <div class="col">
                                <div class="wsk-cp-product">
                                    <div class="wsk-cp-img">
                                        <img src="/images/uploads/{{ $user->image }}" alt="Product" class="img-responsive" />
                                    </div>
                                    <div class="wsk-cp-text">
                                        <div class="category">
                                            <span><strong>{{ $user->name }}</strong></span>
                                        </div>
                                        <div style="padding-bottom: 10px">
                                            <span class="price">{{ $user->type }}</span>
                                        </div>
                                        <div class="card-footer">
                                            <div class="wcf-center">
                                                <a class="btn btn-primary" href="{{route('usuarios.show',['id'=>$user->id])}}"><i class="fa fa-eye" style="color: white"></i></a>
                                                <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                                   data-bs-target={{"#modal_eliminar_cliente".$user->id}}><i class="fa fa-window-close" style="color: white"></i></a>
                                            </div>
                                        </div>
                                        <div class="modal fade" id={{"modal_eliminar_cliente".$user->id}} tabindex="-1"
                                             aria-labelledby={{"modal_eliminar_cliente".$user->id}} aria-hidden="true">
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
                                    </div>
                                </div>
                            </div>
                    @empty
                        <tr>
                            <td colspan="6">No hay usuarios</td>
                        </tr>
                    @endforelse
                </div>
                <div>{{ $users->links() }}</div>
            </div>
        </div>

    </div>
@endsection

@push('scripsss')
    <script>
        let valor = true;
        function cambio_vista(){

            if (valor) {
                document.getElementById('lineas_table').style.display = 'none';
                document.getElementById('cartas_table').style.display = 'block';
                valor = false;
            } else {
                document.getElementById('cartas_table').style.display = 'none';
                document.getElementById('lineas_table').style.display = 'block';
                valor = true;
            }
        }
    </script>
@endpush
