<?php

namespace App\Http\Livewire\Producto\Item;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerCarrito extends Component
{
    public $datos = [];
    public $total_items = 0;
    public $precio_total = 0;
    public $sesion = '';

    public function mount($sesion = '')
    {
        $this->sesion = $sesion;
    }

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

    public function vaciar_carrito()
    {
        \Cart::session(Auth::user()->id)->clear();
    }

    public function guardar_venta()
    {

        $venta = new Venta();
        $venta->numero_factura_venta = 'F0-'.Venta::all()->count();
        $venta->fecha_factura = Carbon::now()->format('Y-m-d');
        $venta->user_id = 1;
        $venta->cliente_id = Auth::user()->id;
        $venta->tipo_cliente_factura = 'Cliente';
        $venta->total = \Cart::session(Auth::user()->id)->getTotal();
        $venta->tipo_cliente_factura = 'en_proceso';
        $venta->save();


        foreach (\Cart::session(Auth::user()->id)->getContent() as $key => $value) {
            $detalle = new DetalleVenta();
            $detalle->venta_id = $venta->id;
            $detalle->producto_id = $value['associatedModel']['id'];
            $detalle->cantidad_detalle_venta = $value['quantity'];
            $detalle->precio_venta = $value['price'];
            $detalle->save();
        }

        \Cart::session(Auth::user()->id)->clear();
    }
}
