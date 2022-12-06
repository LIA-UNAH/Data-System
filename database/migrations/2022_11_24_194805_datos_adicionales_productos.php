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
        Schema::create('datos_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productos_id');
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->string('tamanio',20);
            $table->string('color',20);
            $table->string('material',50);
            $table->string('tipo',50);
            $table->string('descripcion_amplia');
            $table->string('imagenes');
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
        Schema::dropIfExists('datos_productos');
    }
};
