<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->randomElement($array = array ('Auriculares','Teclados', 'Ratones',
                'Protectores', 'Pasta térmica', 'Pantallas', 'Vidrio templado',
                'Mouse', 'Memorias USB', 'Memorias Micro SD', 'Cargadores',
                'Cables USB', 'Cables HDMI', 'Cables VGA', 'WebCam', 'Impresoras',
                'Routers', 'MousePad', 'Adaptadores')),
            'description' => $this->faker->randomElement($array = array ('Dispositivo de una máquina donde se almacenan datos o instrucciones que posteriormente se pueden utilizar.',
                'Dispositivo de una máquina utilizada para almacenar información digital, como programas y archivos.',
                'Dispositivo de entrada, en parte inspirado en el teclado de las máquinas de escribir.')),
            'status'=> $this->faker->boolean()

        ];
    }
}
