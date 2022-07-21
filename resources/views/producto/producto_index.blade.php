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
                 <div style="float: left">
                 <!-- HU8 - Buscar producto -->
              
                  <form action="{{ route('productos.index') }}" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                          <input type="text" name="buscar_producto" class="form-control bg-light border-0 small"
                                placeholder="Buscar" value="{{$buscar}}"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn" type="submit" value="Buscar" style="background: white">
                                  <i class="fas fa-search fa-sm" style="color: black"></i>
                              </button>
                          </div>
                      </div>
                  </form>
                       <!-- HU8 - Buscar usuario -->
            </div>

            <div style="float: right">
                <!-- Recargar -->
                <div style="float: left; margin-left: 15px">
                    <td style="text-align: center"><a class="btn btn-dark" href="/productos" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i> Recargar</a>
                </div>
                <!-- Recargar -->

                <!-- Añadir -->
                <div style="float: right; margin-left: 10px">
                    <td style="text-align: center"><a class="btn btn-success" href="{{route("productos.create")}}" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i> Añadir</a>
                </div>
                <!-- Añadir -->
            </div>
              
            </div>
        </div>
        
        <!--------------------------------------------------->
       <!-------Modal PARA CREAR UN NUEVO PRODUCTO------
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
                          </div --->

                          
                          <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO
                          <div class="modal-footer"> 
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>

                          </form>
                          </div>
                      </div>
                    </div -->

                  <!--div style="margin-left: 15px; margin-bottom:-15px">
                   ESTE BOTON LLAMA AL MODAL 
                  <button type="button" class="btn btn-primary shadow-lg rounded my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                    Crear nuevo 
                  </button>
                  </div---->
                  

        <!--------EMPIEZA LA TABLA ---------------->
        <div class="card-body">
            <div class="table-responsive">
                      <table class="table table" id="dataTable" width="100%" >
                          <thead class="card-header py-3" style="background: #1a202c; color:white">
                  <tr>
                      <th>N°</th>
                      <th>Descripción</th>
                      <th>Código</th>
                      <th>Existencia</th>
                      <th>Precio de venta</th>
                      <th>Categoría</th>
                      <th>Impuesto</th>
                      <th colspan="3"><i class="fa fa-exclamation-circle" aria-hidden="" style="display: flex; justify-content: center;"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($productos as $item=> $pro)
                      <tr>
                      <td scope="row"><strong>{{$item +$productos->firstItem()}}</strong></td>
                          <td scope="row">{{$pro->descripcion}}</td>
                          <td>{{ $pro->codigo}} </td>
                          <td>{{ $pro->existencia}}</td>
                          <td>{{ $pro->prec_venta}}</td>
                          <td>{{ $pro->categoria}}</td>
                          <td>{{ $pro->impuesto}}</td>

                          <td><a class="btn btn-info" href="{{ route('productos.ver', ['id' => $pro->id])}}"><i class="fa fa-eye" aria-hidden="true" style="color: white; "></i></a></td>
                         <td><a class="btn btn-success" href="{{ route('producto.edit', ['id' => $pro->id])}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td> 
                          
                                 <td><a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#modalEliminarProveedor{{$pro->id}}"> <i class="fa fa-window-close" aria-hidden="true"></i> </a></td> 
                              </td>

                              
                                            <!---------############################----------->
                                            <!-----------MODAL PARA ELIMINAR UN PRODUCTO---------------->
                                            
                                                                   
                                            <div class="modal fade" id="modalEliminarProveedor{{$pro->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="staticBackdropLabel">Eliminar Producto</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('productos.destroy',$pro->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-body">
                                                 
                                                    ¿Desea eliminar el producto <strong>{{$pro->descripcion}}?</strong>
                                                          
                                                    </div>           
                                                 <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                  </div>

                                                  </form>
                                                  </div>
                                              </div>
                                            </div>
                                           
                                            <!-----------####################################------->


                      </tr>
                  @empty
                      <tr>
                          <td colspan="4">No hay productos ingresados</td>
                      </tr>

                  @endforelse
                  </tbody>

              </table>
              <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
            {{ $productos->links('pagination::bootstrap-4') }}
        </div>
             </div>
        </div>
    </div>
    
@endsection
