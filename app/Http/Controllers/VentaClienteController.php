<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();

        foreach ($ventas as $key => $value) {
            $value->total = 0;
            foreach ($value->detalle_venta as $key => $value2) {
                $value->total += $value2->cantidad_detalle_venta * $value2->precio_venta;
            }
        }

        return view('venta\ventas_index')->with('ventas', $ventas);
    }

    public function factura($id)
    {
        $venta = Venta::findOrFail($id);
        return view('venta.facturas')->with("venta",$venta);
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $ventas = Venta::where('numero_factura_venta', 'like', '%'.$texto.'%')->get();
        return view('venta\ventas_index')->with('ventas', $ventas);
    }

    public function buscarpro(Request $request){
        $busc =trim($request->get('buscar_producto'));
        $productos = Producto::where('marca', 'like', '%'.$busc.'%')->get();
        return view('venta\ventas_create')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $users = User::where('type', '=', 'cliente')->get();
        $ventas = DB::select('SELECT numero_factura_venta from ventas where id = (SELECT max(id) FROM ventas)');

        if(count($ventas) == 0){
            $num_factura = '001-001-00-00000001';
        }else{
            $num_factura = '001-001-00-';

            $num_factura_anterioir = substr($ventas[0]->numero_factura_venta,10,8);

            $numero = intval($num_factura_anterioir);
            $numero += 1;

            if($numero < 10){
                $num_factura = $num_factura."0000000".$numero;
            }else if($numero >= 10 && $numero < 99){
                $num_factura = $num_factura."00000".$numero;
            }else if($numero >= 100 && $numero < 999){
                $num_factura = $num_factura."0000".$numero;
            }else if($numero >= 1000 && $numero < 9999){
                $num_factura = $num_factura."0000".$numero;
            }else if($numero >= 10000 && $numero < 99999){
                $num_factura = $num_factura."000".$numero;
            }else if($numero >= 100000 && $numero < 999999){
                $num_factura = $num_factura."00".$numero;
            }else if($numero >= 1000000 && $numero < 9999999){
                $num_factura = $num_factura."0".$numero;
            }else if($numero >= 10000000 && $numero < 99999999){
                $num_factura = $num_factura.$numero;
            }
        }

        return view('venta\ventas_create')->with('productos', $productos)->with('users', $users)->with('num_factura', $num_factura);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'numero_factura_venta'=>  ['required', 'string', 'min:20', 'max:20'],
            'fecha_factura' => ['required', 'string'],
        ],[
            'numero_factura_venta.required' => '¡Debes ingresar un número de factura!'
        ]);

        $venta = new Venta();
        $venta->numero_factura_venta = $request->input('numero_factura');
        $venta->fecha_factura = $request->input('current_date');
        $venta->user_id = $request->input('usuario_id');
        $venta->cliente_id = $request->input('cliente_id');
        $venta->tipo_cliente_factura = $request->input('tipo_cliente');
        $venta->save();


        for ($i=0; $i < intval($request->input("tuplas")) ; $i++) {
            $array = explode ( ' ', $request->input("detalle-".$i) );
            $detalle_venta = new DetalleVenta();
             $detalle_venta->venta_id = $venta->id;
             $detalle_venta->producto_id = $array[0];
             $detalle_venta->cantidad_detalle_venta = $array[1];
             if ($request->input('tipo_cliente') == 'Mayorista') {
                $detalle_venta->precio_venta = Producto::findOrFail($array[0])->prec_venta_may;
             } else {
                $detalle_venta->precio_venta = Producto::findOrFail($array[0])->prec_venta_fin;
             }
             $detalle_venta->save();
        }



        return redirect()->route('ventas.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return view('venta.facturas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $ventas)
    {
        $ventas->delete();

        session()->put('suce', 'Eliminado con exito.');
        return redirect()->back()->withInput();
    }
}
