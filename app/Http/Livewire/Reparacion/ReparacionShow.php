<?php

namespace App\Http\Livewire\Reparacion;

use App\Models\Reparacion;
use App\Notifications\ClienteReparacion;
use Livewire\Component;

class ReparacionShow extends Component
{
    public $reparacion;
    public $mensaje;

    protected $rules = [
        'mensaje' => 'required'
    ];

    protected $messages = [
        'mensaje.required' => '¡Debe introducir el mensaje!'
    ];

    public function render()
    {
        return view('livewire..reparacion.reparacion-show')
            ->extends('layouts.layouts')
            ->section('content');
    }

    public function mount(Reparacion $reparacion)
    {   
        $this->reparacion = $reparacion;
    }

    public function enviar_correo(){
        
        // valido los datos del formulario
        $this->validate();

        $this->reparacion->cliente->notify(new ClienteReparacion($this->mensaje));

        return  redirect()->route('reparaciones.show', ['reparacion' => $this->reparacion->id])->with('success', '¡Correo enviado con éxito!');
    }
}
