@extends('Layouts.Layouts')
@section('title', 'Compras')
@section('content')

    <div class="card shadow mb-4" >
        <div class="card-header py-2" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-bold" style="color: white">Crear Compra</h2>
            </div>

            <div style="float: right">
                <form action="{{ route('compras.destroy', $compra->id) }}" id='form_eliminar' method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                class="btn btn-google btn-user btn-block">
                                {{ __('Eliminar') }}
                        </button>
                </form>
            </div>


        </div>

        <div class="card-body" style="font-family: 'Nunito', sans-serif; font-size: small">
            <!-- Nested Row within Card Body -->
            <div class="row" id="tblaBody">
                <div class="col-lg-5 d-lg-block">
                    <form method="POST" class="user" action="{{route("compras.guardar_compra")}}" >
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="compra_id" id="compra_id" value="{{ $compra->id }}" hidden>
                                <label for="docummento_compra">Factura:</label>
                                <input type="text" class="form-control @error('docummento_compra') is-invalid @enderror" id="docummento_compra"
                                       name="docummento_compra" value="CP{{Carbon\Carbon::now()->format('Ymdhms')}}" required autocomplete="docummento_compra"
                                       autofocus placeholder="{{ __('') }}"
                                       style="text-transform: uppercase; background-color: white" readonly>
                                @error('docummento_compra')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="fecha_compra">Fecha:</label>
                                <input type="date" class="form-control @error('fecha_compra') is-invalid @enderror"
                                       id="fecha_compra"
                                       name="fecha_compra" value="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                                       required
                                       autocomplete="fecha_compra"
                                       autofocus readonly
                                       style="background-color: white">
                                @error('fecha_compra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="proveedor_id">Proveedor:</label>
                                    <select class="form-control @error('proveedor_id') is-invalid @enderror"  id="proveedor_id"
                                            required autocomplete="proveedor_id" name="proveedor_id"
                                            autofocus>
                                            <option value="">Seleccione el proveedor</option>
                                            @forelse ($provedores as $provedore)
                                              <option value="{{ $provedore->id }}">{{ $provedore->nombre_proveedor }}</option>
                                            @empty
                                              <option value="0">Proveedor</option>
                                            @endforelse
                                    </select>
                                    @error('proveedor_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-0">
                            <textarea class="form-control @error('descripcion_compra') is-invalid @enderror"
                                      id="descripcion_compra"
                                      name="descripcion_compra"  required autofocus
                                      minlength="3" maxlength="250" rows="3">{{ old('descripcion_compra') }}</textarea>
                            @error('descripcion_compra')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row" style="margin-top: 15px">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <button type="submit" style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                        class="btn btn-primary btn-user btn-block">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                            <div class="col-sm-5">
                                <a href="{{ route('compras.index') }}" style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                   class="btn btn-google btn-user btn-block">
                                    {{ __('Regresar') }}
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                data-toggle="modal" data-target="#modal_agregar_detalle" class="btn btn-google btn-user btn-block">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <div class="table-responsive" id="tblaBody">
                        <table class="table table" id="dataTable">
                            <thead class="card-header py-3" style="background: #1a202c; color: white">
                            <tr>
                                <th>N°</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $sum = 0;
                            @endphp
                                    @forelse($compra->detalle_compra as $i => $detalle)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>{{ $detalle->producto->marca}} - {{ $detalle->producto->modelo}} </td>
                                        <td scope="row">{{ $detalle->cantidad_detalle_compra }}</td>
                                        <td scope="row">L {{ number_format($detalle->precio, 2, ".", ",") }}</td>
                                        <td scope="row">L {{ number_format($detalle->precio*$detalle->cantidad_detalle_compra, 2, ".", ",") }}</td>
                                    </tr>
                                    @php
                                        $sum += $detalle->precio*$detalle->cantidad_detalle_compra;
                                    @endphp
                                    @empty
                                        <tr>
                                            <td colspan="8">No hay Detalles</td>
                                        </tr>
                                    @endforelse
                            </tbody>
                            <tfoot>
                                <td scope="row"></td>
                                <td scope="row"></td>
                                <td></td>
                                <td scope="row">Total</td>
                                <td scope="row">L {{ number_format($sum, 2, ".", ",") }}</td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>


<div class="modal fade" id="modal_agregar_detalle" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
               <button type="button" class="btn-close" data-dismiss="modal"
                       aria-label="Close"></button>
           </div>

           <form action="{{ route('compras.store') }}" method="POST">
               @csrf
               <div class="modal-body">
                   <div class="row g-3">
                        <input type="text" name="compra_id" id="compra_id" value="{{ $compra->id }}" hidden>
                       <div class="col-sm-12">
                           <label for="producto_id" class="form-label">Producto:</label>
                           <select class="form-control @error('producto_id') is-invalid @enderror"
                                   id="producto_id"
                                   required autocomplete="producto_id" name="producto_id" autofocus onchange="funcionObtenerCosto()">
                               <option value="">Seleccione el producto</option>
                               @foreach ($productos as $producto)
                                   <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>{{$producto['name']}} {{$producto['marca']}} - {{$producto['modelo']}}</option>
                               @endforeach
                           </select>
                           @error('producto_id')
                           <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                       </div>

                       <div class="col-sm-6">
                           <label for="precio" class="text-secondary-d1"><strong>Precio:</strong></label>
                           <input type="text"
                                  class="form-control @error('precio') is-invalid @enderror"
                                  id="precio"
                                  name="precio" value="{{ old('precio') }}" required
                                  autocomplete="precio"
                                  autofocus readonly
                                  style="background-color: white">
                           @error('precio')
                           <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror


                       </div>
                       <div class="col-sm-6">
                           <label for="firstName" class="form-label">Cantidad:</label>
                           <input type="number" class="form-control" id="cantidad_detalle_compra"
                                  name="cantidad_detalle_compra" value="" required>

                       </div>
                   </div>
               </div>

               <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO-->
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary"
                           data-dismiss="modal">Cancelar
                   </button>
                   <button type="submit" class="btn btn-primary">Guardar</button>
               </div>

           </form>
       </div>
   </div>
</div>

<script>
    function funcionObtenerCosto(){
        var select = document.getElementById("producto_id");
        var valor = select.value;

        @foreach ($productos as $producto)
        if(valor == {{$producto->id}}){
            var input = document.getElementById("precio");
            input.value = "{{$producto->prec_compra}}";
        }
        @endforeach
    }
</script>

@endsection
