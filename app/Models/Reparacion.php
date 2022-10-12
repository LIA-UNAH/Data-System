<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_entrada',
        'fecha_salida',
        'hora_salida',
        'marca',
        'modelo',
        'descripcion',
        'costo_reparacion',
        'cliente_id'
    ];

    public function cliente(){
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
