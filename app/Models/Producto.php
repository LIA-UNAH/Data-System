<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    protected $table="productos";
    protected $fillable =[
        'nombre',
        'cantidad', 
        'prec_compra', 
        'prec_venta',
        'existencia',
        'impuesto', 
        'total'
    ];
}
