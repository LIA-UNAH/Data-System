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
            <h2 class="m-0 font-weight-bold" style="color: white">Productos</h2>
        </div>

        <div style="float: right">
            <div style="float: left">
                <!-- HU8 - Buscar y recargar usuario -->
                <form action="{{ route('productos.searchIndex') }}" method="GET"
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
                    <td style="text-align: center"><a class="btn btn-dark" href="/productos"
                            style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                style="color: white"></i> Recargar</a>
                </div>
                <!-- Recargar -->

                <!-- Añadir -->
                <div style="float: right; margin-left: 10px">
                    <td style="text-align: center"><a class="btn btn-success"
                            href="{{ route("productos.create") }}"
                            style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                style="color: white"></i> Añadir</a>
                </div>
                <!-- Añadir -->
            </div>

        </div>
    </div>

    <!--------EMPIEZA LA TABLA ---------------->
    <div class="card-body">
        <div class="table-responsive" id="tblaBody">
            <table class="table" id="dataTable">
                <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Código</th>
                        <th>Precio de venta</th>
                        <th colspan="3"><i class="fa fa-exclamation-circle" aria-hidden=""
                                style="display: flex; justify-content: center;"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $item=> $producto)
                        <tr>
                            <td scope="row"><strong>{{ $item +$productos->firstItem() }}</strong></td>
                            <td scope="row">{{ $producto->nombre }}</td>
                            <td scope="row">{{ $producto->descripcion }}</td>
                            <td scope="row">{{ $producto->categoria->name }}</td>
                            <td style="text-transform: uppercase;">{{ $producto->codigo }} </td>
                            <td style="text-transform: uppercase;">L. {{ $producto->prec_venta_fin }} </td>

                            <td><a class="btn btn-info"
                                    href="{{ route('productos.show', ['id' => $producto->id]) }}"><i
                                        class="fa fa-eye" aria-hidden="true" style="color: white; "></i></a></td>
                            <td><a class="btn btn-success"
                                    href="{{ route('productos.edit', ['id' => $producto->id]) }}"><i
                                        class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminarProveedor{{ $producto->id }}"> <i
                                        class="fa fa-window-close" aria-hidden="true"></i> </a>
                            </td>


                            <!---------############################----------->
                            <!-----------MODAL PARA ELIMINAR UN PRODUCTO---------------->


                            <div class="modal fade" id="modalEliminarProveedor{{ $producto->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Producto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form action="{{ route('productos.destroy',$producto->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">

                                                ¿Desea eliminar el producto <strong>{{ $producto->nombre }}?</strong>

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

                            <!-----------####################################------->


                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay productos ingresados</td>
                        </tr>

                    @endforelse
                </tbody>

            </table>

        </div>
        <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
            {{ $productos->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>


@endsection


@push('scripsss')
<script>
            $(document).ready(function() {

                $('#tblaBody').css('height', (screen.height - 300));

            });
</script>
@endpush
