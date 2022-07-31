@extends('Layouts.Layouts')

@section('content')

<div class="card shadow mb-4 ">
  <div></div>
<div class="card-header py-3" style="background: #0d6efd">
                
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Editar Pedidos a <strong>{{$pedido->nombre_Cliente}}</strong></h2>
                </div>
                </div>
<br>

                <div class="container">
                <form action="{{ route( 'pedido.edit', ['id'=>$pedido->id]) }}" method="POST">
                @csrf
                @method ('put')
                <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="nombre_Cliente" class="form-label"><strong>Nombre del cliente: </strong></label>
                                <input type="text" class="form-control" id="nombre_Cliente" name="nombre_Cliente" 
                                placeholder="Ingrese el nombre_Cliente" value="{{$pedido->nombre_Cliente}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="telefon_Cliente" class="form-label"><strong>Telefono del cliente: </strong></label>
                                <input type="text" class="form-control" id="telefon_Cliente" name="telefon_Cliente"
                                 placeholder="Ingrese Telefono del cliente" value="{{$pedido->telefon_Cliente}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="ciudad" class="form-label"><strong>Ciudad: </strong></label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad"
                                 placeholder="Ingrese la ciudad" value="{{$pedido->ciudad}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="fecha_de_orden" class="form-label"><strong>Fecha del Orden: </strong></label>
                                <input type="text" class="form-control" id="fecha_de_orden" name="fecha_de_orden" 
                                placeholder="Ingrese la fecha de orden" value="{{$pedido->fecha_de_orden}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="estado_Pedido" class="form-label"><strong>Estado del pedido: </strong></label>
                                <input type="text" class="form-control" id="estado_Pedido" name="estado_Pedido" 
                                placeholder="Estado del pedido" value="{{$pedido->estado_Pedido}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              <div class="col-sm-6">
                                <label for="detalle_Pedido" class="form-label"><strong>Detalle del pedido: </strong></label>
                                <input type="text" class="form-control" id="detalle_Pedido" name="detalle_Pedido"
                                 placeholder="Ingrese el detalle del pedido" value="{{$pedido->detalle_Pedido}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="total_Pedido" class="form-label"><strong>Total del pedido: </strong></label>
                                <input type="text" class="form-control" id="total_Pedido" name="total_Pedido"
                                 placeholder="Total del pedido" value="{{$pedido->total_Pedido}}" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              </div>            
                          </div>

                          <br>
                        
                          <div style="float:center">
                          
                              <a class="btn btn-dark" href="/pedidos">Volver</a>
                              
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>

                          </form>
                </div>
                <br>
                
</div>
         
@endsection