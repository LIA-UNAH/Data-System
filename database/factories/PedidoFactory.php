<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_Cliente'=>$this->faker->name(),
            'telefon_Cliente'=>$this->faker->e164PhoneNumber(),
            'ciudad'=>$this->faker->city(),
            'fecha_de_orden'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'estado_Pedido'=>$this->faker->randomElement($array = array ('Entregado','No entregado')),
            'detalle_Pedido'=>$this->faker->sentence(),
            'total_Pedido'=>$this->faker->numberBetween($min = 10, $max = 40000)
         ];
    }
}
