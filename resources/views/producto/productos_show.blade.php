@extends('Layouts.Layouts')
@section('content')
    <link href={{ asset("css/target.css") }} rel="stylesheet" type="text/css">
    <div class="container py-1">
        <!-- Carta -->
        <div class="card">
            <div class=" text-center" style="font-size: 2em; background-color: #0c63e4; color: white"><strong>DETALLES DEL PRODUCTO</strong></div>
            <div class="row ">
                <div class="col-lg-8" style="background: whitesmoke; color: white; font-family: 'Nunito', sans-serif; font-size: small; text-align: justify"> <div class="p-4">
                    <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Código:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-transform: uppercase;"> {{$verproducto->codigo}} </div>
                            <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Marca:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none; text-transform:uppercase">  {{$verproducto->marca}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Modelo:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none; text-transform:uppercase">  {{$verproducto->modelo}}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Existencia:</strong></div>
                        <div
                              style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;"> {{$verproducto->existencia}} unidades</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;"><strong>Precio de
                                Compra:</strong></div>
                        <div style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">
                            L. {{ number_format($verproducto->prec_compra, 2, ".", ",") }}</div>
                        <div
                              style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;"><strong>Precio
                                (Mayorista):</strong></div>
                        <div style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">
                            L. {{ number_format($verproducto->prec_venta_may, 2, ".", ",") }}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;"><strong>Precio
                                (Final):</strong></div>
                        <div style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;">
                            L. {{ number_format($verproducto->prec_venta_fin, 2, ".", ",") }}</div>
                        <div style="font-size: large; color: #1a202c; float: left; width: 40%; text-align: justify;">
                            <strong>Descripción:</strong></div>
                        <div
                            style="font-size: large; color: #1a202c; float: right; width: 55%; text-align: none;"> {{$verproducto->descripcion}} </div>

                        <!-- <div style="font-size: 25px; float: left; width: 45%; text-align: justify;"><strong>Impuesto:</strong></div> <div style="font-size: 25px; float: right; width: 55%; text-align: justify;"> {{$verproducto->impuesto}}</div> -->
                        <!---<p class="card-text">Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images</p>-->
                        <br>
                    </div>
                </div>
                <div class="col-lg-4 text-center" style="padding-bottom: 10px;">
                    <img src="/images/products/{{$verproducto->imagen_producto}}" width="290px" height="290px"
                         style="border-radius: 10%; padding: 15px">

                         <div class="text-center">
                             <a href="{{ route('productos.edit', ['id' => $verproducto->id]) }}"
                              style=" width: 130px; display: inline-block; background: #0d6efd; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                              class="btn btn-google btn-user">Editar</a>

                            <a href="/productos" style="width: 130px; display: inline-block; background: #b02a37; color: white; border: 2px solid #ffffff;border-radius: 10px; font-size: large"
                            class="btn btn-google btn-user">Volver</a>
                          </div>
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
