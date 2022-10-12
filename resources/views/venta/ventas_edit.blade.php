@extends('Layouts.Layouts')
@section('content')
    <style>
        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 100;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <form action="{{ route('ventas.update', $venta->id) }}" id="formulario_ventas" name="formulario_ventas" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body" style="font-family: 'Nunito', sans-serif; font-size: small; padding-top: 10px">
            <div class="page-content container-fluid">
                <div class="page-header text-blue-d2">
                    <h5 class="text-secondary-d1">Factura: 001-001-00-00000001</strong></h5>
                    <input name="numero_factura" value="" type="text" readonly hidden>
                    <input name="usuario_id" value="{{Auth::user()->id}}" type="number" readonly hidden>
                </div>

                <div class="container px-0">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <!-- Nombre del cliente -->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="cliente_id" class="text-secondary-d1"><strong>Nombre del cliente:</strong></label>
                                    <select class="form-control @error('cliente_id') is-invalid @enderror"
                                            id="cliente_id"
                                            required autocomplete="cliente_id" name="cliente_id" autofocus onchange="funcionObtenerTel()">
                                        <option value="{{$venta->cliente->name}}">{{$venta->cliente->name}}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ old('cliente_id') == $user->id ? 'selected' : '' }}>{{$user['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <!-- Tipo de cliente -->
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="tipo_cliente" class="text-secondary-d1"><strong>Tipo de cliente:</strong></label>
                                    <select class="form-control @error('tipo_cliente') is-invalid @enderror"
                                            id="tipo_cliente"
                                            required autocomplete="tipo_cliente" name="tipo_cliente" autofocus>
                                        <option value="{{$venta->tipo_cliente_factura}}" style="display: none">{{$venta->tipo_cliente_factura == "consumidor_final" ? "Consumidor Final" : "Mayorista"}}</option>
                                        <option value="consumidor_final" @if (old('tipo_cliente') == "consumidor_final") {{ 'selected' }} @endif>Consumidor Final</option>
                                        <option value="mayorista" @if (old('tipo_cliente') == "mayorista") {{ 'selected' }} @endif>Mayorista</option>
                                    </select>
                                    @error('tipo_cliente')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <!-- Teléfono del cliente -->
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="celular_cliente" class="text-secondary-d1"><strong>Teléfono del
                                            cliente:</strong></label>
                                    <input type="text"
                                           class="form-control @error('celular_cliente') is-invalid @enderror"
                                           id="celular_cliente"
                                           name="celular_cliente" value="{{ $venta->cliente->telephone }}" required
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
                                    <input type="text" class="form-control"
                                           value="{{ $venta->user->name }}" required
                                           autofocus readonly
                                           style="background-color: white" >
                                </div>

                                <!-- Fecha de venta -->
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="current_date" class="text-secondary-d1"><strong>Fecha:</strong></label>
                                    <input type="date" class="form-control @error('current_date') is-invalid @enderror"
                                           id="current_date"
                                           name="current_date" value="{{$venta->fecha_factura}}"
                                           required
                                           autocomplete="current_date"
                                           autofocus readonly
                                           style="background-color: white">
                                    @error('current_date')
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
                                        <input type="text" name="buscar_producto" id="buscar_producto"
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
                                                    <div class="agregar-factura" id=""
                                                         style="display:block;  height: 170px; width: 140px; padding: 3px ">
                                                        <div class="card h-100 btn" data-id="{{$pro->id}}">
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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1" id="tabla_detalle">
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
                                                {{-- @foreach ($venta->detalle_venta as $item)
                                                    <tr>
                                                        <td colspan="3" class="titulo">{{$item->producto->marca}} {{$item->producto->modelo}}</td>
                                                        <td>
                                                            <input onchange="renderFactura()" type="number" min="1" style ="width :40px;" value ="{{$item->cantidad_detalle_venta}}" class="input_Element"></input>
                                                        </td>
                                                        <td  width="140">{{$item->precio_venta}}</td>
                                                        <td  width="140">L. {{($item->precio_venta * $item->cantidad_detalle_venta)}}</td>
                            
                                                        <td width="140">
                                                            <button type="button" class="borrar-producto fas fa-times-circle" onclick="deleteRow"></button>
                                                        </td>
                                                    </tr>
                                                @endforeach --}}
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
                                                        Total
                                                    </div>
                                                    <div class="col-5">
                                                        <span class="text-150 text-success-d3 opacity-2"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>

                                        <div class="d-flex flex-row justify-content-center">

                                            <input type="text" name="pagado" hidden>

                                            <a href="#" onclick="guardar_venta_pagada()"
                                               class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0 mr-2">Guardar y Pagar</a>

                                            <a href="#" onclick="guardar_venta()"
                                               class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0 mr-2">Guardar</a>

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
        </div>

    </form>
    <script>
        // function oninit(){
        //     console.log(@json($venta))
        //     cargar_detalle_venta()
        // }

        // oninit();

        // function cargar_detalle_venta(){
        //     tabla = document.getElementById("tabla_detalle");
        //     filas = [];

        //     @foreach (@json($venta->detalle_venta) as $item)
        //         fila = `
        //             <tr>
        //                 <td colspan="3" class="titulo">${@json($item->producto->marca)} ${@json($item->producto->modelo)}</td>
        //                 <td>
        //                     <input onchange="renderFactura()" type="number" min="1" style ="width :40px;" value ="${item.cantidad_detalle_venta}" class="input_Element"></input>
        //                 </td>
        //                 <td  width="140">${item.precio_venta}</td>
        //                 <td  width="140">L. ${($item.precio_venta * $item.cantidad_detalle_venta)}</td>
        //             </tr>`
        //         filas.append(fila);
        //     @endforeach
        //     // .forEach(item => {
                
        //     // });

        //     tabla.querySelector('tbody').append(filas);
        // }
        
        let productos = @json($productos);
        let busqueda = [];
        function filtrar_productos() {
            let textobusqueda = document.getElementById("buscar_producto").value;
            busqueda = [];
            productos.forEach(function(product){
                let texto = product.marca + " " + product.modelo;
                if(texto.toLowerCase().includes(textobusqueda.toLowerCase())){
                    busqueda.push(product);
                }
            });

            let contenedor = document.getElementById('producto');
            contenedor.innerHTML = '';

            busqueda.forEach(function(params) {

                let componente =  '<div class="agregar-factura" id="" \
                                    style="display:block;  height: 170px; width: 140px; padding: 3px">\
                                    <div class="card h-100 btn" data-id="'+params.id+'">\
                                                            <!-- Cantidad en existencia -->\
                                                            <div class="badge bg-dark text-white position-absolute"\
                                                                 style="top: 0.5rem; right: 0.5rem">\
                                                                 '+params.existencia+' unidades\
                                                            </div>\
                                                            <!-- Imagen del producto-->\
                                                            <img class="card-img-top"\
                                                                 src="/images/products/'+params.imagen_producto+'"\
                                                                 width="00px"\
                                                                 height="80px" alt="..."/>\
                                                            <div class="" style="text-align:center ;">\
                                                                <div class="text-center">\
                                                                    <!-- Nombre del producto -->\
                                                                    <p class="nombre" id="nombre">\
                                                                        <strong style="font-size: 12px">'+params.marca+' '+params.modelo+'</strong>\
                                                                    </p>\
                                                                    <!-- Precio del producto-->\
                                                                    <div class="p">\
                                                                        <span id="pre" class="pre text-muted text-decoration-line">\
                                                                            <strong style="font-size: 15px"> L. '+params.prec_venta_fin+'</strong>\
                                                                        </span>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div>';
                contenedor.innerHTML+=componente;

                const Clickbutton = document.querySelectorAll('.btn');

                Clickbutton.forEach(btn => {
                    btn.addEventListener('click', addFactura);
                });
            });



        }
        function buscar() {
            var impu_buscar = document.getElementById("buscar_producto");
            window.location.href = "{{ route('ventas.buscarpro') }}?buscar_producto=" + impu_buscar.value;
        }


        function guardar_venta() {
            var formul = document.getElementById("formulario_ventas")

            formul.submit();
        }

        function guardar_venta_pagada() {
            var formul = document.getElementById("formulario_ventas")
            formul.pagado.value = "true"
            formul.submit();
        }

        

        const Clickbutton = document.querySelectorAll('.btn');
        const tbody = document.querySelector('#content-fac');
        let factura = [];
        let db = document.getElementById('producto')


        Clickbutton.forEach(btn => {
            btn.addEventListener('click', addFactura);
        });

        function addFactura(e) {
            const boton = e.target;
            const item = boton.closest('.agregar-factura');
            const itemTitulo = item.querySelector('.nombre').textContent;

            const itemPrecio = item.querySelector('#pre').textContent;
            const itemId = item.querySelector(".btn").getAttribute('data-id');

            const newProducto = {
                id: itemId,
                titulo: itemTitulo,
                cantidad: 1,
                precio: itemPrecio
            }
            addItemfactura(newProducto);
        }

        function addItemfactura(newProducto) {
            const inputEle = tbody.getElementsByClassName('input_Element');
            for (let i = 0; i < factura.length; i++) {
                if (factura[i].id.trim() === newProducto.id.trim()) {
                    factura[i].cantidad++;
                    const input = inputEle[i];
                    input.value++;
                    total()
                    renderFactura()
                    return null;
                }
            }
            factura.push(newProducto);
            renderFactura();
        }

        function renderFactura() {
            // tbody.innerHTML = "";
            tabla = document.getElementById('tabla_detalle');

            var i = 0;
            factura.map(item => {

                const tr = document.createElement('tr');
                tr.classList.add('itemFac');
                var total_producto = Number(item.precio.replace("L.", "")) * Number(item.cantidad);
                const Content = `
                            <td colspan="3" class="titulo">${item.titulo}</td>
                            <td>
                                <input onchange="renderFactura()" type="number" min="1" style ="width :40px;" value ="${item.cantidad}" class="input_Element"> </input>
                            </td>
                            <td  width="140">${item.precio}</td>
                            <td  width="140">${total_producto.toFixed(2)}</td>

                            <td  width="140">
                                <a href="#" class="borrar-producto   fas fa-times-circle" data-id="${item.id}"></a>
                            </td>
                                <input name="detalle-` + i + `" type="text" value="${item.id} ${item.cantidad}" readonly style="display:none">
                            `;

                tr.innerHTML = Content;
                tabla.querySelector('tbody').append(tr);

                tr.querySelector(".borrar-producto").addEventListener('click', QuitarItemCarrito);
                tr.querySelector(".input_Element").addEventListener('change', cambCant);

                i++;
            });

            document.formulario_ventas.tuplas.value = factura.length;
            total()
        }

        function total() {
            let total = 0;
            let itemTotal = document.querySelector('.total');

            factura.forEach((item) => {
                let precio = Number(item.precio.replace("L.", ""));
                let cant = Number(item.cantidad)
                total = total + precio * cant;

            });
            itemTotal.innerHTML = `<h5>Total: L. ${total.toFixed(2)}</h5> `;
        }

        function QuitarItemCarrito(e) {
            console.log(e.target)
            // const botonEliminar = e.target;
            // const tr = botonEliminar.closest(".itemFac");
            // const titulo = tr.querySelector('.titulo').textContent;

            // for (let i = 0; i < factura.length; i++) {
            //     if (factura[i].titulo.trim() === titulo.trim()) {
            //         factura.splice(i, 1);
            //     }
            // }
            // tr.remove();
            // total()
        }

        function cambCant(e) {
            const cambio = e.target;
            const tr = cambio.closest(".itemFac");
            const titulo = tr.querySelector('.titulo').textContent;
            factura.forEach((item) => {
                if (item.titulo.trim() === titulo) {
                    cambio.value < 1 ? (cambio.value = 1) : cambio.value;
                    item.cantidad = cambio.value;
                    total()
                }
            });

        }

        function funcionNumeros(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 46) {
                return true;
            } else if (code >= 48 && code <= 57) {
                return true;
            } else {
                return false;
            }
        }

        function funcionObtenerTel(){
            var select = document.getElementById("cliente_id");
            var valor = select.value;

            @foreach ($users as $user)
            if(valor == {{$user->id}}){
                var input = document.getElementById("celular_cliente");
                input.value = "{{$user->telephone}}";
            }
            @endforeach
        }

    </script>
@endsection