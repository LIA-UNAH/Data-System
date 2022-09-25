<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reparacion>
 */
class ReparacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha_entrada'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'fecha_salida'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'marca'=> $this->faker->randomElement($array = array ('Samsung','Apple','LG','Sony')),
            'modelo'=> $this->faker->randomElement($array = array ('AX54','S8+ 5G','7KRT','R56T','A50s')),
            'descripcion'=> $this->faker->randomElement($array = array ('Mantenimiento general preventivo y correctivo.',
                'Bateria se descarga muy rápido.',
                'Actualización de software.',
                'Cambio de memoria RAM (8GB) y almacenamiento SSD (512GB).')),
            'costo_reparacion'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 550),
            'cliente_id' => $this->faker->numberBetween(1,4 ).$this->faker->numerify('#')
        ];
    }
}
