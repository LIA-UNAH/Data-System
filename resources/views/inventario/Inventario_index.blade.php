@extends('Layouts.Layouts')
@section('content')


    {{-- Mensajes de las operaciones realizadas --}}
    {{-- Para los mensajes afirmativos y sin errores --}}
    @if(session('realizado'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('realizado') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- Para los mensajes de errores --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- Fin de los mensajes --}}

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Inventario</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar producto -->

                    <form action="" method="GET"
                          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="buscar_producto" class="form-control bg-light border-0 small"
                                   placeholder="Buscar" value="{{ $buscar }}" aria-label="Search"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" type="submit" value="Buscar" style="background: white">
                                    <i class="fas fa-search fa-sm" style="color: black"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- HU8 - Buscar usuario -->
                </div>

                <div style="float: right">
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/inventario"
                                                          style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                                                                                                   style="color: white"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <!--------EMPIEZA LA TABLA ---------------->
        <div class="card-body">
            <div class="table-responsive" id="tblaBody">
                <table class="table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th style="text-align: left">Código</th>
                        <th style="text-align: left">Producto</th>
                        <th style="text-align: left">Descripción</th>
                        <th style="text-align: left">Existencia</th>
                        <th style="text-align: left">Precio de Compra</th>
                        <th style="text-align: left">PV al Mayor</th>
                        <th style="text-align: left">PV al Detalle</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($productos as $item=> $producto)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td scope="row" style="width: 10%; text-transform: uppercase"><strong>{{ $producto->codigo }}</strong></td>
                            <td scope="row" style="text-transform: uppercase; width: 20%">{{ $producto->name }} {{ $producto->marca }} {{ $producto->modelo }}</td>
                            <td scope="row" style="width: 30%">{{ $producto->descripcion }}</td>
                            <td scope="row" style="width: 10%">{{ $producto->existencia }} unidades</td>
                            <td scope="row" style="width: 10%"><strong style="text-align: left; color: darkred">L. {{ number_format($producto->prec_compra, 2, ".", ",") }}</strong></td>
                            <td scope="row" style="width: 10%"><strong style="text-align: left; color: darkblue">L. {{ number_format($producto->prec_venta_may, 2, ".", ",") }}</strong></td>
                            <td scope="row" style="width: 10%"><strong style="text-align: left; color: darkslategrey">L. {{ number_format($producto->prec_venta_fin, 2, ".", ",") }}</strong></td>
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
