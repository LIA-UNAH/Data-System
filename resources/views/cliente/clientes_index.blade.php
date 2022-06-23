@extends('Layouts.Layouts')



@section('content')


<h1 style="text-align:center">LISTA DE CLIENTES</h1>

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


<div class="card" style="padding: 10px">
    <form action="{{ route('clientes.searchIndex') }}" method="GET"
          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="busqueda" class="form-control bg-light border-0 small"
                   placeholder="Buscar por nombre"
                   aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" value="Buscar">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Identidad</th>
            <th>Dirección</th>
            <th>Ver Cliente</th>
            <th>Editar Cliente</th>
            <th>Eliminar CLiente</th>
        </tr>
        </thead>
        <tbody>
        @forelse($clientes as $cliente)
            <tr>
                <td scope="row">{{ $cliente->name }}</td>
                <td>{{ $cliente->email}} </td>
                <td>{{ $cliente->id_cliente}} </td>
                <td>{{ $cliente->direccion_cliente}} </td>

                <td><a class="btn btn-info" href="">Ver</a></td>
                <td><a class="btn btn-success" href="#" data-bs-toggle="modal"
                    data-bs-target="#modal_editar_cliente">Editar</a></td>

                <div class="modal fade" id="modal_editar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Crear nuevo equipo</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('clientes.update',['id'=> $cliente->id])}}" method="POST">
                            @csrf
                        <div class="modal-body">
                      <div class="row g-3">
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" value="{{$cliente->name}}" required>
                                <div class="invalid-feedback">
                                  Valid first Name is required.
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el Correo" value="{{$cliente->email}}" required>
                                <div class="invalid-feedback">
                                  Valid first Email is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">N# ID:</label>
                                <input type="number" class="form-control" id="id_cliente" name="id_cliente" placeholder="Ingrese el N# identidad" value="{{$cliente->id_cliente}}" required>
                                <div class="invalid-feedback">
                                  Valid first ID is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <label for="firstName" class="form-label">Dirección:</label>
                                <textarea name="direccion" id="direccion" cols="25" rows="5" required >{{$cliente->direccion_cliente}}</textarea>
                                 <div class="invalid-feedback">
                                  Valid first direccion is required.
                                </div>
                              </div>
                              <div class="col-sm-6">
                              </div>
                              <div class="col-sm-6">
                              </div>
                               <div class="col-sm-6">
                              </div>

                              </div>
                          </div>


                          <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO-->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>

                          </form>
                          </div>
                      </div>
                    </div>

                  <div>


                <td>
                    <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                           data-bs-target="#modal_eliminar_cliente">Eliminar</a>
                 </td>

                    <div class="modal fade" id="modal_eliminar_cliente" tabindex="-1"
                         aria-labelledby="modal_eliminar_cliente" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Eliminar Cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea eliminar a "{{ $cliente->name }}"
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra
                                    </button>
                                    <form action="{{ route('clientes.destroy', ['cliente'=>$cliente->id]) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- Hasta aqui el modal de eliminar --}}


            </tr>
        @empty
            <tr>
                <td colspan="4">No hay Clientes</td>
            </tr>

        @endforelse
        </tbody>

    </table>
</div>
@endsection
