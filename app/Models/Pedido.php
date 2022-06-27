<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table="pedidos";
    protected $fillable =[
        'nombre_Producto',
        'marca_Producto', 
        'dimension', 
        'fecha_de_orden',
        'colore_Producto',
        'precio_Producto'
    ];
}
