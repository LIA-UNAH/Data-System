<?php

namespace App\Http\Livewire\Ventas;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Carbon\Carbon;
use Livewire\Component;

class VentaIndex extends Component
{   
    public $filtros = [
        "busqueda" => "",
        "fecha_inicial" => "",
        "fecha_final" => "",
        "estado" => [
            "nombre" => "Todas",
            "valor" => "",
        ]
    ];

    public function render()
    {
        return view('livewire..ventas.venta-index', [
            'ventas' => Venta::where('estado', 'like', "%{$this->filtros["estado"]["valor"]}%")
                ->where('numero_factura_venta', 'like', "%{$this->filtros["busqueda"]}%")
                ->whereBetween('fecha_factura', [$this->filtros["fecha_inicial"], $this->filtros["fecha_final"]])
                ->orderByDesc('fecha_factura')
                ->paginate(10)
        ])
        ->extends('layouts.layouts')
        ->section('content');
    }

    public function mount(){
        $this->setFiltroFecha(Carbon::now()->toDateString('Y-m-d'), Carbon::now()->toDateString('Y-m-d'));
    }

    public function setFiltroEstado($valor, $nombre){
        $this->filtros["estado"]["valor"] = $valor;
        $this->filtros["estado"]["nombre"] = $nombre;
    }

    public function setFiltroFecha($fecha_inicial, $fecha_final){
        $this->filtros["fecha_inicial"] = $fecha_inicial;
        $this->filtros["fecha_final"] = $fecha_final;
    }

    // propiedad computada para generar el nombre del filtro de fecham y mostrarlo al usuario
    public function getNombreFiltroFechaProperty()
    {
        return "{$this->filtros["fecha_inicial"]} / {$this->filtros["fecha_final"]}";
    }


    public function eliminarVenta($id){
        $venta = Venta::findOrFail($id);

        if ($venta) {
            DetalleVenta::where('venta_id', $venta->id)->delete();
            $venta->delete();
        }

        return redirect()->route('ventas.index')->with('success','¡Venta eliminada con éxito!');
    }
}
