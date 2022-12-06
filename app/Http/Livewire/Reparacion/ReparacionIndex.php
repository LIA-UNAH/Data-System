<?php

namespace App\Http\Livewire\Reparacion;

use App\Models\Reparacion;
use Livewire\Component;

class ReparacionIndex extends Component
{
    public function render()
    {
        return view('livewire..reparacion.reparacion-index', [
            'reparaciones' => Reparacion::paginate(5)
        ])
        ->extends('layouts.layouts')
        ->section('content');
    }
}
