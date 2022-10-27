<div>
    <!-- CSS Factura -->
    <link href={{ asset("css/verFactura.css") }} rel="stylesheet" type="text/css">
    


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    
    <form>
        @csrf

        <div class="modal-body" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
            <div class="page-content container-fluid">
                <div class="page-header text-blue-d2">
                    <h5 class="text-secondary-d1">Factura: <strong>{{$this->data["numero_factura_venta"]}}</strong></h5>
                    <input name="usuario_id" value="{{Auth::user()->id}}" type="number" readonly hidden>
                </div>

                <div class="container px-0">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <!-- Nombre del cliente -->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="cliente_id" class="text-secondary-d1"><strong>Nombre del cliente:</strong></label>
                                    <select 
                                        wire:model="data.cliente_id"
                                        class="form-control @error('data.cliente_id') is-invalid @enderror"
                                        id="cliente_id"
                                        required autocomplete="cliente_id" name="cliente_id" autofocus>
                                        <option value="">Seleccione el cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{$cliente->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('data.cliente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Tipo de cliente -->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="tipo_cliente_factura" class="text-secondary-d1"><strong>Tipo de cliente:</strong></label>
                                    <select 
                                        wire:model="data.tipo_cliente_factura"
                                        class="form-control @error('data.tipo_cliente_factura') is-invalid @enderror"
                                        required autocomplete="tipo_cliente_factura" name="tipo_cliente_factura" autofocus>
                                        <option value="">Seleccione el tipo de cliente</option>
                                        <option value="consumidor_final">Consumidor Final</option>
                                        <option value="mayorista">Mayorista</option>
                                    </select>
                                    @error('data.tipo_cliente_factura')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <!-- Teléfono del cliente -->
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="celular_cliente" class="text-secondary-d1"><strong>Teléfono del
                                            cliente:</strong></label>
                                    <input 
                                        type="text"
                                        class="form-control @error('celular_cliente') is-invalid @enderror"
                                        id="celular_cliente"
                                        name="celular_cliente" value="{{ $this->tel }}" required
                                        autocomplete="celular_cliente"
                                        autofocus readonly
                                        style="background-color: white">
                                    @error('celular_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Nombre del vendedor -->
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label class="text-secondary-d1"><strong>Nombre del vendedor:</strong></label>
                                    <input 
                                        wire:model="data.username"
                                        type="text" class="form-control"
                                        required
                                        autofocus readonly
                                        style="background-color: white" >
                                </div>

                                <!-- Fecha de venta -->
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="current_date" class="text-secondary-d1"><strong>Fecha:</strong></label>
                                    <input 
                                        wire:model="data.fecha_factura"
                                        type="date" class="form-control @error('current_date') is-invalid @enderror"
                                        id="current_date"
                                        name="current_date" 
                                        required
                                        autocomplete="current_date"
                                        autofocus readonly
                                        style="background-color: white">
                                    @error('data.fecha_factura')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="input-group">
                                        <input type="text" name="buscar_producto" id="buscar_producto" wire:model="filtro_producto"
                                                class="form-control border-0 small" placeholder="Buscar producto"
                                                aria-label="Search" aria-describedby="basic-addon2" style=""  onkeyup="filtrar_productos()">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <!-- Catalogo de Productos -->
                                    <div class="table-responsive" style=" height: 400px; overflow:scroll;  float:left; ">
                                        <section class="NovidadesSection">

                                            <div class="producto" id="producto"
                                                    style="display: grid; grid-template-columns: 140px 140px 140px 140px;">

                                                @foreach($productos as $pro)
                                                    <div class="agregar-factura" x-data="{ open: true }"
                                                            style="display:block;  height: 170px; width: 140px; padding: 3px ">
                                                        <div class="card h-100 btn" data-id="{{$pro->id}}"  wire:click="agregar_item_carrito({{$pro}})">
                                                            <!-- Cantidad en existencia -->
                                                            <div class="badge bg-dark text-white position-absolute"
                                                                    style="top: 0.5rem; right: 0.5rem">
                                                                {{$pro->existencia}} unidades
                                                            </div>
                                                            <!-- Imagen del producto-->
                                                            <img class="card-img-top"
                                                                    src="/images/products/{{$pro->imagen_producto}}"
                                                                    width="00px"
                                                                    height="80px" alt="..."/>
                                                            <div class="" style="text-align:center ;">
                                                                <div class="text-center">
                                                                    <!-- Nombre del producto -->
                                                                    <p class="nombre" id="nombre">
                                                                        <strong style="font-size: 12px">{{$pro->marca." ".$pro->modelo}}</strong>
                                                                    </p>
                                                                    <!-- Precio del producto-->
                                                                    <div class="p">
                                                                        <span id="pre" class="pre text-muted text-decoration-line">
                                                                            <strong style="font-size: 15px"> L.{{$pro->prec_venta_fin}}</strong>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </section>
                                    </div>

                                </div>

                                <div class="col-sm-5 mb-3 mb-sm-0" style="padding: 3px">
                                    <div class="table-responsive" style=" height: 400px; overflow:scroll;  float:left; ">
                                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                            <thead class="bg-none bgc-default-tp1">
                                            <tr class="text-white">
                                                <th colspan="3">Detalle</th>
                                                <th width="140">Cantidad</th>
                                                <th width="140">P/U</th>
                                                <th width="140">Total</th>
                                                <th width="140">Quitar</th>
                                            </tr>
                                            </thead>

                                            <tbody id="content-fac" class="content-fac">
                                                @forelse ($carrito as $index => $item )
                                                    <tr>
                                                        <td colspan="3" class="titulo">{{$item["detalle"]}}</td>
                                                        <td>
                                                            <input type="number" min="1" style ="width: 40px;" value="{{$item["cantidad_detalle_venta"]}}" wire:change="actualizar_total($event.target.value, {{ $index}})" class="input_Element"></input>
                                                        </td>
                                                        <td  width="140">{{$item["precio_venta"]}}</td>
                                                        <td  width="140">L. {{$item["total"]}}</td>
                            
                                                        <td width="140">
                                                            <a class="borrar-producto fas fa-times-circle" wire:click.prevent="eliminar_item_carrito({{$index}})"></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    
                                                @endforelse
                                            </tbody>
                                            <input type="text" name="tuplas" hidden>
                                        </table>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                Realizar Pago imediato de factura
                                            </div>
                                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                                                <div class=" row my-2 align-items-center bgc-primary-l3 p-2">
                                                    <div class="total">
                                                        Total: L {{ $this->total }}
                                                    </div>
                                                    <div class="col-5">
                                                        <span class="text-150 text-success-d3 opacity-2"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <hr/>

                                        <div class="d-flex flex-row justify-content-center" style="float:left;">

                                            <input type="text" name="pagado" hidden>

                                            <a 
                                                ref="#" 
                                                wire:click.prevent="guardar({{ true }})"
                                                class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0 mr-2">
                                                Guardar y Pagar
                                            </a>

                                            <a 
                                                href="#" 
                                                wire:click.prevent="guardar"
                                                class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0 mr-2">
                                                Guardar
                                            </a>

                                            <a href="/ventas"
                                                class="btn btn-danger btn-bold px-4 float-right mt-2 mt-lg-0 mr-2">Cancelar</a>

                                        </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
