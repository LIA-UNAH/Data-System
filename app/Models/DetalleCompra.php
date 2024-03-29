<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    public function compra()
    {
        return $this->belongsTo('App\Models\Compra');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }
}
