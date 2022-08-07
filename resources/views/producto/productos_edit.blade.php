@extends('Layouts.Layouts')
@section('content')
    <div class="card shadow mb-4 ">
        <div></div>
        <div class="card-header py-3" style="background: #0d6efd; border-radius:5px 5px 0 0;">

            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar producto</h2>
            </div>
        </div>
        <br>
        <div class="container">
            <form action="{{ route( 'productos.edit', ['id'=>$producto->id]) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method ('put')
                <div class="modal-body" style="font-family: 'Nunito', sans-serif; font-size: small; padding: 10px">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="prec_compra" class="form-label">Precio de compra:</label>
                                    <input type="text" class="form-control @error('prec_compra') is-invalid @enderror"
                                           id="prec_compra"
                                           name="prec_compra" value="{{old('prec_compra', $producto->prec_compra)}}"
                                           required
                                           autocomplete="prec_compra"
                                           autofocus maxlength="10"
                                           onkeypress="return funcionLempiras(event);">
                                    @error('prec_compra')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="prec_venta_may" class="form-label">Precio de venta (mayor):</label>
                                    <input type="text"
                                           class="form-control @error('prec_venta_may') is-invalid @enderror"
                                           id="prec_venta_may"
                                           name="prec_venta_may"
                                           value="{{old('prec_venta_may', $producto->prec_venta_may)}}" required
                                           autocomplete="prec_venta_may"
                                           autofocus maxlength="10"
                                           onkeypress="return funcionLempiras(event);">
                                    @error('prec_venta_may')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="prec_venta_fin" class="form-label">Precio de venta (detalle):</label>
                                    <input type="text"
                                           class="form-control @error('prec_venta_fin') is-invalid @enderror"
                                           id="prec_venta_fin"
                                           name="prec_venta_fin"
                                           value="{{old('prec_venta_fin', $producto->prec_venta_fin)}}" required
                                           autocomplete="prec_venta_fin"
                                           autofocus maxlength="10"
                                           onkeypress="return funcionLempiras(event);">
                                    @error('prec_venta_fin')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="existencia" class="form-label">Existencia:</label>
                                    <input type="text" class="form-control @error('existencia') is-invalid @enderror"
                                           id="existencia"
                                           name="existencia" value="{{old('existencia', $producto->existencia)}}"
                                           required
                                           autocomplete="existencia"
                                           autofocus maxlength="7"
                                           onkeypress="return funcionLempiras(event);">
                                    @error('existencia')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="codigo" class="form-label">Código:</label>
                                    <input type="text" class="form-control @error('codigo') is-invalid @enderror"
                                           id="codigo"
                                           name="codigo" value="{{old('codigo', $producto->codigo)}}"
                                           required autocomplete="codigo"
                                           autofocus minlength="15" maxlength="15" style="text-transform: uppercase">
                                    @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="id_categoria" class="form-label">Categoria:</label>
                                    <select class="form-control @error('id_categoria') is-invalid @enderror"
                                            id="id_categoria"
                                            required autocomplete="id_categoria" name="id_categoria"
                                            autofocus>
                                        <option value=""></option>
                                        @foreach ($categorias as $categoria)
                                            <option @if ($producto->id_categoria == $categoria['id'])
                                                        selected
                                                    @endif
                                                    value="{{$categoria['id']}}">{{$categoria['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_categoria')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="descripcion" class="form-label">Descripción:</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                              id="descripcion"
                                              name="descripcion" required
                                              autofocus placeholder=""
                                              minlength="5" maxlength="255" rows="3">@if(old("descripcion"))
                                            {{old("descripcion")}}
                                        @else
                                            {{$producto->descripcion}}
                                        @endif</textarea>
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label class="form-label" for="imagen_producto">Imagen:</label>
                                    <input type="file" accept="image/*"
                                           class="form-control @error('imagen_producto') is-invalid @enderror" id="imagen_producto"
                                           name="imagen_producto" value="{{ old('imagen_producto') }}" autocomplete="imagen_producto"
                                           autofocus placeholder="{{ __('imagen_producto') }}" onchange="mostrar()">
                                    @error('imagen_producto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="marca" class="form-label">Marca:</label>
                                    <input type="text" class="form-control @error('marca') is-invalid @enderror"
                                           id="marca"
                                           name="marca" value="{{old('marca', $producto->marca)}}" required
                                           autocomplete="marca"
                                           autofocus minlength="5" maxlength="40">
                                    @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 6px">
                                    <label for="modelo" class="form-label">Modelo:</label>
                                    <input type="text" class="form-control @error('modelo') is-invalid @enderror"
                                           id="modelo"
                                           name="modelo" value="{{old('modelo', $producto->modelo)}}" required
                                           autocomplete="modelo"
                                           autofocus minlength="0" maxlength="40">
                                    @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12 mb-3 mb-sm-0"
                                 style="display: flex; align-items: center; justify-content: center;padding: 10px">
                                <div class="col-lg-7 d-none d-lg-block">
                                    <div class="text-center">
                                        <img id="imagen" src="/images/products/{{ $producto->imagen_producto }}"
                                             class="img-fluid rounded" width="430" height="430">
                                    </div>

                                    <div class="form-group row" style="margin-top: 15px">
                                        <div class="col-sm-6">
                                            <a href="/productos"
                                               style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                               class="btn btn-google btn-user btn-block">
                                                {{ __('Regresar') }}
                                            </a>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit"
                                                    style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                                                    class="btn btn-primary btn-user btn-block">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
            </form>
        </div>
        <br>
    </div>
@endsection
@push('scripsss')
    <script>
        function funcionLempiras(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 46) {
                return true;
            } else if (code >= 48 && code <= 57) {
                return true;
            } else {
                return false;
            }
        }

        function mostrar() {
            if (document.getElementById("imagen_producto").files.length <= 0) return;

            var archivo = document.getElementById("imagen_producto").files[0];

            if (archivo.size > 1000000) {
                const tamanioEnMb = 1000000 / 1000000;
                alert(`El tamaño máximo es ${tamanioEnMb} MB`);

                document.getElementById("imagen_producto").value = "";
            } else {

                var reader = new FileReader();
                if (archivo) {
                    reader.readAsDataURL(archivo);
                    reader.onloadend = function () {
                        document.getElementById("imagen").src = reader.result;
                    }
                }
            }
        }
    </script>
@endpush
