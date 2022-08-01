@extends('Layouts.Layouts')
@section('content')


   

<div class="card shadow mb-4 ">
  <div></div>
<div class="card-header py-3" style="background: #0d6efd">
                
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Editar Productos</h2>
                </div>
                </div>
<br>

                <div class="container">
                <form action="{{ route( 'producto.edit', ['id'=>$producto->id]) }}" method="POST">
                @csrf
                @method ('put')
                <div class="modal-body">
                      <div class="row g-3">
                     
                      <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                placeholder="Ingrese el nombre" value="{{$producto->nombre}}" required>
                                @error('nombre')
                                            <small class="text-danger" >
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                            @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" 
                                placeholder="Ingrese la descripcion" value="{{$producto->descripcion}}" required>
                                @error('descripcion')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Código:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo"
                                 placeholder="Ingrese el código" value="{{$producto->codigo}}" required>
                                 @error('codigo')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                 <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Existencia:</label>
                                <input type="number" class="form-control" id="existencia" name="existencia"
                                 placeholder="Ingrese la existencia" value="{{$producto->existencia}}" >
                                 @error('existencia')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                 <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio de compra:</label>
                                <input type="number" class="form-control" id="prec_compra" name="prec_compra" 
                                placeholder="Ingrese el precio de compra" value="{{$producto->prec_compra}}" required>
                                @error('prec_compra')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio de venta mayorista:</label>
                                <input type="number" class="form-control" id="prec_venta" name="prec_venta" 
                                placeholder="Ingrese el precio de venta mayorista" value="{{$producto->prec_venta}}" required>
                                @error('prec_venta')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                                </div>
                                  <div class="col-sm-6">
                                <label for="firstName" class="form-label">Categoría:</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" 
                                placeholder="Ingrese la categoría" value="{{$producto->categoria}}" required>
                                @error('categoria')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 

                              <div class="col-sm-6">
                              <label class="form-label" for="customFile">Agregar Imagen:</label>
                              <input type="file" class="form-control" id="imagen_producto" name="imagen_producto" 
                              values="{{$producto->imagen_producto}}" required>
                              @error('imagen_producto')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                               </div>

                               <div class="col-sm-6" id="imagenSeleccionada" style="max-height: 300px;">
                              </div>                   
                              </div>            
                          </div>

                          <br>
                        
                          <div style="float:center">
                          
                              <a class="btn btn-dark" href="/productos">Volver</a>
                              
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>

                          </form>
                </div>
                <br>
                
</div>
                          

@endsection
