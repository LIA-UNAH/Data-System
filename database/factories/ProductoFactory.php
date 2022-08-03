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
            'codigo'=> $this->faker->randomElement($array = array ('TEL','TAB','CAB','TEC')).''.$this->faker-> bothify('#######'),
            'nombre'=> $this->faker->randomElement($array = array ('Teléfono','Computadora', 'Parlante', 'Audífonos',
                                                                    'Protectores', 'Pasta térmica', 'Pantallas', 'Vidrio templado',
                                                                    'Mouse', 'Memorias USB', 'Memorias SD', 'Cargadores',
                                                                    'Cables USB', 'Cables HDMI', 'Teclados', 'WebCam', 'Impresoras',
                                                                    'Routers', 'MousePad', 'Adaptadores')),
            'modelo'=> $this->faker->randomElement($array = array ('AX65','S8+','7K R56','A50s')),
            'descripcion'=> $this->faker->text($maxNbChars = 15),
            'existencia'=> $this->faker->numberBetween($min = 1, $max = 500),
            'prec_compra'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 1000),
            'prec_venta_may'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 1000),
            'prec_venta_fin'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 1000),
            'id_categoria'=> $this->faker->numberBetween(1,5),
            'imagen_producto'=> $this->faker->randomElement($array = array ('playstation.webp','xbox.jpg','mouse.jpeg', 'auriculares.jpg', 'beats.webp')),
        ];
    }
}
