<?php

namespace App\Http\Livewire\Compras;

use App\Models\Compra;
use Livewire\Component;

class ComprasShow extends Component
{

    public $compra = [];

    public function mount(Compra $compra)
    {
        $this->compra = $compra;
    }
    public function render()
    {
        return view('livewire.compras.compras-show')->extends('layouts.layouts')
        ->section('content');
    }


}
