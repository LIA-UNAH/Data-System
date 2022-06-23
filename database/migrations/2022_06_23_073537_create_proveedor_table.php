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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proveedor',70);
            $table->string('rtn_proveedor',16);
            $table->string('telefono_proveedor',8);
            $table->string('direccion_proveedor',255);
            $table->string('contacto_proveedor',70);
            $table->string('telefono_contacto_proveedor',8);
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
        Schema::dropIfExists('proveedor');
    }
};
