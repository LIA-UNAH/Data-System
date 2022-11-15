<?php

namespace App\Http\Livewire\Producto\Item;

use Livewire\Component;

class HistorialVentaCliente extends Component
{
    public function render()
    {
        return view('livewire.producto.item.historial-venta-cliente')->extends('home-cliente')
        ->section('content');
    }
}
