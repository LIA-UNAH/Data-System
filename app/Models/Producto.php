<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    // protected $table="productos";
    // protected $fillable =[
    //     'descripcion',
    //     'codigo',
    //     'existencia',
    //     'prec_venta',
    //     'categoria',
    //     'impuesto'
    // ];
   // use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalle_compre()
    {
        return $this->hasOne('App\Models\DetalleCompra');
    }
}
