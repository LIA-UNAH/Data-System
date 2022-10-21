@extends('Layouts.Layouts')
@section('content')

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
                        <td style="text-align: center"><a class="btn btn-dark" href="/productos"
                                                          style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                                                                                                   style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success"
                                                          href="{{ route("productos.create") }}"
                                                          style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                                                                                                   style="color: white"></i></a>
                    </div>
                    <!-- Añadir -->
                </div>

            </div>
        </div>

        <!--------EMPIEZA LA TABLA ---------------->
        <div class="card-body" id="lineas_table">
            <div class="table-responsive" id="tblaBody">
                <table class="table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th>N°</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Existencia</th>
                        <th>Precio</th>
                        <th colspan="3" style="text-align: center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($productos as $item=> $producto)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td scope="row" style="width: 5%"><strong>{{ $item +$productos->firstItem() }}</strong></td>
                            <td scope="row" style="text-transform: uppercase; width: 25%"><strong>{{ $producto->name }} {{ $producto->marca }} {{ $producto->modelo }}</strong></td>
                            <td scope="row" style="width: 40%">{{ $producto->descripcion }}</td>
                            <td scope="row" style="width: 15%">{{ $producto->existencia }} unidades</td>
                            <td scope="row" style="width: 15%">L {{ number_format($producto->prec_venta_fin, 2, ".", ",") }}</td>

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
                                                ¿Desea eliminar el producto: <strong style="text-transform: uppercase">{{ $producto->name }}</strong> de la linea {{ $producto->marca }} y con número de modelo {{ $producto->modelo }}?
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
        <div class="card-body" style="display: none" id="cartas_table" >
            <div class="table-responsive" id="tblaBody" >
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="text-align: center">
                    @forelse($productos as $item=> $producto)
                        <div class="col">
                            <div class="wsk-cp-product">
                                <div class="wsk-cp-img">
                                    <img src="/images/products/{{ $producto->imagen_producto }}" alt="Product" class="img-responsive" />
                                </div>
                                <div class="wsk-cp-text">
                                    <div class="category">
                                        <span><strong>{{ $producto->name }}</strong></span>
                                    </div>
                                    <div class="description-prod">
                                        <p><strong>{{ $producto->marca }} {{ $producto->modelo }}</strong></p>
                                        <p>{{ $producto->descripcion }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="wcf-left"><span class="price">{{ $producto->existencia }} unidades</span></div>
                                        <div class="wcf-right">
                                            <a class="btn btn-info"
                                               href="{{ route('productos.show', ['id' => $producto->id]) }}"><i
                                                    class="fa fa-eye" aria-hidden="true" style="color: white; "></i></a></td>
                                            <a class="btn btn-success"
                                               href="{{ route('productos.edit', ['id' => $producto->id]) }}"><i
                                                    class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                               data-bs-target="#modalEliminarProveedor2{{ $producto->id }}"> <i
                                                    class="fa fa-window-close" aria-hidden="true"></i> </a>

                                        </div>
                                    </div>

                                    <!---------############################----------->
                                    <!-----------MODAL PARA ELIMINAR UN PRODUCTO---------------->


                                    <div class="modal fade" id="modalEliminarProveedor2{{ $producto->id }}"
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
                                                        ¿Desea eliminar el producto: <strong style="text-transform: uppercase">{{ $producto->name }}</strong> de la linea {{ $producto->marca }} y con número de modelo {{ $producto->modelo }}?
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



                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6">No hay usuarios</td>
                        </tr>
                    @endforelse
                </div>
                <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
                    {{ $productos->links('pagination::bootstrap-4') }}
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
