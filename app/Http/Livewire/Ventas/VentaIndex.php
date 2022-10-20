<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Carbon\Carbon;
use Livewire\Component;

class VentaIndex extends Component
{   
    public $filtros = [
        "estado" => "en_proceso",
        "fecha" => ""
    ];

    public function render()
    {
        return view('livewire..ventas.venta-index', [
            'ventas' => Venta::where('estado', $this->filtros["estado"])
                ->whereBetween('fecha_factura', [$this->filtros["fecha"], Carbon::now()->toDateString('Y-m-d')])
                ->orderByDesc('id')
                ->paginate(10)
        ])
        ->extends('layouts.layouts')
        ->section('content');
    }

    public function mount(){
        $this->filtros["fecha"] = Carbon::now()->toDateString('Y-m-d');
    }
}
