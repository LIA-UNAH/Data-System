<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        return view('venta\ventas_index')->with('ventas', $ventas);
    }

    public function factura()
    {
        
        return view('venta\factura');
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $ventas = Venta::where('Nfactura', 'like', '%'.$texto.'%')->get();

        return view('venta\ventas_index')->with('ventas', $ventas);
    }

    public function buscarpro(Request $request){
        $busc =trim($request->get('buscar_producto'));
        $productos = Producto::where('descripcion', 'like', '%'.$busc.'%')->get();
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
        return view('venta\ventas_create')->with('productos', $productos);
        
    }

    public function buscarcliente(Request $request){
        $cliente = Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
