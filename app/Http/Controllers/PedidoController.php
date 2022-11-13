<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedid = Pedido::paginate(5);
        return view('pedido.pedidos_index')->with('pedidos', $pedid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedido.pedidos_show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedido.pedidos_update')->with('pedido',$pedido);
      
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
        $pedido = Pedido::findOrFail($id);

        //Validar        
        
        //Formulario
        $pedido -> nombre_Cliente=$request->input('nombre_Cliente');
        $pedido -> telefon_Cliente=$request->input('telefon_Cliente');
        $pedido -> ciudad=$request->input('ciudad');
        $pedido -> fecha_de_orden=$request->input('fecha_de_orden');
        $pedido -> estado_Pedido=$request->input('estado_Pedido');
        $pedido -> detalle_Pedido=$request->input('detalle_Pedido');
        $pedido -> total_Pedido=$request->input('total_Pedido');

     //salvamos
     $pedido->update();

        return redirect()->route('pedidos.index')->with('realizado', '¡El pedido ha sido actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        Pedido::destroy($id);
        return redirect()->route('pedidos.index')->with('error','El pedido fue eliminado exitosamente.');
    }
}
