@extends('Layouts.Layouts')
@section('title', 'Categorias')
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
                <h2 class="m-0 font-weight-bold" style="color: white">Categorias</h2>
            </div>

            <div style="float: right">
                <div style="float: left">
                    <!-- HU - Buscar y recargar categoria -->
                    <form action="{{ route('categorias.searchIndex') }}" method="GET"
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
                    <!-- HU - Buscar y recargar categorias -->
                </div>

                <div style="float: right">
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/categorias" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i></a>
                    </div>
                    <!-- Recargar -->

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="{{route("categorias.create")}}" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i></a>
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
                        <th>N°</th>
                        <th>Categoria</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th style="text-align: center">Visualizar</th>
                        <th style="text-align: center">Editar</th>
                        <th style="text-align: center">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categorias as $valor => $categoria)
                        <tr style="font-family: 'Nunito', sans-serif; font-size: small">
                            <td scope="row"><strong>{{ $valor + $categorias->firstItem() }}</strong></td>
                            <td scope="row"><strong>{{ $categoria->name }}</strong></td>
                            <td>{{ $categoria->description}} </td>

                            @if( $categoria->status == 0)
                                <td scope="row"><b style="color: darkred; text-align: center"><strong>Inactivo</strong></b></td>
                            @endif
                            @if( $categoria->status == 1)
                                <td scope="row"><b style="color: darkgreen; text-align: center"><strong>Activo</strong></b></td>
                            @endif

                            <td style="text-align: center"><a class="btn btn-primary" href="{{route('categorias.show',['id'=>$categoria->id])}}"><i class="fa fa-eye" style="color: white"></i></a></td>
                            <td style="text-align: center"><a class="btn btn-success" href="{{route("categorias.edit",["id"=>$categoria->id])}}"><i class="fa fa-edit" style="color: white"></i></a></td>
                            <td style="text-align: center"><a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target={{ "#modal_eliminar_categoria".$categoria->id }}><i class="fa fa-window-close" style="color: white"></i></a></td>

                            <div class="modal fade" id={{ "modal_eliminar_categoria".$categoria->id }} tabindex="-1"
                                 aria-labelledby={{ "modal_eliminar_categoria".$categoria->id }} aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: darkred; color: white">
                                            <h5 class="modal-title" id="ModalLabel">Eliminar categoria</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" style="color: white"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar la categoria "{{ $categoria->name }}?"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar
                                            </button>
                                            <form
                                                action="{{ route('categorias.destroy', ['categoria'=>$categoria->id ]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Hasta aqui el modal de eliminar --}}
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No hay categorias</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
            {{ $categorias->links() }}
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
