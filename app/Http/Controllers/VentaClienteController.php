<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\If_;

class VentaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::select('ventas.id','ventas.numero_factura_venta','ventas.fecha_factura',
        'a.name as usuario','b.name as cliente', 'tipo_cliente_factura')
        ->join("users as a", "ventas.user_id", "=", "a.id")
        ->join("users as b", "ventas.cliente_id", "=", "b.id")
        ->paginate(5);

        foreach ($ventas as $key => $value) {
            $value->total = 0;
            foreach ($value->detalle_venta as $key => $value2) {
                $value->total += $value2->cantidad_detalle_venta * $value2->precio_venta;
            }
        }

        return view('venta\ventas_index')->with('ventas', $ventas);
    }

   

    public function factura()
    {
        
        return view('venta.facturas');
    }

    public function search(Request $request){
        $texto =trim($request->get('buscar_venta'));
        $ventas = DB::table('ventas')->select('fecha_factura')

        /** */
            //->join('detalle_ventas', 'detalle_ventas.venta_id', '=', 'ventas.id')
            //->join('clientes','clientes.id','=','ventas.cliente_id')
            //->join('users','user.id','=','ventas.user_id')
            //->select('ventas.id','ventas.numero_factura_venta', 'ventas.fecha_factura','ventas.tipo_cliente_factura',
            //'detalle_venta.cantidad_detalle_venta','clientes.name','users.name as name_vendedor')
            ->Where('fecha_factura', 'LIKE', '%'. $texto. '%')->paginate(5);
            //->orWhere('numero_factura_venta', 'LIKE', '%'. $texto. '%')
            //->orWhere('fecha_factura', 'LIKE', '%'. $texto. '%')
            //->orWhere('name', 'LIKE', '%'. $texto. '%')
           // ->orWhere('name_vendedor', 'LIKE', '%'. $texto. '%')
           // ->orWhere('cantidad_detalle_venta', 'LIKE', '%'. $texto. '%')->paginate(5);
        return view('venta.ventas_index', compact('ventas', 'texto'));
    }

    public function buscarpro(Request $request){
        $busc =trim($request->get('buscar_producto'));
        $productos = Producto::join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select('productos.id','productos.codigo', 'productos.marca','productos.modelo','productos.descripcion',
                'productos.existencia', 'productos.prec_venta_may', 'productos.prec_venta_fin','productos.prec_compra','productos.id_categoria', 'categorias.name')
            ->Where('name', 'LIKE', '%'.$busc. '%')
            ->orWhere('codigo', 'LIKE', '%'. $busc. '%')
            ->orWhere('marca', 'LIKE', '%'. $busc. '%')
            ->orWhere('modelo', 'LIKE', '%'. $busc. '%')->paginate(5);
        return view('venta\ventas_create', compact('productos', 'busc'));
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
            'cliente_id'=>  ['required'],
            'tipo_cliente' => ['required'],
            'tuplas' => ['required'],
        ],[
            'cliente_id.required' => '¡Debes seleccionar un cliente antes de realizar la venta!',
            'tipo_cliente.required' => '¡Debes seleccionar el tipo de cliente!',
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
            if ($request->input('tipo_cliente') == 'mayorista') {
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
    public function show($id)
    {

        $venta = Venta::findOrFail($id);
        return view('venta.ventas_show')->with("venta",$venta);
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
