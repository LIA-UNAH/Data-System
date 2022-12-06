<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cliente extends Model
{
    use HasFactory;
    use Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function venta()
    {
        return $this->hasMany('App\Models\Venta');
    }

    public function notificacions(){
        return $this->hasmany('App\models\notificacion');
    }
  
}
