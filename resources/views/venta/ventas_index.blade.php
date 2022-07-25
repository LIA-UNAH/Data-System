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
{{-- Terminan los mensajes --}}

<div class="card shadow mb-4 ">
    <div class="card-header py-3" style="background: #0d6efd">
        <div style="float: left">
            <h2 class="m-0 font-weight-bold" style="color: white">Ventas</h2>
        </div>

        <div style="float: right">
            <div style="float: left">
                <!-- HU8 - Buscar y recargar producto -->

                <form action="" method="GET"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                            placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn" type="submit" value="Buscar" style="background: white">
                                <i class="fas fa-search fa-sm" style="color: black"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- HU8 - Buscar y recargar usuario -->
            </div>

            <div style="float: right">
                <!-- Aniadir -->
                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-success"
                            href="{{ route('ventas.create') }}"
                            style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                style="color: white"></i> Crear Venta</a>
                </div>
                <!-- Vista previa  -->
                <div style="float: right; margin-left: 5px">
                    <td style="text-align: center"><a class="btn btn-secondary"
                            href="{{ route('ventas.facturas') }}"
                            style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                style="color: white"></i> Vista Previa</a>

                </div>

                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-dark" href="/ventas"
                            style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                style="color: white"></i> Recargar</a>
                </div>


                <!-- Ordenar  -->

                <button style="text-align: center; float: right; margin-left: 10px" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false"><a class="btn btn-secondary dropdown-toggle"
                        href=""><i class="bi bi-calendar-check-fill"></i> Ordenar</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Hoy</a></li>
                        <li><a class="dropdown-item" href="#">Ultima semana</a></li>
                        <li><a class="dropdown-item" href="#">Ultimo mes</a></li>
                    </ul>
                </button>



                <!-- Añadir -->
            </div>

        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive" id="tblaBody">
            <table class="table table" id="dataTable">
                <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>

                        <th>N° de factura</th>
                        <th>Nombre Cliente</th>
                        <th>Vendido Por</th>
                        <th>Total</th>
                        <th>Saldo</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $i=>  $venta)
                        <tr>
                            <td scope="row">{{ ++$i }}</td>
                            <td>{{ $venta->Nfactura }} </td>

                            <td>{{ $venta->Cliente }}</td>
                            <td>{{ $venta->VendidoPor }}</td>
                            <td>{{ $venta->Total }}</td>
                            <td>{{ $venta->Saldo }}</td>
                            <td>{{ $venta->Estado }}</td>
                            <td scope="row">{{ $venta->fecha }}</td>

                            <td><a class="btn btn-info" href="">Ver</a>
                                <a class="btn btn-success" href="">Editar</a>

                                <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modal_eliminar_cliente">Eliminar</a>
                            </td>


                        @empty
                        <tr>
                            <td colspan="4">No hay Ventas disponibles</td>
                        </tr>

                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection

@push('scripsss')
    <script>
        $(document).ready(function () {

            $('#tblaBody').css('height', (screen.height - 500));

        });
    </script>
@endpush
