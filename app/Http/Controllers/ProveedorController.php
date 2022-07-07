<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$proveedor = Proveedor::all();
        //SE AGREGO BUSCAR Y SE ESTA PAGINANDO DE 10 EN 10 
        $buscar = trim( $request->get('buscar_texto'));
        $proveedor=DB::table('proveedors')->select('id','nombre_proveedor',
        'rtn_proveedor','telefono_proveedor','direccion_proveedor','contacto_proveedor','telefono_contacto_proveedor')
        ->where('nombre_proveedor', 'like', '%'.$buscar.'%')
        ->orWhere('rtn_proveedor', 'LIKE', '%'. $buscar. '%')->paginate(10);
        return view('proveedor.proveedores_index', compact('proveedor', 'buscar'));// ESTAS 2 VARIABLES SON LAS QUE SE INICIALIZARON ARRIBA
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
        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = $request->input('nombre_proveedor');
        $proveedor->rtn_proveedor = $request->input('rtn_proveedor');
        $proveedor->telefono_proveedor = $request->input('telefono_proveedor');
        $proveedor->direccion_proveedor = $request->input('direccion_proveedor');
        $proveedor->contacto_proveedor = $request->input('contacto_proveedor');
        $proveedor->telefono_contacto_proveedor = $request->input('telefono_contacto_proveedor');
        $proveedor->save();

        session()->put('suce', 'Se Creo con exito.');
        return redirect()->back()->withInput();
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
        $proveedor=Proveedor::FindOrFail($id);
        return view('proveedor.proveedores_update', compact('proveedor'));
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
        $proveedor=Proveedor::findOrfail($id);
        $proveedor->nombre_proveedor =$request->input('nombre_proveedor');
        $proveedor->rtn_proveedor = $request->input('rtn_proveedor');
        $proveedor->telefono_proveedor = $request->input('telefono_proveedor');
        $proveedor->direccion_proveedor = $request->input('direccion_proveedor');
        $proveedor->contacto_proveedor = $request->input('contacto_proveedor');
        $proveedor->telefono_contacto_proveedor = $request->input('telefono_contacto_proveedor');

        $proveedor->save();
        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::destroy($id);
        return redirect()->route('proveedor.index');
    }


}
