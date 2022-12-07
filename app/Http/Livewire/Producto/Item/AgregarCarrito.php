<?php

namespace App\Http\Livewire\Producto\Item;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgregarCarrito extends Component
{
    public $busqueda = '';
    public $productos = [];
    public $productoCategoria = [];
    public $mas_vendidos = [];
    public $categorias = [];

    public $categoria = 0;

    public function render()
    {
        $this->productos = Producto::whereRaw('concat(marca," ",modelo) like concat("%",?,"%")',[$this->busqueda])->get();
        $this->mas_vendidos = DB::select('CALL trer_productos_mas_vendidos()');
        $this->categorias = Categoria::all();

        $this->productoCategoria = Producto::where("id_categoria","=",$this->categoria)->get();

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

    public function quitar_item($id)
    {
        \Cart::session(Auth::user()->id)->remove($id);
    }
}
