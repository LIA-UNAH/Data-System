<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentasPorCobrar extends Model
{
    use HasFactory;    
    protected $table="cuentas_por_cobrar";
    protected $fillable =[
        'nombre_cliente',
        'identidad',
        'domicilio',
        'numTelefono',
        'estado',
        'fecha',
        'fecha_limite',
        'venta'
    ]; 
}
