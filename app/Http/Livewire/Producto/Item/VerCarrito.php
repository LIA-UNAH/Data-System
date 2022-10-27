<?php

namespace App\Http\Livewire\Producto\Item;

use Livewire\Component;

class VerCarrito extends Component
{
    public function render()
    {
        return view('livewire.producto.item.ver-carrito')->extends('home-cliente')
        ->section('content');
    }
}
