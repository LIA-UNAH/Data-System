<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CuentasPorCobrar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CuentasPorCobrar>
 */
class CuentasPorCobrarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_cliente'=>$this->faker->name(),
            'identidad'=>$this->faker->numerify('0703-####-#####'),
            'domicilio'=>$this->faker->address(),
            'numTelefono'=>$this->faker->tollFreePhoneNumber(),
            'estado'=>$this->faker->randomElement($array = array ('Pendiente', 'pagado')),
            'fecha'=>$this->faker->date($format = 'd-m-Y', $max = 'now'),
            'venta'=>$this->faker->sentence()
        ];
    }
}
