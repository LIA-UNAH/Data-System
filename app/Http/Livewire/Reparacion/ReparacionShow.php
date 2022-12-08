<?php

namespace App\Http\Livewire\Reparacion;

use App\Models\Reparacion;
use App\Notifications\ClienteReparacion;
use Livewire\Component;
use PDF;

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

    public function exportarPdf()
    {
                            
        // imagenes codificadas en base64 sino no funcionan en el pdf
        $logo_empresa = base64_encode(file_get_contents(public_path('/images/logo-empresa.jpg')));
        $logo_whatsapp = base64_encode(file_get_contents(public_path('/images/whatsapp.png')));

        $pdf = PDF::loadView('pdfs.ficha-tecnica', [
            'reparacion' => $this->reparacion,
            'logo_empresa' => $logo_empresa,
            'logo_whatsapp' => $logo_whatsapp
        ])->output();

        return response()->streamDownload(
            fn () => print($pdf),
            "ficha-tecnica({$this->reparacion->cliente->name}).pdf"
        );

    }
}
