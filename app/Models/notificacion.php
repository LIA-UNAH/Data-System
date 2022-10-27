<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificacion extends Model
{
   protected  $filiable = ['noti', 'mensaje', 'cuenta_por_cobrar-id'];

    public function cuenta_por_cobra(){
        return $this->belongsto('App\Models\cuentaPorCobrar');
    }

    public function Cliente(){
        return $this->belongsto('App\models\notificacion');
    }

}
