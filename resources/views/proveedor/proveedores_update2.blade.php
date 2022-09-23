@extends('Layouts.Layouts')
@section('content')
    <div class="card shadow mb-4 ">
        <div></div>
        <div class="card-header py-3" style="background: #0d6efd; border-radius:5px 5px 0 0;">

            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar Proveedor</h2>
            </div>
        </div>
        <br>
        <div class="container" style="font-family: 'Nunito', sans-serif; font-size: small">
            <form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor"
                                   value="{{$proveedor->nombre_proveedor}}" placeholder="Ingrese el nombre" required>
                            <div class="invalid-feedback">
                                Valid first Nombre is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">RTN:</label>
                            <input type="text" class="form-control" id="rtn_proveedor" name="rtn_proveedor"
                                   value="{{$proveedor->rtn_proveedor}}" placeholder="Ingrese el RTN" required>
                            <div class="invalid-feedback">
                                Valid first rtn is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Teléfono:</label>
                            <input type="number" class="form-control" id="telefono_proveedor" name="telefono_proveedor"
                                   value="{{$proveedor->telefono_proveedor}}" placeholder="Ingrese el Teléfono"
                                   required>
                            <div class="invalid-feedback">
                                Valid first Telefono is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre Contacto:</label>
                            <input type="text" class="form-control" id="contacto_proveedor" name="contacto_proveedor"
                                   value="{{$proveedor->contacto_proveedor}}"
                                   placeholder="Ingrese el nombre del contacto" required>
                            <div class="invalid-feedback">
                                Valid Nombre Contacto is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Teléfono Contacto:</label>
                            <input type="number" class="form-control" id="telefono_contacto_proveedor"
                                   name="telefono_contacto_proveedor"
                                   value="{{$proveedor->telefono_contacto_proveedor}}"
                                   placeholder="Ingrese el Teléfono contacto" required>
                            <div class="invalid-feedback">
                                Valid Telefono is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" name="direccion_proveedor" id="direccion_proveedor"
                                   value="{{$proveedor->direccion_proveedor}}" required></input>
                            <div class="invalid-feedback">
                                Valid first direccion is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-----ESTE BOTON ES EL BOTON DEL MODAL PARA CREAR EL NUEVO INVENTARIO-->

                        </div>

                        <div>
                            <a class="btn btn-dark" href="/proveedor">Volver</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                    </div>
                </div>




            </form>
        </div>
        <br>
    </div>
@endsection
