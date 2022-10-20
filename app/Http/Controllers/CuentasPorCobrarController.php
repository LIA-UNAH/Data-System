<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentasPorCobrar;

class CuentasPorCobrarController extends Controller
{
    public function index()
    {
        $cobros = CuentasPorCobrar::paginate(10);
        return view('cobros.cobros_index')->with('cobros', $cobros);
    }

    public function show($id)
    {
        $cobro = CuentasPorCobrar::findOrFail($id);
        return view('cobros.cobro_show', compact('cobro'));
    }
    
}
