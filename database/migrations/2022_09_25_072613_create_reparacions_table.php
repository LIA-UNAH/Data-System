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
        Schema::create('reparacions', function (Blueprint $table) {
            $table->id();
            $table->date("fecha_entrada");
            $table->date("fecha_salida");
            $table->string('marca',40);
            $table->string('modelo',40)->nullable();
            $table->string('descripcion', 255);
            $table->double('costo_reparacion');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users');
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
        Schema::dropIfExists('reparacions');
    }
};
