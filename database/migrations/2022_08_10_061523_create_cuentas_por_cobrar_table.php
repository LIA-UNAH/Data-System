<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CuentasPorCobrar;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_por_cobrar', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('identidad');
            $table->string('domicilio');
            $table->string('numTelefono');
            $table->string('estado');
            $table->string('fecha');
            $table->string('venta');
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
        Schema::dropIfExists('cuentas_por_cobrar');
    }
};
