<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->char('codigo',15);
            $table->string('nombre', 80);
            $table->string('modelo',20)->nullable();
            $table->string('descripcion', 80);
            $table->integer('existencia');
            $table->double('prec_compra');
            $table->double('prec_venta_may');
            $table->double('prec_venta_fin');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign("id_categoria")->references("id")->on("categorias");
            $table->string('imagen_producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
