<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\DetalleVenta;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ingresos = 0;
        $egresos = 0;

        foreach( DetalleVenta::all() as $valor){
            $ingresos += $valor->cantidad_detalle_venta * $valor->precio_venta;
        }

        foreach( DetalleCompra::all() as $valor){
            $egresos += $valor->cantidad_detalle_compra * $valor->precio;
        }

        if(Auth::user()->hasrole('Administrador') || Auth::user()->hasrole('Empleado')){
            return view('home')->with('ingresos',$ingresos)->with('egresos',$egresos);
        }

        $use = User::findOrFail(Auth::user()->id);
        $use->assignRole('Cliente');

        Auth::login($use);

        return view('home')->with('ingresos',$ingresos)->with('egresos',$egresos);
    }
}
