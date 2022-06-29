<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

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
        return view('venta.ventas_index')->with('ventas', $ventas);
    }

    public function factura()
    {
        
        return view('venta\factura');
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $ventas = Venta::where('Nfactura', 'like', '%'.$texto.'%')->get();

        return view('venta/ventas_index')->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('venta/ventas_create')->with('productos', $productos);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crearventa = new Venta();

        $crearventa->nombre = $request->input('nombre');
        $crearventa->cantidad = $request->input('cantidad');
        $crearventa->cantidad = $request->input('precio');
        
        $crearventa->total = $request->input('total');

        $crearventa->save();

        return redirect()->back();
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
