@extends('Layouts.Layouts')
@section('content')
<link href="/verproducto.css" rel="stylesheet" type="text/css" />

<div class="container py-1">
  <div class=" text-center" style="font-size: 3em;"> <strong>Detalles del Producto</strong>
  <a class="btn btn-success" href="{{ route('producto.edit', ['id' => $verproducto->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></div>
  <!-- Card Start -->
  <div class="card">
    <div class="row ">

      <div class="col-md-8 px-3 " style="padding: 15px">
        <div class="ml-3 pb-lg-4">
        <div style="font-size: 30px; float: left; width: 40%; text-align: justify;"><strong>Nombre:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: none;"> {{$verproducto->nombre}} </div>
          <div style="font-size: 25px; float: left; width: 40%; text-align: justify;"><strong>Descripción:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: none;"> {{$verproducto->descripcion}} </div>
          <div style="font-size: 25px; float: left; width: 40%; text-align: justify;"><strong>Código:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: none; text-transform:uppercase">  {{$verproducto->codigo}}</div>
          <div style="font-size: 25px; float: left; width: 40%; text-align: justify;"><strong>Existencia:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: none;"> {{$verproducto->existencia}}</div>
          <div style="font-size: 25px; float: left; width: 40%; text-align: justify;"><strong>Precio de Compra:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: none;"> {{$verproducto->prec_compra}}</div>
          <div style="font-size: 25px; float: left; width: 40%; text-align: justify;"><strong>Precio (Mayorista):</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: none;"> {{$verproducto->prec_venta_may}}</div>
            <div style="font-size: 25px; float: left; width: 40%; text-align: justify;"><strong>Precio (Final):</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: none;"> {{$verproducto->prec_venta_fin}}</div>
          <!-- <div style="font-size: 25px; float: left; width: 45%; text-align: justify;"><strong>Impuesto:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: justify;"> {{$verproducto->impuesto}}</div> -->
           <!---<p class="card-text">Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images</p>-->

          <a href="/productos" class="mt-4 btn btn-dark">Volver</a>
          <br>
        </div>
      </div>
      <div class="col-sm-4" style="margin-left: -100px;">
          <img src="/images/products/{{$verproducto->imagen_producto}}" width="400px" height="400px" style="border-radius: 10%; padding: 15px">
      </div>
    </div>
  </div>
  <!-- End of card -->

</div>

<!-- <div class="container">
  <div class="card float-left">
    <div class="row ">

      <div class="col-sm-7">
        <div class="card-block">
                   <h4 class="card-title">Small card</h4>
          <p>Wetgple text to build your own card.</p>
          <p>Change around the content for awsomenes</p>
          <a href="#" class="btn btn-primary btn-sm">Read More</a>
        </div>
      </div>

      <div class="col-sm-5">
        <img class="d-block w-100" src="https://picsum.photos/150?image=380" alt="">
      </div>
    </div>
  </div>


    <div class="card float-right">
      <div class="row">
        <div class="col-sm-5">
          <img class="d-block w-100" src="https://picsum.photos/150?image=641" alt="">
        </div>
        <div class="col-sm-7">
          <div class="card-block">
                     <h4 class="card-title">Small card</h4> --
            <p>Copy paste the HTML and CSS.</p>
            <p>Change around the content for awsomenes</p>
            <br>
            <a href="#" class="btn btn-primary btn-sm float-right">Read More</a>
          </div>
        </div>

      </div>
    </div>
  </div>

 <br>
<br> -->


@endsection
