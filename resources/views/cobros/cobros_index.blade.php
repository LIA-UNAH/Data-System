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
                <h2 class="m-0 font-weight-bold" style="color: white">Cobros</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU8 - Buscar y recargar pedido -->
                    <div class="input-group">
                                    <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Busqueda..." name="myInput" id="myInput">
                                </div>
                   

                </div>
                <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{route("cobro.create")}}"
                        style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i></a>
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
                        <th>Nombre Del Cliente</th>
                        <th>Identidad</th>
                        <th>Domicilio</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Fecha Limite</th>
                        <th colspan="3"><i class="fa fa-exclamation-circle" aria-hidden=""
                                           style="display: flex; justify-content: center;"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cobros as $item=> $cobr)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td scope="row"><strong>{{$item +$cobros->firstItem()}}</strong></td>
                            <td><strong>{{$cobr->nombre_cliente}}</strong></td>
                            <td>{{$cobr->identidad}}</td>
                            <td>{{$cobr->domicilio}}</td>
                            <td><span class="badge rounded-pill text-bg-light p-2 shadow-sm">{{ $cobr->estado}}</span>
                            </td>
                            <td>{{$cobr->fecha}}</td>
                            <td>{{$cobr->fecha_limite}}</td>

                            <div>
                                <td><a class="btn btn-info" href="{{ route('cobro.mostrar', ['id' => $cobr->id])}}"><i
                                            class="fa fa-eye" aria-hidden="true" style="color: white; "></i></a></td>
                            </div>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay cobros ingresados</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="sidebar-brand d-flex align-items-center justify-content-center">{{ $cobros->links() }}</div>
        </div>
    </div>

    <script src="/admin/jquery/jquery.js"></script>
    <script src="/admin/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tblaBody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>


@endsection
