@extends('Layouts.Layouts')



@section('content')

<h1 style="text-align:center">LISTA DE PEDIDOS</h1>


      <!--------EMPIEZA LA TABLA ---------------->
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nombre Del Producto</th>
            <th>Marca Del Modelo</th>
            <th>Dimension</th>
            <th>Fecha De Orden</th>
            <th>Existencia</th>
            <th>Color del producto</th>
            <th>Precio Del Producto</th>
            <th><i class="fa fa-exclamation-circle" aria-hidden=""></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse($pedidos as $i=>  $pedid)
            <tr>
            <td scope="row">{{++$i}}</td>
                <td scope="row">{{$pedid->nombre_Producto}}</td>
                <td>{{ $pedid->marca_Model}} </td>
                <td>{{ $pedid->dimension}}</td>
                
                <td>{{ $pedid->existencia}}</td>
                <td>{{$pedid->colore_Producto}}</td>
                <td>{{ $pedid->precio_Producto}}</td>
              

                <td><a class="btn btn-info" href="">Ver</a>
                <a class="btn btn-success" href="">Editar</a>
                
                        <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                           data-bs-target="#modal_eliminar_Pedido">Eliminar</a>
                    </td>

                    <!-- <div class="modal fade" id="modal_eliminar_cliente" tabindex="-1"
                         aria-labelledby="modal_eliminar_cliente" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Eliminar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea eliminar a ""
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra
                                    </button>
                                    <form action=""
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                {{-- Hasta aqui el modal de eliminar --}} -->


            </tr>
        @empty
            <tr>
                <td colspan="4">No hay pedidos ingresados</td>
            </tr>

        @endforelse
        </tbody>

    </table>
</div>






@endsection