<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table="pedidos";
    protected $fillable =[
        'nombre_Producto',
        'marca_Modelo', 
        'dimension', 
        'fecha_de orden',
        'colore_Producto',
        'precio_Producto'
    ];
}
