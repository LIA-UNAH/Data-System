@extends('Layouts.Layouts')
@section('title', 'Clientes')
@section('content')

    <div class="card shadow mb-4 ">
        <div class="card-header py-3" style="background: #0d6efd">
            <div style="float: left">
                <h2 class="m-0 font-weight-bold" style="color: white">Editar cliente</h2>
            </div>
        </div>

        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background: #4a5568">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="text-center" style="align-items: center; justify-content: center; padding: 50px">
                        <img id="imagen" src="/images/uploads/{{ $user->image }}" class="img-fluid rounded" width="430" height="430">
                    </div>
                </div>


                <div class="col-lg-7">
                    <div class="p-5">
                        <form method="POST" action="{{route("clientes.edit",["id"=>$user->id])}}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                           @if(old("name"))
                                               value="{{old("name")}}"
                                           @else
                                               value="{{$user->name}}"
                                           @endif
                                           name="name" value="{{ old('name') }}" required
                                           onkeypress="return funcionLetras(event);"
                                           style="text-transform: capitalize;">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input  type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            @if(old("email"))
                                                value="{{old("email")}}"
                                            @else
                                                value="{{$user->email}}"
                                            @endif
                                            name="email" value="{{ old('email') }}"
                                            required autocomplete="email" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                           @if(old("telephone"))
                                               value="{{old("telephone")}}"
                                           @else
                                               value="{{$user->telephone}}"
                                           @endif
                                           name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                                           onkeypress="return funcionNumeros(event);" minlength="8" maxlength="8">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <select class="form-control @error('type') is-invalid @enderror"  id="type"
                                                required autocomplete="type" name="type"
                                                autofocus>
                                            <option value="cliente" style="display: none">Cliente</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                           @if(old("password"))
                                               value="{{old("password")}}"
                                           @else
                                               value="{{$user->password}}"
                                           @endif
                                           name="password" placeholder="{{ __('Contraseña') }}"
                                           autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <input
                                        @if(old("password"))
                                            value="{{old("password")}}"
                                        @else
                                            value="{{$user->password}}"
                                        @endif
                                        id="password-confirm" name="password_confirmation" type="password"
                                        class="form-control"
                                        placeholder="{{ __('Confirmar') }}" autocomplete="new-password">
                                </div>
                                <div class="col-sm-1">
                                    <span id="imgContrasena" data-activo=false><img  style="width: 25px; height: 25px;" src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" class="icon"></span>
                                </div>
                                <div class="col-sm-1">

                                </div>
                            </div>

                            <div class="mb-0">
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                          name="address"  required
                                          autofocus placeholder="{{ __('Dirección') }}"
                                          minlength="3" maxlength="250" rows="3"
                                >@if(old("address")){{old("address")}}@else{{$user->address}}@endif</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-0" style="margin-top: 15px">
                                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="image"
                                       name="image" value="{{ old('image') }}" autocomplete="image"
                                       autofocus placeholder="{{ __('image') }}" onchange="mostrar()">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row" style="margin-top: 15px">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button type="submit" style="display: inline-block; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                            class="btn btn-primary btn-user btn-block">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="/clientes" style="display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 4px; font-size: large"
                                       class="btn btn-google btn-user btn-block">
                                        {{ __('Regresar') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripsss')
    <script>
        function mostrar(){
            if (document.getElementById("image").files.length <= 0) return;

            var archivo = document.getElementById("image").files[0];

            if (archivo.size > 1000000) {
                const tamanioEnMb = 1000000 / 1000000;
                alert(`El tamaño máximo es ${tamanioEnMb} MB`);
                document.getElementById("image").value = "";
            } else {

                var reader = new FileReader();
                if (archivo) {
                    reader.readAsDataURL(archivo);
                    reader.onloadend = function () {
                        document.getElementById("imagen").src = reader.result;
                    }
                }
            }
        }


        $("#imgContrasena").click(function () {

            var control = $(this);
            var estatus = control.data('activo');

            var image = control.find('img');
                if (estatus == false) {

                    control.data('activo', true);
                    $(image).attr('src', 'https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-10-256.png');
                    $("#password").attr('type', 'text');
                    $("#password-confirm").attr('type', 'text');


                }
                else {

                    control.data('activo', false);
                    $(image).attr('src', 'https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png');
                    $("#password").attr('type', 'password');
                    $("#password-confirm").attr('type', 'password');
                }
        });

    </script>
@endpush