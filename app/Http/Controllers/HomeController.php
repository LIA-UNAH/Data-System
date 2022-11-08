<?php

namespace App\Http\Controllers;

use App\Http\VarStatic;
use App\Models\DetalleCompra;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        if(Auth::user()->hasRole('Administrador')){
            return view('home')->with('ingresos',$ingresos)->with('egresos',$egresos);
        }

        if(Auth::user()->hasRole('Empleado')){
            return view('home')->with('ingresos',$ingresos)->with('egresos',$egresos);
        }

        $use = User::findOrFail(Auth::user()->id);
        $use->assignRole('Cliente');
        Auth::login($use);

        return redirect()->route('home-carrito');
    }


    public function vista_tabla(){

        if (!Cache::has('vista')){
            Cache::put('vista',true);
        }

        if (Cache::get('vista')) {
            Cache::put('vista',false);
        }else {
            Cache::put('vista',true);
        }


        return redirect()->back();

    }
}
