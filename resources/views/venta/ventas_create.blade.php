@extends('Layouts.Layouts')
@section('content')

<h1 style="text-align:center">LISTA DE PRODUCTOS</h1>

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

        

                  
        <!--------EMPIEZA LA TABLA ---------------->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
            <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Anadir</th>
                <th><i class="fa fa-exclamation-circle" aria-hidden=""></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse($productos as $i=>  $product)
                <tr>
                <td scope="row">{{++$i}}</td>
                    <td scope="row">{{$product->nombre}}</td>
                    <td>{{ $product->prec_venta}}</td>
                    <td>{{ $product->existencia}}</td>
                    <td>{{ $product->total}}</td>

                    <td>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="">Anadir</a>
            
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay productos ingresados</td>
                </tr>

            @endforelse
            </tbody>

        </table>

        <!--------------------------------------------------->
        <!-- Modal PARA CREAR UN NUEVO PRODUCTO -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">ANIADIR PRODUCTO</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('productos.store')}}" method="POST">
                            @csrf
                        <div class="modal-body">
                      <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nombre del empleado:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="" required>
                                    <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nombre del cliente:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="" required>
                                    <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombre producto:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de producto" value="" required>
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
                                <label for="firstName" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="prec_compra" name="prec_compra" placeholder="Ingrese el precio de compra" value="" required>
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

                          
                          <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA ANIADIR PRODUCTO A LA VENTA-->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <!-----<button type="submit" class="btn btn-primary">Guardar</button>-->
                              
                          </div>

                          </form>
                          </div>
                      </div>
                    </div>
    </div>

@endsection

