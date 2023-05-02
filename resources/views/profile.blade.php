@extends('Layouts.Layouts')
@section('title', 'Perfil')
@section('content')

<style>
    select.form-control.form-control-line {
  -webkit-appearance: auto;
  -moz-appearance: auto;
}

/*Material inputs*/
.form-material .form-group {
  overflow: hidden;
}

.form-material .form-control {
  background-color: rgba(0, 0, 0, 0);
  background-position: center bottom, center calc(100% - 1px);
  background-repeat: no-repeat;
  background-size: 0 2px, 100% 1px;
  padding: 0;
  -webkit-transition: background 0s ease-out 0s;
  transition: background 0s ease-out 0s;
}

.form-material .form-control,
.form-material .form-control.focus,
.form-material .form-control:focus {
  background-image: -webkit-gradient(linear, left top, left bottom, from(#398bf7), to(#398bf7)), -webkit-gradient(linear, left top, left bottom, from(#e9edf2), to(#e9edf2));
  background-image: linear-gradient(#398bf7, #398bf7), linear-gradient(#e9edf2, #e9edf2);
  border: 0 none;
  border-radius: 0;
  -webkit-box-shadow: none;
          box-shadow: none;
  float: none;
}

.form-material .form-control.focus,
.form-material .form-control:focus {
  background-size: 100% 2px, 100% 1px;
  outline: 0 none;
  -webkit-transition-duration: 0.3s;
          transition-duration: 0.3s;
}

    .form-control-line .form-group {
  overflow: hidden;
}

.form-control-line .form-control {
  border: 0px;
  border-radius: 0px;
  padding-left: 0px;
  border-bottom: 1px solid #f6f9ff;
}
.form-control-line .form-control:focus {
  border-bottom: 1px solid #398bf7;
}
</style>

<div style="float: left;margin-left: 46px">
    <h2 class="m-0 font-weight-bold" style="color: rgb(0, 0, 0)">Perfil de usuario</h2>
</div>
<br>
<br>
<br>
<center>
    <div class="row" style="width: 96%">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3">
          <div class="card border-left-info shadow">
            <div class="card-body">
              <center class="mt-4">
                <img src="/images/uploads/{{ $user->image }}"  class="img-profile rounded-circle"  width="158px">
                <h4 class="card-title mt-2">{{$user->name}}</h4>
                <h6 class="card-subtitle">{{$user->type}}</h6>
                <br>
                  <div class="row justify-content-center">
                      <div class="col-sm-6">
                          <a href="{{ route('usuarios.edit_profile', ['id' => $user->id]) }}" class="btn btn-primary btn-block" id="btn-editar">Editar</a>
                      </div>
                      <div class="col-sm-6">
                          <button type="button" class="btn btn-secondary btn-block" onclick="history.back()" id="btn-regresar">Regresar</button>
                      </div>
                  </div>
              </center>
            </div>
          </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-lg-8 col-xlg-6">
          <div class="card border-left-info shadow">
            <div class="card-body">
              <form class="form-horizontal form-material mx-2" data-bitwarden-watching="1">
                <div class="form-group">
                  <label for="example-email" class="col-md-12" style="text-align: left"><b>Correo:</b></label>
                  <div class="col-md-12">
                    <input readonly type="email" value="{{$user->email}}" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12" style="text-align: left"><b>Teléfono:</b></label>
                  <div class="col-md-12">
                    <input readonly type="text" value="{{$user->telephone}}" placeholder="123 456 7890" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12" style="text-align: left"><b>Dirección</b></label>
                  <div class="col-md-12">
                    <textarea readonly rows="3" class="form-control form-control-line">{{$user->address}}</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Column -->
    </div>


</center>

@endsection
