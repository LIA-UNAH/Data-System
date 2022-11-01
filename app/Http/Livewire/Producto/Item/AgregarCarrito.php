<?php

namespace App\Http\Livewire\Producto\Item;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AgregarCarrito extends Component
{
    public $busqueda = '';

    public $productos = [];
    public function render()
    {
        $this->productos = Producto::whereRaw('concat(marca," ",modelo) like concat("%",?,"%")',[$this->busqueda])->get();

        return view('livewire.producto.item.agregar-carrito')
            ->extends('home-cliente')
            ->section('content');
    }

    public function addCarrito($producto)
    {
        \Cart::session(Auth::user()->id)->add(array(
            'id' => $producto['id'], // inique row ID
            'name' => $producto['marca'].' '.$producto['modelo'],
            'price' => $producto['prec_venta_fin'],
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $producto
        ));
    }
}
