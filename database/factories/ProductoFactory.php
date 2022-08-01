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
            'nombre'=> $this->faker->randomElement($array = array ('Teléfono','Computadora', 'Parlante', 'Audífonos',
                                                                    'Protectores', 'Pasta térmica', 'Pantallas', 'Vidrio templado',
                                                                    'Mouse', 'Memorias USB', 'Memorias SD', 'Cargadores',
                                                                    'Cables USB', 'Cables HDMI', 'Teclados', 'WebCam', 'Impresoras',
                                                                    'Routers', 'MousePad', 'Adaptadores')),
            'descripcion'=> $this->faker->text($maxNbChars = 15) ,
            'codigo'=> $this->faker-> bothify('??#?##?##'),
            'existencia'=> $this->faker->numberBetween($min = 1, $max = 500) ,
            'prec_compra'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 1000),
            'prec_venta'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 1000),
            'categoria'=> $this->faker->randomElement($array = array ('Accesorios PCs y Celulares')),
            'imagen_producto'=>$this->faker->imageUrl(640,  480)
        ];
    }
}
