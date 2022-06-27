@extends('Layouts.Layouts')



@section('content')

<h1 style="text-align:center">LISTA DE PEDIDOS</h1>

{{-- Mensajes de las operaciones realizadas --}}
    {{--Para los mensajes afirmativos y sin errores --}}
    @if (session()->has('suce'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suce') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{--Para los mensajes de errores --}}
    @if (session()->has('erorr'))
        <div class="alert alert-danger" role="alert">
            {{ session('erorr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <!-- HU23 - Buscar y recargar producto -->
    <div class="card" style="padding: 10px">
        <form action="" method="GET"
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                       placeholder="Buscar pedido por nombre"
                       aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" value="Buscar">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!--------------------------------------------------->
        <!-- Modal PARA CREAR UN NUEVO PRODUCTO -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Realizar un pedido</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('pedido.store')}}" method="POST">
                            @csrf
                        <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombre del producto:</label>
                                <input type="text" class="form-control" id="nombre_Producto" name="nombre_Producto" placeholder="Ingrese el nombre del producto" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Marca del producto:</label>
                                <input type="text" class="form-control" id="marca_Producto" name="marca_Producto" placeholder="Ingrese la marca del producto" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Dimensiones:</label>
                                <input type="text" class="form-control" id="dimension" name="dimension" placeholder="Ingrese las dimesiones" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Fecha de orden:</label>
                                <input type="text" class="form-control" id="fecha_de_orden" name="fecha_de_orden" placeholder="00-00-0000" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Existencia:</label>
                                <input type="number" class="form-control" id="existencia" name="existencia" placeholder="Ingrese la serie" value="" >
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Color del producto:</label>
                                <input type="text" class="form-control" id="colore_Producto" name="colore_Producto" placeholder="Ingrese el color del producto" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                               <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio del producto:</label>
                                <input type="number" class="form-control" id="precio_Producto" name="precio_Producto" placeholder="Ingrese el precio del producto" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              
                              </div>            
                          </div>

                          
                          <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO-->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>

                          </form>
                          </div>
                      </div>
                    </div>

                  <div>
                  <!-- ESTE BOTON LLAMA AL MODAL -->
                  <button type="button" class="btn btn-primary shadow-lg rounded my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                    Realizar Pedido 
                  </button>
                  </div>
      <!--------EMPIEZA LA TABLA ---------------->
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nombre Del Producto</th>
            <th>Marca Del Producto</th>
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
                <td>{{ $pedid->marca_Producto}} </td>
                <td>{{ $pedid->dimension}}</td>
                <td>{{ $pedid->fecha_de_orden}}</td>  
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