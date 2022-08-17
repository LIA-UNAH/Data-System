@extends('Layouts.Layouts')
@section('title', 'Compras')
@section('content')

    {{-- Mensajes de las operaciones realizadas --}}
    {{--Para los mensajes afirmativos y sin errores --}}
    @if (session()->has('exito'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{--Para los mensajes de errores --}}
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Compras</h2>
            </div>

            <div style="float: right">

                <div style="float: left">
                    <!-- HU8 - Buscar y recargar usuario -->
                    <form action="" method="GET"
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
                        <td style="text-align: center"><a class="btn btn-dark" href="/compras" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{route("compras.create")}}" style=" border: 2px solid #ffffff;border-radius: 4px">
                                <i class="fa fa-plus-square" style="color: white"></i>
                                @php
                                    $com = App\Models\Compra::where('estado_compra','=','p')->where('user_id','=',Auth::user()->id)->get();
                                @endphp
                                @if($com->count() == 0)

                                @else
                                    Continuar
                                @endif

                            </a>
                    </div>
                    <!-- Añadir -->
                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive" id="tblaBody">
                <table class="table table" id="dataTable">
                    <thead class="card-header py-3" style="background: #1a202c; color: white">
                    <tr>
                        <th>Documento</th>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Estado</th>
                        <th>Vendedor</th>
                        <th colspan="2" style="text-align: center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($compras as $compra)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                                <td scope="row" style="text-transform: uppercase"><strong>{{ $compra->docummento_compra }}</strong></td>
                                <td> <strong>{{\Carbon\Carbon::parse($compra->fecha_compra)->isoFormat("DD")}} de {{\Carbon\Carbon::parse($compra->fecha_compra)->isoFormat("MMMM")}}, {{\Carbon\Carbon::parse($compra->fecha_compra)->isoFormat("YYYY")}}</strong></td>
                                <td scope="row">{{ $compra->proveedor->nombre_proveedor }}</td>
                                @if($compra->estado_compra == 'p')
                                    <td scope="row">Preparando</td>
                                @endif
                                @if($compra->estado_compra == 'g')
                                    <td scope="row">Finalizado</td>
                                @endif
                                <td scope="row"><strong>{{ $compra->user->name }}</strong></td>
                                @if($compra->estado_compra != 'p')
                                    <td style="text-align: center"><a class="btn btn-primary" href=""><i class="fa fa-eye" style="color: white"></i></a></td>
                                    <td style="text-align: center"><a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#modal_editar_cliente"><i class="fa fa-edit" style="color: white"></i></a></td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No hay Compras</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
            {{ $compras->links() }}
        </div>
    </div>
@endsection

@push('scripsss')
<script>
            $(document).ready(function() {
                $('#tblaBody').css('height', (screen.height - 450));
            });
</script>
@endpush
