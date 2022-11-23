<?php

namespace Database\Seeders;

use App\Models\Compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20221120041127',
                'fecha_compra'=>'2022-11-20',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20221122041130',
                'fecha_compra'=>'2022-11-22',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20221123041248',
                'fecha_compra'=>'2022-11-23',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20221124041010',
                'fecha_compra'=>'2022-10-24',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220920040905',
                'fecha_compra'=>'2022-09-20',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220805041145',
                'fecha_compra'=>'2022-08-05',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220703041234',
                'fecha_compra'=>'2022-07-03',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220601041022',
                'fecha_compra'=>'2022-06-01',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220501041220',
                'fecha_compra'=>'2022-05-01',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220420040900',
                'fecha_compra'=>'2022-04-20',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220323041234',
                'fecha_compra'=>'2022-03-23',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220228041322',
                'fecha_compra'=>'2022-02-28',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20221123041145',
                'fecha_compra'=>'2022-01-05',
                'proveedor_id'=>'10',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220105041444',
                'fecha_compra'=>'2022-01-05',
                'proveedor_id'=>'19',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20220105041233',
                'fecha_compra'=>'2022-01-05',
                'proveedor_id'=>'25',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );

        $compra = Compra::create(
            [
                'docummento_compra'=>'CP20221120041127',
                'fecha_compra'=>'2021-12-12',
                'proveedor_id'=>'1',
                'user_id'=>'1',
                'estado_compra'=>'g',
            ]
        );
    }
}
