<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate(10);
        return view('compra.compras_index')->with('compras', $compras);
    }

    public function search(Request $request)
    {
        $texto = trim($request->get('busqueda'));
        $compras = Compra::where('docummento_compra', 'like', '%' . $texto . '%')->paginate(5);
        return view('compra/compras_index')->with('compras', $compras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedores = Proveedor::all();
        $productos = Producto::all();
        $compra = Compra::where('estado_compra', '=', 'p')->where('user_id', '=', Auth::user()->id)->get();
        if ($compra->count() == 0) {

            $compra_nueva = new Compra();
            $compra_nueva->docummento_compra = '';
            $compra_nueva->fecha_compra = '2022-07-29';
            $compra_nueva->proveedor_id = 1;
            $compra_nueva->user_id = Auth::user()->id;
            $compra_nueva->estado_compra = 'p';
            $compra_nueva->save();


            return view('compra.compras_create')->with('compra', $compra_nueva)
                ->with('provedores', $provedores)
                ->with('productos', $productos);
        }


        return view('compra.compras_create')->with('compra', $compra[0])
            ->with('provedores', $provedores)
            ->with('productos', $productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalles = new DetalleCompra();
        $detalles->compra_id = $request->input('compra_id');
        $detalles->producto_id = $request->input('productos_id');
        $detalles->cantidad_detalle_compra = $request->input('cantidad_detalle_compra');
        $detalles->precio = $request->input('precio');
        $detalles->save();

        return redirect()->route('compras.create');
    }

    public function compra_guardar(Request $request)
    {
        $compra = Compra::findOrFail($request->input('compra_id'));
        $compra->docummento_compra = $request->input('docummento_compra');
        $compra->fecha_compra = $request->input('fecha_compra');
        $compra->proveedor_id = $request->input('proveedor_id');
        $compra->user_id = Auth::user()->id;
        $compra->descripcion_compra = $request->input('descripcion_compra');
        $compra->estado_compra = 'g';
        $compra->save();


        foreach ($compra->detalle_compra as $key => $value) {
            $prodcuto = Producto::findOrFail($value->producto_id);
            $prodcuto->existencia = $prodcuto->existencia + $value->cantidad_detalle_compra;
            $prodcuto->save();
        }


        return redirect()->route('compras.index');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Compra::destroy($id);

        return redirect()->route('compras.index');
    }
}
