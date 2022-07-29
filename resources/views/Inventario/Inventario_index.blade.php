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
        </div>
    </div>


    <!--------EMPIEZA LA TABLA ---------------->
    <div class="card-body">
        <div class="table-responsive" id="tblaBody">
            <table class="table" id="dataTable">
                <thead class="card-header py-3" style="background: #1a202c; color:white">
                    <tr>
                        <th>N°</th>
                        <th>Descripción</th>
                        <th>Precio Costo</th>
                        <th>Existencia</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $item=> $pro)
                        <tr>
                            <td scope="row"><strong>{{ ++$item }}</strong></td>
                            <td scope="row">{{ $pro->codigo.' '.$pro->descripcion }}</td>
                            <td>{{  $pro->prec_venta }} </td>
                            <td>{{  $pro->existencia }} </td>
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

                $('#tblaBody').css('height', (screen.height - 500));

            });
</script>
@endpush
