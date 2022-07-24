@extends('Layouts.Layouts')
@section('content')
<div class="card shadow mb-4 ">
  <div></div>
<div class="card-header py-3" style="background: #0d6efd; border-radius:5px 5px 0 0;">
                
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Añadir Nuevo Producto</h2>
                </div>
                </div>
<br>
<div class="container">
<form action="{{ route('productos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Código:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el código" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Existencia:</label>
                                <input type="number" class="form-control" id="existencia" name="existencia" placeholder="Ingrese la existencia" value="" >
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Precio de venta:</label>
                                <input type="number" class="form-control" id="prec_venta" name="prec_venta" placeholder="Ingrese el precio de venta" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Categoría:</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese la categoría" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Impuesto:</label>
                                <input type="text" class="form-control" id="impuesto" name="impuesto" placeholder="Ingrese el impuesto" value="" required>
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div>
                              
                              
                              <div class="col-sm-6">
                              <label class="form-label" for="customFile">Agregar Imagen:</label>
                              <input type="file" class="form-control" id="imagen_producto" name="imagen_producto"/>
                               </div>

                               <div class="col-sm-6">
                                <img id="imagen_seleccionada" src="" alt="" style="max-height: 300px;">
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
<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(Document).ready(function (e){
    $('#imagen').change(function(){
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagen_seleccionada').attr('src', e.target.result);
      }
      reader.reeadAsDataURL(this.files[0]);
    });
  });
</script>
@endsection
