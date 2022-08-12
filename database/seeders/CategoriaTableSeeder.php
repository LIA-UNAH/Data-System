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
                'name'=>'Computadora',
                'description'=>'Dispositivo capaz de almacenar información y tratarla automáticamente mediante operaciones matemáticas y lógicas controladas por programas informáticos.',
                'status'=>'1',
            ]
        );

        Categoria::create(
            [
                'name'=>'Telefóno',
                'description'=>'Dispositivo inteligente con panel táctil, que permite al usuario conectarse a internet, gestionar cuentas de correo electrónico e instalar otras aplicaciones.',
                'status'=>'1',
            ]
        );

        Categoria::create(
            [
                'name'=>'Tablet',
                'description'=>'Dispositivo de entrada, en parte inspirado en el teclado de las máquinas de escribir.',
                'status'=>'1',
            ]
        );

        Categoria::create(
            [
                'name'=>'Cable VGA',
                'description'=>'Cable que tiene un conector con 15 pines distribuido en tres filas. Su función es transmitir la señal desde la tarjeta gráfica de la PC al monitor.',
                'status'=>'0',
            ]
        );
    }
}
