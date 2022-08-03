<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(
            [
                'name'=>'Telefono',
                'description'=>'Dispositivo con pantalla táctil, que permite al usuario conectarse a internet, gestionar cuentas de correo electrónico e instalar otras aplicaciones.',
                'status'=>'1',
            ]
        );

        Categoria::create(
            [
                'name'=>'Tablet',
                'description'=>'Dispositivo de tipo computadora portátil, regularmente de mayor tamaño que un smartphone, que cuenta con una pantalla táctil.',
                'status'=>'0',
            ]
        );

        Categoria::create(
            [
                'name'=>'Memoria USB',
                'description'=>'Dispositivo de una máquina donde se almacenan datos o instrucciones que posteriormente se pueden utilizar.',
                'status'=>'1',
            ]
        );

        Categoria::create(
            [
                'name'=>'Memoria MicroSD',
                'description'=>'Dispositivo de una máquina utilizada para almacenar información digital, como programas y archivos.',
                'status'=>'1',
            ]
        );

        Categoria::create(
            [
                'name'=>'Teclados',
                'description'=>'Dispositivo de entrada, en parte inspirado en el teclado de las máquinas de escribir.',
                'status'=>'1',
            ]
        );

    }
}
