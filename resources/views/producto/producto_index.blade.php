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
                <h2 class="m-0 font-weight-bold" style="color: white">Productos</h2>
            </div>

            <div style="float: right">

    <!-- HU8 - Buscar y recargar producto -->
    <div class="card" style="padding: 10px">
        <form action="" method="GET"
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                       placeholder="Buscar por nombre"
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
                          <h5 class="modal-title" id="staticBackdropLabel">Crear nuevo equipo</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('productos.store')}}" method="POST">
                            @csrf
                        <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio de compra:</label>
                                <input type="number" class="form-control" id="prec_compra" name="prec_compra" placeholder="Ingrese el precio de compra" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio de venta:</label>
                                <input type="number" class="form-control" id="prec_venta" name="prec_venta" placeholder="Ingrese el preccio de venta" value="" required>
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
                                <label for="firstName" class="form-label">Impuesto:</label>
                                <input type="text" class="form-control" id="impuesto" name="impuesto" placeholder="Ingrese el Area" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                               <div class="col-sm-6">
                                <label for="firstName" class="form-label">Total:</label>
                                <input type="text" class="form-control" id="total" name="total" placeholder="Ingrese el total" value="" required>
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
                    Crear nuevo 
                  </button>
                  </div>

        <!--------EMPIEZA LA TABLA ---------------->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
            <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Existencia</th>
                <th>Precio de venta</th>
                <th>Impuesto</th>
                <th><i class="fa fa-exclamation-circle" aria-hidden=""></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse($productos as $i=>  $pro)
                <tr>
                <td scope="row"><strong>{{++$i}}</strong></td>
                    <td scope="row">{{$pro->nombre}}</td>
                    <td>{{ $pro->Código}} </td>
                    <td>{{ $pro->existencia}}</td>
                    <td>{{ $pro->prec_venta}}</td>
                    <td>{{ $pro->impuesto}}</td>

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
                    <td colspan="4">No hay productos ingresados</td>
                </tr>

            @endforelse
            </tbody>

        </table>
    </div>
@endsection
