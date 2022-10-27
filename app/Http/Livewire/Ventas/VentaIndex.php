<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Carbon\Carbon;
use Livewire\Component;

class VentaIndex extends Component
{   
    public $filtros = [
        "busqueda" => "",
        "estado" => [
            "nombre" => "En Proceso",
            "valor" => "en_proceso",
        ],
        "fecha" => [
            "nombre" => "",
            "valor" => "",
        ]
    ];

    public function render()
    {
        return view('livewire..ventas.venta-index', [
            'ventas' => Venta::where('estado', $this->filtros["estado"]["valor"])
                ->where('numero_factura_venta', 'like', "%{$this->filtros["busqueda"]}%")
                ->whereBetween('fecha_factura', [$this->filtros["fecha"]["valor"], Carbon::now()->toDateString('Y-m-d')])
                ->orderByDesc('fecha_factura')
                ->paginate(10)
        ])
        ->extends('layouts.layouts')
        ->section('content');
    }

    public function mount(){
        $this->setFiltroFecha(Carbon::now()->toDateString('Y-m-d'), "Hoy");
    }

    public function setFiltroEstado($valor, $nombre){
        $this->filtros["estado"]["valor"] = $valor;
        $this->filtros["estado"]["nombre"] = $nombre;
    }

    public function setFiltroFecha($valor, $nombre){
        $this->filtros["fecha"]["valor"] = $valor;
        $this->filtros["fecha"]["nombre"] = $nombre;
    }
}
