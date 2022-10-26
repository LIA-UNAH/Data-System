<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Ventas\VentaCreate;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;

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
        'a.name as usuario','b.name as cliente', 'tipo_cliente_factura', 'ventas.estado')
        ->join("users as a", "ventas.user_id", "=", "a.id")
        ->join("users as b", "ventas.cliente_id", "=", "b.id")
        ->where('estado', '=', 'en_proceso')
        ->paginate(5);

        foreach ($ventas as $key => $value) {
            $value->total = 0;
            foreach ($value->detalle_venta as $key => $value2) {
                $value->total += $value2->cantidad_detalle_venta * $value2->precio_venta;
            }
        }

        return view('venta\ventas_index')->with('ventas', $ventas);
    }

    public function pdf($id)
    {
        $venta = Venta::findOrFail($id);
        $vista = view('venta.ventas_pdf')->with('venta',$venta);

        // Reconocemos los archivos CSS externos
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);

        $dompdf = new Dompdf($options);
            // Definimos el tamaño y orientación del papel que queremos.
            $dompdf->setPaper('A4', 'landscape');
            // Cargamos el contenido HTML.
            $dompdf->loadHtml(utf8_decode($vista));
            // Renderizamos el documento PDF.
            $dompdf->render();
            // Enviamos el fichero PDF al navegador.
            $dompdf->stream("Factura-001-001-00-00000001".".pdf");
    }



    public function factura()
    {
        return view('venta.facturas');

    }

    public function search(Request $request){
        $texto =trim($request->get('buscar_venta'));
        $ventas = Venta::select('ventas.id','ventas.numero_factura_venta','ventas.fecha_factura',
        'a.name as usuario','b.name as cliente', 'tipo_cliente_factura', 'ventas.estado')
        ->join("users as a", "ventas.user_id", "=", "a.id")
        ->join("users as b", "ventas.cliente_id", "=", "b.id")
        ->Where('fecha_factura', 'LIKE', '%'. $texto. '%')
        ->orWhere('a.name', 'LIKE', '%'. $texto. '%')
        ->orWhere('b.name', 'LIKE', '%'. $texto. '%')->paginate(5);

        foreach ($ventas as $key => $value) {
            $value->total = 0;
            foreach ($value->detalle_venta as $key => $value2) {
                $value->total += $value2->cantidad_detalle_venta * $value2->precio_venta;
            }
        }
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
        $venta->estado = $request->input("pagado") == "true" ? "pagado" : "en_proceso";
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
        $venta = Venta::findOrFail($id);
        $productos = Producto::all();
        $users = User::where('type', '=', 'cliente')->get();

        return view('venta.ventas_edit', [
            "venta" => $venta,
            "productos" => $productos,
            "users" => $users
        ]);
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

    /**
     * Marca en estado pagado la venta
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function pagar_factura($id){
        $venta = Venta::FindOrfail($id);

        #metodo que esta en el controlador de livewire
        $venta->numero_factura_venta = VentaCreate::generar_numero_factura();
        $venta->estado = 'pagado';
        $venta->save();

        return redirect()->back();

    }
}
