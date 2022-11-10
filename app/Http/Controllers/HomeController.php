<?php

namespace App\Http\Controllers;

use App\Http\VarStatic;
use App\Models\DetalleCompra;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

        $datos_ventas = DB::select('CALL traer_ventas_por_mes(?)', [Carbon::now()->format('Y')]);
        $datos_compras = DB::select('CALL traer_compras_por_mes(?)', [Carbon::now()->format('Y')]);
        $vendedores = DB::select('CALL traer_vendedores(?,?)', [Carbon::now()->format('Y'),Carbon::now()->format('m')]);



        $valores_ventas = [];
        foreach ($datos_ventas as $key => $value) {
            $valores_ventas[] = $value;
        }

        $valores_compre = [];
        foreach ($datos_compras as $key => $value) {
            $valores_compre[] = $value;
        }

        foreach( DetalleVenta::all() as $valor){
            $ingresos += $valor->cantidad_detalle_venta * $valor->precio_venta;
        }

        foreach( DetalleCompra::all() as $valor){
            $egresos += $valor->cantidad_detalle_compra * $valor->precio;
        }



        if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Empleado')){
            return view('home')->with('ingresos',$ingresos)
                ->with('egresos',$egresos)
                ->with('valores_ventas',$valores_ventas)
                ->with('valores_compre',$valores_compre)
                ->with('vendedores',$vendedores);
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
