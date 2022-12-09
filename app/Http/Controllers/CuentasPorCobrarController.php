<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentasPorCobrar;
use Illuminate\Support\Facades\DB;


class CuentasPorCobrarController extends Controller
{
    public function index()
    {
        $cobros = DB::table('cuentas_por_cobrar')->select('id','nombre_cliente','identidad','domicilio','numTelefono',
        'estado','fecha','fecha_limite', 'venta')->paginate(5);
        return view('cobros.cobros_index')->with('cobros', $cobros);
    }

    public function show($id)
    {
        $cobro = CuentasPorCobrar::findOrFail($id);
        return view('cobros.cobro_show', compact('cobro'));
    }
    public function create()
    {
        $cobro = CuentasPorCobrar::all();
        return view('cobros.cobro_create', compact('cobro'));
       

    }
    public function store(){
         // Validacion
         $this->validate($request, [
            'nombre_cliente' => ['required', 'string','min:3', 'max:30'],
            'identidad' => ['required', 'numeric', 'max:13'],
            'domicilio' => ['required', 'string', 'min:20', 'max:250'],
            'numTelefono' => ['required', 'numeric', 'max:11'],
            'estado' => ['required', 'string','max:8'],
            'fecha' => ['required', 'numeric'],
            'fecha_limite' => ['required','numeric'],
            'venta' => ['required', 'string'],
         ]);
          
        $cobro = new CuentasPorCobrar();
        $cobro->nombre_cliente = $request->input('nombre_cliente');
        $cobro->identidad = $request->input('identidad');
        $cobro->domicilio = $request->input('domicilio');
        $cobro->numTelefono = $request->input('numTelefono');
        $cobro->estador = $request->input('estado');
        $cobro->fecha = $request->input('fecha');
        $cobro->fecha_limite = $request->input('fecha_limite');
        $cobro->venta = $request->input('venta');
        $cobro->save();
        return redirect()->route('cobro.index')->with('realizado', '¡El cobro ha sido creado con exito!');
    }
    
}
