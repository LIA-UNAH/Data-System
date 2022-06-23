<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.clientes_index')->with('clientes', $clientes);
    }

    public function search(Request $request){
        $texto =trim($request->get('busqueda'));
        $clientes = Cliente::where('name', $texto)->get();

        return view('cliente.clientes_index')->with('clientes', $clientes);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $clientes = Cliente::findOrFail($id);
        $clientes->name = $request->input('name');
        $clientes->email = $request->input('email');
        $clientes->id_cliente = $request->input('id_cliente');
        $clientes->direccion_cliente = $request->input('direccion');
        $clientes->save();

        $user = User::findOrFail($clientes->user_id_cliente);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        session()->put('suce', 'Editado con exito.');
        return redirect()->back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        session()->put('suce', 'Eliminado con exito.');
        return redirect()->back()->withInput();
    }
}
