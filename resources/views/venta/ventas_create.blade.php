@extends('Layouts.Layouts')
@section('content')

<div>

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
                 <!-- HU8 - Buscar y recargar producto -->
              
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
                       <!-- HU8 - Buscar y recargar usuario -->
            </div>

            
              
            </div>
        </div>

    <!--------EMPIEZA LA TABLA ---------------->
    <div class="card-body">
        <div class="table-responsive">
                  <table class="table table" id="dataTable" width="100%" >
                      <thead class="card-header py-3" style="background: #1a202c; color:white">
                        <tr>
                          <th>N°</th>
                          <th>Codigo</th>
                          <th>Descripcion</th>
                          <th>Precio</th>
                          <th>Existencia</th>
                          <th>Categoria</th>
                          
                          <th>Anadir</th>
                        </tr>
                  </thead>
                  <tbody>
                  @forelse($productos as $i=>  $product)
                      <tr>
                          <td scope="row">{{++$i}}</td>
                          <td>{{ $product->codigo}}</td>
                          <td scope="row">{{$product->descripcion}}</td>
                          <td>{{ $product->prec_venta}}</td>
                          <td>{{ $product->existencia}}</td>
                          <td>{{ $product->categoria}}</td>
                          <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="">Anadir</a></td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="4">No hay productos ingresados</td>
                      </tr>

                  @endforelse
              
                  </tbody>

          </table>
         </div>
    </div>

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
                            
                          </div>
                          <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre producto:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{ $product->descripcion}}" disabled>
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
                            <label for="firstName" class="form-label">Precio Unitario:</label>
                            <input type="number" class="form-control" id="prec_compra" name="prec_compra" placeholder="" value="{{ $product->prec_venta}}" disabled>
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


    
    
@endsection


