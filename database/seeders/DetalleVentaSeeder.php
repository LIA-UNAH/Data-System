<?php

namespace Database\Seeders;

use App\Models\DetalleVenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'1',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'3',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'2',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'1',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'3',
                'producto_id'=>'2',
                'cantidad_detalle_venta'=>'10',
                'precio_venta'=>'710.97',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'4',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'1',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'4',
                'producto_id'=>'2',
                'cantidad_detalle_venta'=>'5',
                'precio_venta'=>'710.97',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'5',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'1',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'6',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'7',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'8',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'9',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'10',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'11',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'12',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );

        $detalleventa = DetalleVenta::create(
            [
                'venta_id'=>'13',
                'producto_id'=>'1',
                'cantidad_detalle_venta'=>'2',
                'precio_venta'=>'10450',
            ]
        );
    }
}
