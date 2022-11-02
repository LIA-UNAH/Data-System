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
                <img src="/images/uploads/{{ $user->image }}"  class="img-profile rounded-circle"  width="150px">
                <h4 class="card-title mt-2">{{$user->email}}</h4>
                <h6 class="card-subtitle">{{$user->type}}</h6>
                <br>
                <div class="row text-center justify-content-md-center">
                  <div class="col-4">
                    <a class="rounded-pill" href="{{route("usuarios.edit",["id"=>$user->id])}}" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                     </a>
                  </div>
                  <div class="col-4">
                    <a class="rounded-pill" href="javascript:history.back()" class="btn btn-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                          </svg>
                        </a>
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
                <div class="form-group" >
                  <label class="col-md-12" style="text-align: left;"><b>Nombre:</b></label>
                  <div class="col-md-12">
                    <input readonly type="text" value="{{$user->name}}" placeholder="Johnathan Doe" class="form-control form-control-line">
                  </div>
                </div>
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
                    <textarea readonly rows="5" class="form-control form-control-line">{{$user->address}}</textarea>
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
