@extends('Layouts.Layouts')


@section('content')

    {{-- Mensajes de las operaciones realizadas --}}
    {{-- Para los mensajes afirmativos y sin errores --}}
    @if(session()->has('suce'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suce') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Para los mensajes de errores --}}
    @if(session()->has('erorr'))
        <div class="alert alert-danger" role="alert">
            {{ session('erorr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Para los mensajes de creado y actualizado --}}
    @if(session('realizado'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('realizado') }}</strong>
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

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Pedidos</h2>
            </div>

            <div style="float: right">
                <div style="float: left">

                    <!-- HU8 - Buscar y recargar pedido -->

                    <form action="" method="GET"
                          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                                   placeholder="Buscar"
                                   aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" type="submit" value="Buscar" style="background: white">
                                    <i class="fas fa-search fa-sm" style="color: black"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- HU23 - recargar pedido -->
                </div>


            </div>
        </div>

        <!--------EMPIEZA LA TABLA ---------------->
        <div class="card-body">
            <div class="table-responsive" id="tblaBody">
                <table class="table table" id="dataTable" width="100%">
                    <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                        <th>N°</th>
                        <th>Ciudad</th>
                        <th>Fecha De Orden</th>
                        <th>Estado Del Pedido</th>
                        <th>Detalle Del Pedido</th>
                        <th>Total Del Pedido</th>
                        <th colspan="3"><i class="fa fa-exclamation-circle" aria-hidden=""
                                           style="display: flex; justify-content: center;"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($pedidos as $item=> $pedid)
                        <tr>
                            <td scope="row"><strong>{{$item +$pedidos->firstItem()}}</strong></td>
                            <td scope="row"><strong>{{$pedid->ciudad}}</strong></td>
                            <td>{{ $pedid->fecha_de_orden}}</td>
                            <td><span
                                    class="badge rounded-pill text-bg-light p-2 shadow-sm">{{ $pedid->estado_Pedido}}</span>
                            </td>
                            <td>{{$pedid->detalle_Pedido}}</td>
                            <td>{{ $pedid->total_Pedido}}</td>

                            <div>
                                <td><a class="btn btn-info"
                                       href="{{ route('pedidos.mostrar', ['id' => $pedid->id])}}"><i class="fa fa-eye"
                                                                                                     aria-hidden="true"
                                                                                                     style="color: white; "></i></a>
                                </td>
                                <td><a class="btn btn-success"
                                       href="{{ route('pedido.edit', ['id' => $pedid->id]) }}"><i class="fa fa-edit"
                                                                                                  aria-hidden="true"></i></a>
                                </td>

                                <td><a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                       data-bs-target="#modal_eliminar_pedido{{ $pedid->id }}"> <i
                                            class="fa fa-window-close" aria-hidden="true"></i> </a>
                                </td>
                                <div class="modal fade" id="modal_eliminar_pedido{{ $pedid->id }}" tabindex="-1"
                                     aria-labelledby="modal_eliminar_cliente" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Eliminar pedido</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>

                                            <div class="modal-footer">
                                                <form action="{{ route('pedidos.destroy', ['id'=>$pedid->id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        ¿Desea eliminar el pedido de la cuidad de: {{$pedid->ciudad}},
                                                        Con fecha de orden de: {{$pedid->fecha_de_orden}} <strong
                                                            style="text-transform: uppercase"></strong> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal">Cerrar
                                                        </button>
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay pedidos ingresados</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="sidebar-brand d-flex align-items-center justify-content-center">{{ $pedidos->links() }}</div>
        </div>
    </div>
    
@endsection
