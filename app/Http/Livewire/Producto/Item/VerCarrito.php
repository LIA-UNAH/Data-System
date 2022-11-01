<?php

namespace App\Http\Livewire\Producto\Item;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerCarrito extends Component
{
    public $datos = [];
    public $total_items = 0;
    public $precio_total = 0;

    public function render()
    {
        $this->datos = \Cart::session(Auth::user()->id)->getContent();
        $this->total_items = $this->datos->count();
        $this->precio_total = \Cart::session(Auth::user()->id)->getTotal();

        return view('livewire.producto.item.ver-carrito')->extends('home-cliente')
            ->section('content');
    }

    public function actualizar_cantidad($incremento,$id,$apartado,$quantiti)
    {
        $apartado -= 1;
        if ($apartado <= $quantiti) {
            if ($incremento == -1) {
                $incremento = -1;
            }else {
                $incremento = 0;
            }
        }

        \Cart::session(Auth::user()->id)->update($id,[
            'quantity' => $incremento,
        ]);
    }

    public function quitar_item($id)
    {
        \Cart::session(Auth::user()->id)->remove($id);
    }

    public function guardar_venta($id)
    {
        \Cart::session(Auth::user()->id)->remove($id);
    }
}
