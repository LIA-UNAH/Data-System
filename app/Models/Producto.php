<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function detalle_compre()
    {
        return $this->hasOne('App\Models\DetalleCompra');
    }

    public function detalle_venta()
    {
        return $this->hasOne('App\Models\DetalleVenta');
    }
}
