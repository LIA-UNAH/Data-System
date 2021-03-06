@extends('Layouts.Layouts')
@section('content')
<style>
    body{
    margin-top:20px;
    color: #484b51;
}
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
    font-weight: 300;
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

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Factura
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #111-222
            </small>

            <small id="dropdownMenuButton1" data-bs-toggle="modal" data-bs-target="#AgregarPro" aria-expanded="false" class="btn btn-primary dropdown-toggle">
                Agregar Producto:
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
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Data-System</span>
                        </div>
                    </div>
                </div>
              

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nombre Cliente:</span>
                            <span class="text-600 text-110 text-blue align-middle"></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Direccion:</span>
                            <span class="text-600 text-110 text-blue align-middle"></span>
                            </div>
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">RTN Cliente:</span>
                            <span class="text-600 text-110 text-blue align-middle"></span>
                            </div>
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Celular Cliente:</span>
                            <span class="text-600 text-110 text-blue align-middle"></span>
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
                   
                </div>

              
                    

                    <!-- or use a table instead -->
                   
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">Numero</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th width="140">Total</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>

                        </tr> 
                    </tbody>
                </table>
            </div>
           

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Reaizar Pago imediato de factura
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1"></span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Impuesto (15%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"></span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
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
                        <span class="text-secondary-d1 text-105">Gracias Por Comprar En Nuestro Negocio</span>
                        
                        <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Guardar</a>
                        <a href="/ventas" class="btn btn-danger btn-bold px-4 float-right mt-2 mt-lg-0" >Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Busca Producto-->
<div class="modal fade" id="AgregarPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
    <div class="modal-header">
        
    <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    <form class="form-horizontal">
    <div class="form-group">                                              
    <div class="col-sm-6">
    <input type="text" class="form-control" id="filtrar" placeholder="Buscar productos">
    <a type="button" href="#" id="bus"><i class="fas fa-search fa-sm"></i>Buscar</a>
    </div>
                  </div>
                </form>                 
                                  <div class="outer_div">                                          
                                             
                                        <div class="table-responsive">
                                        <table class="table">
                                            <tbody class="buscar">    
                                        <tr  class="warning">
                                            <th>N??</th>
                                            <th>C??digo</th>
                                            <th>Producto</th> 
                                            <th><span class='text-center'>Precio</span></th>
                                            <th><span class='text-center'>Cant.</span></th>
                                            <th class='text-center' style="width: 36px;">Agregar</th>
                                        </tr>

                                        @forelse($productos as $i=>  $pro)
                                            
                                            <tr>
                                                <td scope="row" id="id"><strong>{{$pro->id}}</strong></td>
                                                <td>{{ $pro->codigo}} </td>
                                                <td scope="row" id="desc">{{$pro->descripcion}}</td>
                                                <td class='col-xs-2'>
                                                    <div class="pull-right" id="precio">
                                                        <input type="text" class="form-control" style="text-align:right" id="precio" value="{{ $pro->prec_venta}}">
                                                    </div>
                                                </td>
                                                <td class='col-xs-1' id="cant">
                                                    <div class="pull-right">
                                                        <input type="number" class="form-control" style="text-align:right" id="cant" value="">
                                                    </div>
                                                </td>
                                                <td class='text-center'>
                                                    <a class='btn btn-info'href="#" onclick="agregado($id)"><i class= "fa fa-plus-square"  ></i></a>
                                                </td>

                                        
                                            </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="4">No hay productos ingresados</td>
                                                </tr>

                                        @endforelse
                                        
                                            </tbody>
                                        </table>
                                        </div>
                                  </div><!-- Datos ajax Final -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal" >Cerrar</button>                  
              </div>
            </div>
          </div>
        </div>


        
<script>
    function agregar($id){
        var cant = document.getElementById('cant'+id).value;
      $.ajax({
      type: 'POST',
      data: "codigo="+id+"&canti="+cant,
      success: function (r){
      $("#resultados1").html(r);
      }                                
      });
    }
</script> 
    
@endsection


