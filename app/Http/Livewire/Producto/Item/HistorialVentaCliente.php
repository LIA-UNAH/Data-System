<?php

namespace App\Http\Livewire\Producto\Item;

use App\Models\Producto;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HistorialVentaCliente extends Component
{

    public $id_venta = 0;
    public $fecha_hasta;
    public $fecha_desde;
    public $datos = [];

    public $historial;
    public $detalleshistorial = [];

    public function mount()
    {
        $this->datos = \Cart::session(Auth::user()->id)->getContent();
        $this->fecha_hasta = Carbon::now()->format('Y-m-d');
        $this->fecha_desde = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $this->historial = Venta::where('cliente_id','=',Auth::user()->id)->whereBetween('fecha_factura', [$this->fecha_desde ,$this->fecha_hasta])->get();
        return view('livewire.producto.item.historial-venta-cliente')->extends('home-cliente')
            ->section('content');
    }

    public function ver_detalles($id,$pos)
    {
        $this->id_venta = $id;
        $this->detalleshistorial = $this->historial[$pos]->detalle_venta;
    }
}
