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

                <form action="{{ route('ventas.searchIndex') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="buscar_venta" id="buscar_venta" class="form-control bg-light border-0 small"
                            placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit" value="Buscar" style="background: white" >
                                <i class="fas fa-search fa-sm" style="color: black" ></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- HU8 - Buscar y recargar venta -->
            </div>

            <div style="float: right">

                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-dark" href="/ventas"
                                                      style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner"
                                                                                                               style="color: white"></i></a>
                </div>
                <!-- Vista previa  -->
                <div style="float: right; margin-left: 5px">
                    <td style="text-align: center"><a class="btn btn-secondary"
                                                    href="{{ route('ventas.factura') }}"
                                                    style=" border: 2px solid #ffffff;border-radius: 4px">
                                                        <i class="fa fa-plus-square"
                                                        style="color: white"></i> Vista Previa</a>

                </div>
                <!-- Aniadir -->
                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-success"
                                                      href="{{ route('ventas.create') }}"
                                                      style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square"
                                                                                                               style="color: white"></i></a>
                </div>




                <!-- Ordenar  -->

                <div style="text-align: center; float: right; margin-left: 15px" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false"><a style=" border: 2px solid #ffffff;border-radius: 4px" class="btn btn-secondary dropdown-toggle"
                        href=""><i class="bi bi-calendar-check-fill"></i> Ordenar</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Hoy</a></li>
                        <li><a class="dropdown-item" href="#">Ultima semana</a></li>
                        <li><a class="dropdown-item" href="#">Ultimo mes</a></li>
                    </ul>
                </div>



                <!-- Añadir -->
            </div>

        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive" id="tblaBody">
            <table class="table table" id="dataTable">
                <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th>Factura</th>
                        <th>Empleado</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th colspan="3">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $i=>  $venta)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td> <strong>{{ $venta->numero_factura_venta }}</strong></td>
                            <td>{{ $venta->usuario }}</td>
                            <td>{{ $venta->cliente }}</td>
                            <td>L {{ number_format($venta->total, 2, ".", ",") }}</td>
                            <td> <strong>{{\Carbon\Carbon::parse($venta->fecha_factura)->isoFormat("DD")}} de {{\Carbon\Carbon::parse($venta->fecha_factura)->isoFormat("MMMM")}}, {{\Carbon\Carbon::parse($venta->fecha_factura)->isoFormat("YYYY")}}</strong></td>

                            <td><a class="btn btn-info" href="   {{ route('ventas.facturas', ['id'=>$venta->id]) }}">Ver</a>
                                <a class="btn btn-success" href="">Editar</a>

                                <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modal_eliminar_cliente">Eliminar</a>
                            </td>
                        @empty
                        <tr>
                            <td colspan="8">No hay Ventas disponibles</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
            <div class="col-sm-6" style="text-align: center; margin: 0 auto">{{ $ventas->links() }}</div>
        </div>
    </div>
</div>

<script>
    function buscarVenta() {
            var impu_buscar = document.getElementById("buscar_venta");
            window.location.href = "{{ route('ventas.searchIndex') }}?buscar_venta=" + impu_buscar.value;
    }

</script>
@endsection
