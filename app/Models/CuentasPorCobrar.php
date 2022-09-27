<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentasPorCobrar extends Model
{
    use HasFactory;    
    protected $table="cuentas_por_cobrar";
    protected $fillable =[
        'cobros_Pendientes',
        'nombre_cliente',
        'identidad',
        'domicilio',
        'numTelefono',
        'forma_de_pago',
        'fecha',
        'venta'
    ]; 
}
