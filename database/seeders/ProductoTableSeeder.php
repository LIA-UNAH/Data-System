<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = Producto::create(
            [
                'codigo'=>'TAB12345678ABCD',
                'marca'=>'Samsung',
                'modelo'=>'Galaxy Tab A7',
                'descripcion'=>' TFT de 10,4 pulgadas FullHD+ a 2.000 x 1.200. Ratio 5:3. 8 núcleos a 2GHz, 3GB/32GB 3GB/64GB MicroSD',
                'existencia'=>'250',
                'prec_compra'=>'1020',
                'prec_venta_fin'=>'1040',
                'prec_venta_may'=>'1070',
                'id_categoria'=> '3',
                'imagen_producto'=> 'galaxy-tab-a7.jpg',
            ]
        );
    }
}
