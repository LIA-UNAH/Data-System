@extends('Layouts.Layouts')
@section('title', 'Reparaciones')
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
                <h2 class="m-0 font-weight-bold" style="color: white">Reparaciones</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar usuario -->
                    <form action="{{ route('reparaciones.searchIndex') }}" method="GET"
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
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/reparaciones" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{route("reparaciones.create")}}" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i></a>
                    </div>
                    <!-- Añadir -->
                </div>

            </div>
        </div>

        <div class="card-body" style="padding-left: 35px; padding-right: 35px">
            <div class="table-responsive" id="tblaBody">
                <table class="table table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color: white">
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Fecha de entrega</th>
                        <th>Hora de entrega</th>
                        <th>Precio</th>
                        <th style="text-align: center">Visualizar</th>
                        <th style="text-align: center">Editar</th>
                        <th style="text-align: center">Desactivar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($reparaciones as $valor=> $reparacion)
                            <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                                <td scope="row"><strong>{{ $valor +$reparaciones->firstItem() }}</strong></td>
                                <td scope="row">{{ $reparacion->cliente }}</td>
                                <td> <strong>{{\Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat("DD")}} de {{\Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat("MMMM")}}, {{\Carbon\Carbon::parse($reparacion->fecha_salida)->isoFormat("YYYY")}}</strong></td>
                                <td> <strong>{{ $reparacion->hora_salida }}</strong></td>
                                <td scope="row" style="width: 10%"><strong style="text-align: left; color: darkred">L. {{ number_format($reparacion->costo_reparacion, 2, ".", ",") }}</strong></td>
                                <td style="text-align: center"><a class="btn btn-primary" href="{{route('reparaciones.show',['id'=>$reparacion->id])}}"><i class="fa fa-eye" style="color: white"></i></a></td>
                                <td style="text-align: center"><a class="btn btn-success" href="{{route("reparaciones.edit",["id"=>$reparacion->id])}}"><i class="fa fa-edit" style="color: white"></i></a></td>
                                {{-- Eliminar usuario se valiada para evitar que el usuario
                                actualmente logueado no se pueda eliminar a si mismo o si es administrador  H6 --}}

                                    <td style="text-align: center">
                                        <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                           data-bs-target={{"#modal_eliminar_cliente".$reparacion->id}}><i class="fa fa-window-close" style="color: white"></i></a>
                                    </td>

                                    <div class="modal fade" id={{"modal_eliminar_cliente".$reparacion->id}} tabindex="-1"
                                         aria-labelledby={{"modal_eliminar_cliente".$reparacion->id}} aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background: darkred; color: white">
                                                    <h5 class="modal-title"  id="ModalLabel">Eliminar reparación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close" style="color: white"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Desea eliminar la reparación?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar
                                                    </button>
                                                    <form action="{{ route('reparaciones.destroy', ['reparacion'=>$reparacion->id ]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- Hasta aqui el modal de eliminar --}}
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No hay reparaciones</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
                <div class="col-sm-6" style="text-align: center; margin: 0 auto">{{ $reparaciones->links() }}</div>
            </div>
        </div>
    </div>
@endsection
