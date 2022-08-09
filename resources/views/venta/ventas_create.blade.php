@extends('Layouts.Layouts')
@section('content')
<style>

.text-secondary-d1 {
    color: #728299!important;
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
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
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
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div>

<div class="page-content container" >
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Factura
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                Numero Factura
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Imprimir
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Guardar PDF
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nombre Cliente:</span>
                            <select name=”nombre_lista” id=”nombre_lista”>
                                <option value=”nombre_opcion” id="name">Seleccione un cliente</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-600 text-110 text-blue align-middle"></span>
                        </div>
                        <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Celular Cliente:</span>
                            <input type="tel" class="text-600 text-110 text-blue align-middle"  placeholder="0000-0000"></input>
                            </div>

                        <div class="text-grey-m2">
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Tipo de Cliente:</span>
                            <select name="" id="">
                            <option value=”tipo_opcion” id="name">Seleccione el Tipo de Cliente</option>

                            </select>
                            </div>


                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Datos Factura
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1">
                                </i>
                                <span class="text-600 text-90">ID:</span>
                            </div>

                            <div class="my-2" >
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"  ></i>
                                <span class="text-600 text-90" >Fecha:
                                    <span id="current_date">
                                        <script>
                                            date = new Date();
                                            year = date.getFullYear();
                                            month = date.getMonth() + 1;
                                            day = date.getDate();
                                            document.getElementById("current_date").innerHTML = day + "/" + month + "/" + year;
                                        </script>
                                    </span>
                                </span>
                            </div>

                            <div class="my-2">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                <span class="text-600 text-90">Vendido Por:{{ Auth::user()->name }}</span>
                                <span class="badge badge-warning badge-pill px-25"></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- HU8 - Buscar producto -->
                    <div class="bprod" style="float: left; width: 400px;">
                        <form action="{{ route('ventas.buscarpro') }}" method="GET"
                              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" name="buscar_producto" class="form-control bg-light border-0 small" placeholder="Buscar"
                                       aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append" style="margin-left: 5px">
                                    <button class="btn btn-primary " type="submit" value="Buscar" style=" border: 2px solid #ffffff;border-radius: 4px; color:green">
                                        <i class="fas fa-search fa-sm" style="color: black"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h4>Catalogo de Productos</h4>
                  

                </div>

            </div>
        </div>
    </div>
                <!-- Catalogo de Productos -->
                <div class="catpro" style=" height: 400px; overflow:scroll;  float:left; ">
                    <section class="NovidadesSection"  >

                            <div class="producto" id="producto"  style="display: grid; grid-template-columns: 155px 155px 155px 155px;">

                                @foreach($productos as $pro)
                                     <div class="agregar-factura"  id=""  style="display:block;  border:rounded ; height: 155px;width: 155px; ">
                                        <div class="card h-100 btn" data-id="{{$pro->id}}" >
                                            <!-- Sale badge-->
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$pro->existencia}} unidades</div>
                                            <!-- Product image-->
                                            <img class="card-img-top" src="/images/products/{{$pro->imagen_producto}}" width="00px" height="80px" alt="..." />
                                            
                                            <div class="" style="text-align:center ;">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <p class="nombre" id="nombre" ><strong>{{$pro->nombre}}</strong></p>
                                                    <!-- Product reviews-->
                                                    <div class="pre"  id="pre">
                                                        <span  class="text-muted text-decoration-line"><strong> L. {{$pro->prec_venta_fin}}</strong></span>
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

                

                
                    <!-- or use a table instead -->

            <div class="table-responsive" style="width: 40%; float:right;">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th colspan="4" >Detalle</th>
                            <th width="140">Total</th>

                        </tr>
                    </thead>

                    <tbody id="content-fac" class="content-fac">
                        
                    </tbody>
                </table>
                <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Reaizar Pago imediato de factura
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

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105"></span>

                        <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Guardar</a>
                        <a href="/ventas" class="btn btn-danger btn-bold px-4 float-right mt-2 mt-lg-0" >Cancelar</a>
                    </div>
            </div>



                </div>
            </div>
        </div>
    </div>

</div>

<script>

                const Clickbutton = document.querySelectorAll('.btn');
                const tbody = document.querySelector('#content-fac');
                let factura = [];
                let db= document.getElementById('producto')
                Clickbutton.forEach(btn => {
                    btn.addEventListener('click', addFactura);
                });

                function addFactura(e){
                    const boton = e.target;
                    console.log(boton);
                    const item = boton.closest('.agregar-factura');
                    const itemTitulo = item.querySelector('.nombre').textContent;
                    
                    const itemPrecio = item.querySelector('#pre').textContent;
                    const itemId = item.querySelector(".btn").getAttribute('data-id');

                    const newProducto = {
                        id: itemId,
                        titulo: itemTitulo,
                        cantidad:1,
                        precio: itemPrecio
                    }
                    addItemfactura(newProducto);
                }

                function addItemfactura(newProducto){
                    const inputEle = tbody.getElementsByClassName('input_Element');
                    for (let i = 0; i < factura.length; i++) {
                        if (factura[i].id.trim() === newProducto.id.trim()) {
                            factura[i].cantidad ++;
                            const input = inputEle[i];
                            input.value++;
                            console.log(factura);
                            total()
                            return null;

                        }  
                    }
                    factura.push(newProducto);
                    renderFactura();
                }

                function renderFactura(){
                    tbody.innerHTML = '';
                    
                    factura.map(item => {
                        const tr = document.createElement('tr');
                        tr.classList.add('itemFac');
                        const Content = `
                        <td>${item.titulo}</td>
                        <td>
                            <input type = "number" size="5" style ="width :40px;" value ="${item.cantidad}" class="input_Element"> </input>  
                        </td>
                        <td>${item.precio}</td>
                        <td></td>
                    
                        <td>
                            <a href="#" class="borrar-producto fas fa-times-circle" data-id="${item.id}"></a>
                        </td>
                        `;

                        tr.innerHTML = Content;
                        tbody.append(tr);
                    });
                    total()
                }

                function total(){
                    let total = 0;
                    let itemTotal =document.querySelector('.total');

                    factura.forEach((item)=>{
                        let precio = Number(item.precio);
                        total = total+ precio* item.cantidad;
                    });
                    itemTotal.innerHTML=`Total L. ${total}`
                }

    </script>
@endsection


