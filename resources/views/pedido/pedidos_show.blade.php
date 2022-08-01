@extends('Layouts.Layouts')
@section('content')

<div class="card shadow mb-4 ">
  <div></div>
<div class="card-header py-3" style="background: #0d6efd">
                
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Detalle del Pedidos de <strong>{{$pedido->nombre_Cliente}}</strong></h2>
                  </div>
                  <a class="btn btn-success" href="{{ route('pedido.edit', ['id' => $pedido->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                </div>
<br>

                <div class="container">
                <form action="" method="">
                <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="nombre_Cliente" class="form-label"><strong>Cliente:</strong></label>
                                <td>{{$pedido->nombre_Cliente}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="telefono_Cliente" class="form-label"><strong>Telefono del cliente:</strong></label>
                                <td>{{$pedido->telefon_Cliente}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="ciudad" class="form-label"><strong>Ciudad:</strong></label>
                                <td>{{$pedido->ciudad}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="fecha_de_orden" class="form-label"><strong>Fecha de orden:</strong></label>
                                <td>{{$pedido->fecha_de_orden}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="estado_Pedido" class="form-label"><strong>Estado pedido:</strong></label>
                                <td>{{$pedido->estado_Pedido}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              <div class="col-sm-6">
                                <label for="detalle_Pedido" class="form-label"><strong>Detalle pedido:</strong></label>
                                <td>{{$pedido->detalle_Pedido}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="total_Pedido" class="form-label"><strong>Total pedido:</strong></label>
                                <td> {{$pedido->total_Pedido}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                               
                              
                              </div>            
                          </div>

                          <br>
                        
                          <div style="float:center">
                          
                              <a class="btn btn-dark" href="/pedidos">Volver</a>                   
            
                          </div>

                          </form>
                </div>
                <br>
                
</div>

@endsection