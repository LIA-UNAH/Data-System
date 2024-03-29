@extends('Layouts.Layouts') 
@section('content')
{{-- Mensajes de las operaciones realizadas --}}
{{-- Para los mensajes afirmativos y sin errores --}}
@if(session()->has('realizado'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('realizado') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{-- Para los mensajes de errores --}}
@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{-- Terminan los mensajes --}}

<div class="card shadow mb-4 ">
    <div class="card-header py-3" style="background: #0d6efd">
        <div style="float: left">
            <h2 class="m-0 font-weight-bold" style="color: white">Proveedores</h2>
        </div>

        <div style="float: right;">
            <div style="float: left">
                <!-- Buscar proveedor -->
                <form action="{{ route('proveedor.index') }}" method="GET"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="buscar_texto" class="form-control bg-light border-0 small"
                            placeholder="Buscar" value="{{ $buscar }}" aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn" type="submit" value="Buscar" style="background: white">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div style="float: right">
                <!-- Recargar -->
                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-dark" href="/proveedor"
                            style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                style="color: white"></i></a>
                </div>

                <!-- Añadir -->
                <div style="float: right; margin-left: 10px">
                    <td style="text-align: center"><a class="btn btn-success" href="{{route("proveedor.create")}}"
                                                      style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                style="color: white"></i></a>
                </div>
                <!--fin Añadir -->
            </div>

        </div>
    </div>

    <!---Tabla--->
    <div class="card-body">
        <div class="table-responsive" id="tblaBody">
            <table class="table" id="dataTable" >
                <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>RTN</th>
                        <th>Teléfono empresa</th>
                        <th>Encargado</th>
                        <th>Teléfono encargado</th>
                        <th colspan="6"><i class="fa fa-exclamation-circle" aria-hidden=""
                                style="display: flex; justify-content: center;"></i></th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $item=> $proveedor)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td scope="row" ><strong>{{ $item +$proveedores->firstItem() }}</strong></td>
                            <td><strong>{{ $proveedor->nombre_proveedor }}</strong></td>
                            <td>{{ $proveedor->rtn_proveedor }} </td>
                            <td>{{ $proveedor->telefono_proveedor }} </td>
                            <td>{{ $proveedor->contacto_proveedor }} </td>
                            <td>{{ $proveedor->telefono_contacto_proveedor }} </td>
                            <td style="text-align: center"><a class="btn btn-primary" href="{{route('proveedor.show',['id'=>$proveedor->id])}}"><i class="fa fa-eye" style="color: white"></i></a></td>

                            <td><a class="btn btn-success"
                                    href="{{ route('proveedor.edit', $proveedor->id) }}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    <!--boton de editar--->
                                    @csrf</a> </td>
                                    <!---ACA EMPIEZA EL BOTON DE ELIMINAR--->
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" style="float:right"
                                    data-bs-target="#modalEliminarProveedor{{ $proveedor->id }}">
                                    <i class="fa fa-window-close" aria-hidden="true"></i>
                                    <!--boton de eliminar--->
                                </button></td>

                            <!---------############################----------->
                            <!-----------MODAL PARA ELIMINAR UN PROVEEDOR---------------->
                            <div class="modal fade" id="modalEliminarProveedor{{ $proveedor->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Proveedor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form
                                            action="{{ route('proveedor.destroy',$proveedor->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                ¿Desea eliminar al proveedor
                                                <strong>{{ $proveedor->nombre_proveedor }}?</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay proveedores</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="sidebar-brand d-flex align-items-center justify-content-center">{{ $proveedores->links() }}</div>
    </div>
</div>
@endsection
