<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descripcion'=> $this->faker->text($maxNbChars = 15) ,
            'codigo'=> $this->faker-> bothify('??####?##?####?'),
            'existencia'=> $this->faker->numberBetween($min = 1, $max = 500) ,
            'prec_venta'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 1000),
            'categoria'=> $this->faker->text($maxNbChars = 10),
            'impuesto'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0.1, $max = 0.50),
            'imagen_producto'=>$this->faker->imageUrl(360, 360)
        ];
    }
}
