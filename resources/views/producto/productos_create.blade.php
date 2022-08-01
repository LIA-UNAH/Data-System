@extends('Layouts.Layouts')
@section('content')
<script  type="text/javascript" src="{{ asset('/imagen.js') }}"></script>

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
                                        <label for="firstName" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre:" value="" required>
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
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion" value="" required>
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
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el código" value="" required>
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
                                <input type="number" class="form-control" id="existencia" name="existencia" placeholder="Ingrese la existencia" value="" >
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
                                <input type="text" class="form-control" id="prec_compra" name="prec_compra" placeholder="Ingrese el precio de compra" value="" required>
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
                                <input type="text" class="form-control" id="prec_venta" name="prec_venta" placeholder="Ingrese el precio de venta mayorista" value="" required>
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
                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese la categoría" value="" required>
                                @error('categoria')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> 
                              <!-- <div class="col-sm-6">
                                <label for="firstName" class="form-label">Impuesto:</label>
                                <input type="text" class="form-control" id="impuesto" name="impuesto" placeholder="Ingrese el impuesto" value="" required>
                                @error('impuesto')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                                <div class="invalid-feedback">
                                  Valid first name is required.
                                </div>
                              </div> -->
                              
                              
                              <div class="col-sm-6">
                              <label class="form-label" for="customFile">Agregar Imagen:</label>
                              <input type="file" class="form-control" id="imagen_producto" name="imagen_producto"/>
                              @error('imagen_producto')
                                    <small class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </small>
                                    @enderror
                               </div>

                               <div class="col-sm-6" id="imagenSeleccionada" style="max-height: 300px;">
                                <!-- <img id="imagenSeleccionada" src="" alt="" style="max-height: 300px;"> -->
                              </div>

                              </div>            
                          </div>

                          <br>
                          
                          <div style="float:center">
                          
                              <a class="btn btn-dark" href="/productos">Volver</a>
                              
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                          <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
                          </form>
                          </div>
                          <br>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
<script>
  $(Document).ready(function (e){
    $('#imagen_producto').change(function(){
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagenSeleccionada').attr('src', e.target.result);
      }
      reader.reeadAsDataURL(this.files[0]);
    });
  });
</script> -->

<!-- <script type="text/javascript">
    (function(){
      function filePreview(input){
        if(input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
          $('#mostrarImagen').html("<img src='"+e.target.result+"' />");
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $('#imagen_producto').change(function(){
      filePreview(this);
    });
  })(); 
  

  </script>-->
@endsection
