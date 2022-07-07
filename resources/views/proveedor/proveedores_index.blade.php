@extends('Layouts.Layouts')
@section('content')


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

<div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
                <div style="float: left">
                    <h2 class="m-0 font-weight-bold" style="color: white">Proveedores</h2>
                </div>

            <div style="float: right;">
              <div style="float: left">
                <!-- Buscar proveedor -->
                <form action="{{ route('proveedor.index') }}" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                          <input type="text" name="buscar_texto" class="form-control bg-light border-0 small"
                                placeholder="Buscar" value="{{$buscar}}"
                                aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <button class="btn btn" type="submit" value="Buscar" style="background: white">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form>

                  </div>

                <div style="float: right">
                    <!-- Recargar -->
                    <div style="float: left; margin-left: 15px">
                        <td style="text-align: center"><a class="btn btn-dark" href="/proveedor" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-spinner" style="color: white"></i> Recargar</a>
                    </div>

                    <!-- Añadir -->
                    <div style="float: right; margin-left: 10px">
                        <td style="text-align: center"><a class="btn btn-success" href="" style=" border: 2px solid #ffffff;border-radius: 4px"><i class="fa fa-plus-square" style="color: white"></i> Añadir</a>
                    </div>
                    <!--fin Añadir -->
                </div>
              
            </div>
        </div>

        <!--<div style="margin-left: 15px; margin-bottom:-15px">
    <button type="button" class="btn btn-primary shadow-lg rounded my-4"
            data-bs-toggle="modal" data-bs-target="#modal_nuevo_proveedor" >
        Crear nuevo
    </button>
    </div>
    
    <div class="modal fade" id="modal_nuevo_proveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Crear nuevo Proveedor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('proveedor.store') }}" method="POST">
                @csrf
            <div class="modal-body">
          <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Ingrese el nombre" required>
                    <div class="invalid-feedback">
                      Valid first Nombre is required.
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">RTN:</label>
                    <input type="number" class="form-control" id="rtn_proveedor" name="rtn_proveedor" placeholder="Ingrese el RTN" required>
                    <div class="invalid-feedback">
                      Valid first rtn is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Teléfono:</label>
                    <input type="number" class="form-control" id="telefono_proveedor" name="telefono_proveedor" placeholder="Ingrese el Teléfono" required>
                    <div class="invalid-feedback">
                      Valid first Telefono is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Nombre Contacto:</label>
                    <input type="text" class="form-control" id="contacto_proveedor" name="contacto_proveedor" placeholder="Ingrese el nombre del contacto" required>
                    <div class="invalid-feedback">
                      Valid Nombre Contacto is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Teléfono Contacto:</label>
                    <input type="number" class="form-control" id="telefono_contacto_proveedor" name="telefono_contacto_proveedor" placeholder="Ingrese el Teléfono contacto" required>
                    <div class="invalid-feedback">
                      Valid Telefono is required.
                    </div>
                  </div>

                   <div class="col-sm-6">
                        <label for="firstName" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" name="direccion_proveedor" id="direccion_proveedor" required ></input>
                        <div class="invalid-feedback">
                        Valid first direccion is required.
                        </div>
                  </div>
                  <div class="col-sm-6">
                </div>

                  </div>
              </div>


              ---ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO---
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              

              </form>
              </div>
          </div>
        </div>-->
        
      <!---Tabla--->
      <div class="card-body">
            <div class="table-responsive">

            <table class="table table" id="dataTable" width="100%" >
            <thead class="card-header py-3" style="background: #1a202c; color:white">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>RTN</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Teléfono contacto</th>
            <th colspan="6"><i class="fa fa-exclamation-circle" aria-hidden="" style="display: flex; justify-content: center;"></i></th>
            
        </tr>
        </thead>
        <tbody>
        @forelse($proveedor as $i=> $proved)
            <tr>
                <td scope="row"><strong>{{ ++$i }}</strong></td>
                <td>{{ $proved->nombre_proveedor}} </td>
                <td>{{ $proved->rtn_proveedor}} </td>
                <td>{{ $proved->telefono_proveedor}} </td>
                <td>{{ $proved->direccion_proveedor}} </td>
                <td>{{ $proved->contacto_proveedor}} </td>
                <td>{{ $proved->telefono_contacto_proveedor}} </td>
                <td colspan="4"><button type="button" class="btn btn-info"  href=""><i class="fa fa-eye" aria-hidden="true" style="color: white; "></i></button></td> 
                <td><a class="btn btn-success" href="{{ route('proveedor.edit', $proved->id) }}"> 
                                            <i class="fa fa-edit" aria-hidden="true"></i> <!--boton de editar--->
                                            @csrf </a> </td>         
                <!---ACA EMPIEZA EL BOTON DE ELIMINAR--->
               <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" style="float:right" data-bs-target="#modalEliminarProveedor{{$proved->id}}">
                                            <i class="fa fa-window-close" aria-hidden="true"></i> <!--boton de eliminar--->
                                            </button></td>
                                            
                                            <!---------############################----------->
                                            <!-----------MODAL PARA ELIMINAR UN PROVEEDOR---------------->
                                            
                                                                   
                                              <div class="modal fade" id="modalEliminarProveedor{{$proved->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="staticBackdropLabel">Eliminar Proveedor</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('proveedor.destroy',$proved->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-body">
                                                 
                                                    ¿Desea eliminar al proveedor <strong>{{$proved->nombre_proveedor}}?</strong>
                                                          
                                                    </div>           
                                                 <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                  </div>

                                                  </form>
                                                  </div>
                                              </div>
                                            </div>
                                           
                                            <!-----------####################################------->
                                            

                                        <!--    <div class="modal fade" id="modalEditarProveedor{{$proved->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Editar Proveedor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('proveedor.update', $proved->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="modal-body">
          <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{$proved->nombre_proveedor}}" placeholder="Ingrese el nombre" required>
                    <div class="invalid-feedback">
                      Valid first Nombre is required.
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">RTN:</label>
                    <input type="number" class="form-control" id="rtn_proveedor" name="rtn_proveedor" value="{{$proved->rtn_proveedor}}" placeholder="Ingrese el RTN" required>
                    <div class="invalid-feedback">
                      Valid first rtn is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Teléfono:</label>
                    <input type="number" class="form-control" id="telefono_proveedor" name="telefono_proveedor" value="{{$proved->telefono_proveedor}}" placeholder="Ingrese el Teléfono" required>
                    <div class="invalid-feedback">
                      Valid first Telefono is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Nombre Contacto:</label>
                    <input type="text" class="form-control" id="contacto_proveedor" name="contacto_proveedor" value="{{$proved->contacto_proveedor}}" placeholder="Ingrese el nombre del contacto" required>
                    <div class="invalid-feedback">
                      Valid Nombre Contacto is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Teléfono Contacto:</label>
                    <input type="number" class="form-control" id="telefono_contacto_proveedor" name="telefono_contacto_proveedor" value="{{$proved->telefono_contacto_proveedor}}" placeholder="Ingrese el Teléfono contacto" required>
                    <div class="invalid-feedback">
                      Valid Telefono is required.
                    </div>
                  </div>

                   <div class="col-sm-6">
                        <label for="firstName" class="form-label">Dirección:</label>
                        <input type="text" style="height: 100px;" name="direccion_proveedor" id="direccion_proveedor" value="{{$proved->direccion_proveedor}}" required ></input>
                        <div class="invalid-feedback">
                        Valid first direccion is required.
                        </div>
                  </div>
                  <div class="col-sm-6">
                </div>

                  </div>
              </div>


              ----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO-->
              <!--div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
              </div>

              </form>
              </div>
          </div>
        </div> -->



      
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay proveedor</td>
            </tr>

        @endforelse
        </tbody>

    </table>
    <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
            {{ $proveedor->links('pagination::bootstrap-4') }}
        </div>
  </div>
</div>
 
@endsection

