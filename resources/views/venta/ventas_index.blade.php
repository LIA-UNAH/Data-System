@extends('Layouts.Layouts')
@section('content')

<h1 style="text-align:center">LISTA DE VENTAS</h1>

    {{-- Mensajes de las operaciones realizadas --}}
    {{--Para los mensajes afirmativos y sin errores --}}
    @if (session()->has('suce'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suce') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{--Para los mensajes de errores --}}
    @if (session()->has('erorr'))
        <div class="alert alert-danger" role="alert">
            {{ session('erorr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Terminan los mensajes --}}

    <!-- HU8 - Buscar y recargar venta -->
    <div class="card" style="padding: 10px">
        <form action="" method="GET"
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                       placeholder="Buscar por numero de factura"
                       aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" value="Buscar">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

                  <div>
            
                  <a href="{{route('ventas.create')}}" class="btn btn-primary">Crear venta</a>
                  
                  <a href="{{route('ventas.facturas')}}" class="btn btn-primary">Vista Previa de Factura</a>
                  <button type="button" class="btn btn-success shadow-lg rounded my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                    Imprimir factura
                  </button>
                  
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Ordenar por :
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Hoy</a></li>
                            <li><a class="dropdown-item" href="#">Ultima semana</a></li>
                            <li><a class="dropdown-item" href="#">Ultimo mes</a></li>
                        </ul>
                    
                  
                  </div>
                  

        <!--------EMPIEZA LA TABLA ---------------->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>N° de factura</th>
                <th>Nombre Cliente</th>
                <th>Vendido Por</th>
                <th>Total</th>
                <th>Saldo</th>
                <th>Estado</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>


                <th><i class="fa fa-exclamation-circle" aria-hidden=""></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse($ventas as $i=>  $venta)
                <tr>
                <td scope="row">{{++$i}}</td>
                    <td scope="row">{{$venta->fecha}}</td>
                    <td>{{ $venta->Nfactura}} </td>
                    <td>{{ $venta->Cliente}}</td>
                    <td>{{ $venta->VendidoPor}}</td>
                    <td>{{ $venta->Total}}</td>
                    <td>{{ $venta->Saldo}}</td>
                    <td>{{ $venta->Estado}}</td>

                    <td><a class="btn btn-info" href="">Ver</a>
                    <a class="btn btn-success" href="">Editar</a>
                    
                            <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                               data-bs-target="#modal_eliminar_cliente">Eliminar</a>
                        </td>

                        <!-- <div class="modal fade" id="modal_eliminar_cliente" tabindex="-1"
                             aria-labelledby="modal_eliminar_cliente" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Eliminar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar a ""
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra
                                        </button>
                                        <form action=""
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    {{-- Hasta aqui el modal de eliminar --}} -->


                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay Ventas disponibles</td>
                </tr>

            @endforelse
            </tbody>

        </table>
    </div>

@endsection
