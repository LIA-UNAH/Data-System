@extends('Layouts.Layouts')



@section('content')

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

<div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Pedidos</h2>
                </div>

            <div style="float: right">
                 <div style="float: left">
                 <!-- HU8 - Buscar y recargar pedido -->
              
                  <form action="" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                          <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                                placeholder="Buscar"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn" type="submit" value="Buscar" style="background: white">
                                  <i class="fas fa-search fa-sm" style="color: black"></i>
                              </button>
                          </div>
                      </div>
                  </form>
                       <!-- HU23 - recargar pedido -->
            </div>

            <div style="float: right">
                <!-- Recargar -->
                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-dark" href="/pedidos" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i> Recargar</a>
                </div>
                <!-- Recargar -->
    
                <!-- Añadir -->
            </div>
              
            </div>
        </div>

        <!--------------------------------------------------->
        <!-- Modal PARA CREAR UN NUEVO Pedido --
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Realizar un pedido</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('pedido.store')}}" method="POST">
                            @csrf
                        <div--- class="modal-body">
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
                          </div--->

                          
                          <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO--
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>

                          </form>
                          </div>
                      </div>
                    </div---->

      <!--------EMPIEZA LA TABLA ---------------->
      <div class="card-body">
            <div class="table-responsive">
                      <table class="table table" id="dataTable" width="100%" >
                          <thead class="card-header py-3" style="background: #1a202c; color:white">
        <tr>
            <th>N°</th>
            <th>Ciudad</th>
            <th>Fecha De Orden</th>
            <th>Estado Del Pedido</th>  
            <th>Detalle Del Pedido</th>
            <th>Total Del Pedido</th>
            <th><i class="fa fa-exclamation-circle" aria-hidden=""></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse($pedidos as $i=>  $pedid)
            <tr>
            <td scope="row">{{++$i}}</td>
                <td scope="row">{{$pedid->nombre_Cliente}}</td>
                <td>{{ $pedid->telefono_Cliente}} </td>
                <td>{{ $pedid->ciudad}}</td>
                <td>{{ $pedid->fecha_de_orden}}</td>  
                <td>{{ $pedid->estado_Pedido}}</td>
                <td>{{$pedid->detalle_Pedido}}</td>
                <td>{{ $pedid->total_Pedido}}</td>
              
                <td><a class="btn btn-info" href="">Ver</a>
                          <a class="btn btn-success" href="">Editar</a>
                          
                                  <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modal_eliminar_cliente">Eliminar</a>
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
        </div>
    </div>






@endsection