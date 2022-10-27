<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function create(){
        return view('notification_cobro.create');
    }
}
