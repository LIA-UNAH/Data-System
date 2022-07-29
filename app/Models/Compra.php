<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function detalle_compra()
    {
        return $this->hasMany('App\Models\DetalleCompra');
    }

}
