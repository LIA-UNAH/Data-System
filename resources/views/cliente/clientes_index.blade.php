@extends('Layouts.Layouts')
@section('title', 'Clientes')
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

    <div class="card shadow mb-4" style="height: calc(88vh - 5vh);">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Clientes</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar usuario -->
                    <form action="{{ route('clientes.searchIndex') }}" method="GET"
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
                            <a class="btn btn-dark" style="border: 2px solid #ffffff;border-radius: 4px" href="/vista">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                </svg>
                            </a>
                    </div>
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/clientes" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{route("clientes.create")}}" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i></a>
                    </div>
                    <!-- Añadir -->
                </div>

            </div>
        </div>

        @if(!Illuminate\Support\Facades\Cache::get('vista'))
            <div class="card-body" style="padding-left: 35px; padding-right: 35px" id="lineas_table">
                <div class="table-responsive" id="tablaBody">
                    <table class="table table-hover" id="dataTable">
                        <thead class="card-header py-3" style="background: #1a202c; color: white">
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Telefóno</th>
                            <th>Tipo de cliente</th>
                            <th style="text-align: center">Visualizar</th>
                            <th style="text-align: center">Editar</th>
                            <th style="text-align: center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $valor=> $user)
                            @if($user->type== 'administrador' OR $user->type== 'empleado')
                            @else
                                <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                                    <td scope="row"><strong>{{ $valor+$users->firstItem() }}</strong></td>
                                    <td scope="row"><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email}} </td>
                                    <td scope="row">{{ $user->telephone }}</td>
                                    @if( $user->customer == "mayorista")
                                        <td scope="row">Mayorista</td>
                                    @else
                                        <td scope="row">Consumidor Final</td>
                                    @endif

                                    <td style="text-align: center"><a class="btn btn-primary btn-sm" href="{{route('clientes.show',['id'=>$user->id])}}"><i class="fa fa-eye" style="color: white"></i></a></td>
                                    <td style="text-align: center"><a class="btn btn-success btn-sm" href="{{route("clientes.edit",["id"=>$user->id])}}"><i class="fa fa-edit" style="color: white"></i></a></td>

                                    {{-- Eliminar usuario se valiada para evitar que el usuario
                                    actualmente logueado no se pueda eliminar a si mismo o si es administrador  H6 --}}
                                    @if($user->id == Auth::user()->id OR $user->type== 'administrador')
                                        <td>
                                        </td>
                                    @else
                                        <td style="text-align: center">
                                            <a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal" data-bs-target={{ "#modal_eliminar_cliente".$user->id }}><i class="fa fa-window-close" style="color: white"></i></a>
                                        </td>

                                        <div class="modal fade" id={{ "modal_eliminar_cliente".$user->id }} tabindex="-1"
                                             aria-labelledby={{ "modal_eliminar_cliente".$user->id }} aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #6a1a21; color: white">
                                                        <h5 class="modal-title" id="ModalLabel"><strong>ELIMINAR CLIENTE</strong></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close" style="color: white"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de eliminar a {{ $user->name }} de la lista de clientes?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal" style="background: #1c294e; color: white">Cancelar</button>
                                                        <form
                                                            action="{{ route('clientes.destroy', ['user'=>$user->id ]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" style="background: #6a1a21; color: white">Eliminar</button>
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
                                        <td colspan="7">No hay clientes</td>
                                    </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card-body" style="padding-left: 45px; padding-right: 45px; overflow-y: auto;" id="cartas_table" >
                <div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5" style="text-align: center">
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
                                            <span class="price">Tel. {{ $user->telephone }}</span>
                                        </div>
                                        <div class="card-footer">
                                            <div class="wcf-center">
                                                <a class="btn btn-primary" href="{{route('clientes.show',['id'=>$user->id])}}"><i class="fa fa-eye" style="color: white"></i></a>
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
                                <td colspan="7">No hay clientes</td>
                            </tr>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
        <div class="sidebar-brand d-flex align-items-center justify-content-center" >{{ $users->links() }}</div>
    </div>
@endsection

