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
        Schema::create('clientes', function (Blueprint $table) {
            // No se está utilizando está tabla
            // IMPORTANTE
            // Se está utilizando a los clientes, desde los usuarios
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id_cliente');
            $table->foreign('user_id_cliente')->references('id')->on('users');
            $table->string('id_cliente',15);
            $table->string('direccion_cliente',255);
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
        Schema::dropIfExists('clientes');
    }
};
