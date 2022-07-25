<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

   
    use HasFactory;
    
    protected $table="pedidos";
    protected $fillable =[
        'nombre_Cliente',
        'telefon_Cliente', 
        'ciudad', 
        'fecha_de_orden',
        'detalle_Pedido',
        'total_Pedido'
    ]; 
}

