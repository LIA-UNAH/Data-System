@extends('Layouts.Layouts')
@section('content')
<link href="/verproducto.css" rel="stylesheet" type="text/css" />

<div class="container py-1">
  <div class=" text-center" style="font-size: 3em;"> <strong>Detalles del Producto</strong></div>
  <!-- Card Start -->
  <div class="card">
    <div class="row ">

      <div class="col-md-7 px-3 ">
        <div class="ml-3 pb-lg-4">
          <div style="font-size: 40px; float: left; width: 45%; text-align: justify;"><strong>Descripción:</strong></div> <div style="font-size: 40px; float: right; width: 55%; text-align: justify;"> {{$verproducto->descripcion}} </div>
          <div style="font-size: 30px; float: left; width: 45%; text-align: justify;"><strong>Código:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: justify;">  {{$verproducto->codigo}}</div>
          <div style="font-size: 30px; float: left; width: 45%; text-align: justify;"><strong>Existencia:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: justify;"> {{$verproducto->existencia}}</div>
          <div style="font-size: 30px; float: left; width: 45%; text-align: justify;"><strong>Precio de Venta:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: justify;"> {{$verproducto->prec_venta}}</div>
          <div style="font-size: 30px; float: left; width: 45%; text-align: justify;"><strong>Categoría:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: justify;"> {{$verproducto->categoria}}</div>
          <div style="font-size: 30px; float: left; width: 45%; text-align: justify;"><strong>Impuesto:</strong></div> <div style="font-size: 30px; float: right; width: 55%; text-align: justify;"> {{$verproducto->impuesto}}</div>
           <!---<p class="card-text">Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images</p>-->
          
          <a href="/productos" class="mt-auto btn btn-dark">Volver</a> 
          <br>
        </div>
      </div>
      <!-- Carousel start -->
      <div class="col-md-5">
        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
            <li data-target="#CarouselTest" data-slide-to="1"></li>
            <li data-target="#CarouselTest" data-slide-to="2"></li>

          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block" src="https://picsum.photos/450/300?image=1072" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="https://picsum.photos/450/300?image=855" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="https://picsum.photos/450/300?image=355" alt="">
            </div>
            <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
            <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
          </div>
        </div>
      </div>
      <!-- End of carousel -->
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
