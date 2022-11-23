<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000015',
                'fecha_factura'=>'2022-11-12',
                'user_id'=>'2',
                'cliente_id'=>'7',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'31350.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000014',
                'fecha_factura'=>'2022-11-13',
                'user_id'=>'3',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'10450.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000013',
                'fecha_factura'=>'2022-11-13',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'7109.70',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000012',
                'fecha_factura'=>'2022-10-23',
                'user_id'=>'2',
                'cliente_id'=>'7',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'14094.85',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000011',
                'fecha_factura'=>'2022-09-28',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'10450.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000010',
                'fecha_factura'=>'2022-08-24',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000009',
                'fecha_factura'=>'2022-07-12',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000008',
                'fecha_factura'=>'2022-06-05',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000008',
                'fecha_factura'=>'2022-05-09',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000008',
                'fecha_factura'=>'2022-04-10',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000008',
                'fecha_factura'=>'2022-03-31',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000008',
                'fecha_factura'=>'2022-02-27',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );

        $venta = Venta::create(
            [
                'numero_factura_venta'=>'001-001-00-00000008',
                'fecha_factura'=>'2022-01-22',
                'user_id'=>'2',
                'cliente_id'=>'8',
                'tipo_cliente_factura'=>'consumidor_final',
                'total'=>'20900.00',
                'estado'=>'pagado'
            ]
        );


    }
}
