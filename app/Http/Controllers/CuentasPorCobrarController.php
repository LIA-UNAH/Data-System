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
    
}
