@extends('Layouts.Layouts')
@section('content')


   


                <div class="container">
                <form action="{{ route( 'producto.edit', ['id'=>$producto->id]) }}" method="POST">
                @csrf
                @method ('put')
                <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" 
                                placeholder="Ingrese la descripcion" value="{{$producto->descripcion}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Código:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo"
                                 placeholder="Ingrese el código" value="{{$producto->codigo}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Existencia:</label>
                                <input type="number" class="form-control" id="existencia" name="existencia"
                                 placeholder="Ingrese la existencia" value="{{$producto->existencia}}" >
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio de venta:</label>
                                <input type="number" class="form-control" id="prec_venta" name="prec_venta" 
                                placeholder="Ingrese el precio de venta" value="{{$producto->prec_venta}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Categoría:</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" 
                                placeholder="Ingrese la categoría" value="{{$producto->categoria}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Impuesto:</label>
                                <input type="text" class="form-control" id="impuesto" name="impuesto"
                                 placeholder="Ingrese el impuesto" value="{{$producto->impuesto}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
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
                          

@endsection
