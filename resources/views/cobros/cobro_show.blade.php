@extends('Layouts.Layouts')
@section('content')

<div class="card shadow mb-4 ">
  <div></div>
<div class="card-header py-3" style="background: #0d6efd">
                
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Detalle del cobro a nombre de: <strong>{{$cobro->nombre_cliente}}</strong></h2>
                  </div>
                </div>
<br>
<br>

                <div class="container">
                <form action="" method="">
                <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="nombre_cliente" class="form-label"><strong>Cliente:</strong></label>
                                <td>{{$cobro->nombre_cliente}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="identidad" class="form-label"><strong>Identidad:</strong></label>
                                <td>{{$cobro->identidad}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="numTelefono" class="form-label"><strong>Numero de telefono:</strong></label>
                                <td>{{$cobro->numTelefono}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="estado" class="form-label"><strong>Estado:</strong></label>
                                <td>{{$cobro->estado}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="fecha" class="form-label"><strong>Fecha:</strong></label>
                                <td>{{$cobro->fecha}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              <div class="col-sm-6">
                                <label for="detalle_Pedido" class="form-label"><strong>Fecha limite:</strong></label>
                                <td>{{$cobro->fecha_limite}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="venta" class="form-label"><strong>Venta:</strong></label>
                                <td> {{$cobro->venta}}</td>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                               
                              
                              </div>            
                          </div>

                          <br>
                        
                          <div style="float:center">
                          
                              <a class="btn btn-dark" href="/cobros">Volver</a>       


                          </div>
                        <br>
                          </form>
                </div>
                <br>
                
</div>

@endsection