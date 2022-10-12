<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Livewire\Component;

class VentaIndex extends Component
{   
    public $filtros = [
        "estado" => "en_proceso"
    ];

    public function render()
    {
        return view('livewire..ventas.venta-index', [
            'ventas' => Venta::where('estado', $this->filtros["estado"])->paginate(10)
        ])
        ->extends('layouts.layouts')
        ->section('content');
    }
}
