@extends('Layouts.Layouts')
@section('content')
<h1 style="text-align:center">LISTA DE PROVEEDORES</h1>

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

    <button type="button" class="btn btn-primary shadow-lg rounded my-4"
            data-bs-toggle="modal" data-bs-target="#modal_nuevo_proveedor" >
        Crear nuevo
    </button>

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
                        <textarea name="direccion_proveedor" id="direccion_proveedor" cols="25" rows="5" required ></textarea>
                        <div class="invalid-feedback">
                        Valid first direccion is required.
                        </div>
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
        <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 15px">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>RTN</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Teléfono contacto</th>
            <th>Ver Proveedor</th>
        </tr>
        </thead>
        <tbody>
        @forelse($proveedor as $proved)
            <tr>
                <td scope="row">{{ $proved->id }}</td>
                <td>{{ $proved->nombre_proveedor}} </td>
                <td>{{ $proved->rtn_proveedor}} </td>
                <td>{{ $proved->telefono_proveedor}} </td>
                <td>{{ $proved->direccion_proveedor}} </td>
                <td>{{ $proved->contacto_proveedor}} </td>
                <td>{{ $proved->telefono_contacto_proveedor}} </td>
                <td><a class="btn btn-info" href="">Ver</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay proveedor</td>
            </tr>

        @endforelse
        </tbody>

    </table>
</div>
@endsection

