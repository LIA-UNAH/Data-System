<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        \App\Models\Proveedor::factory(100)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\Producto::factory(100)->create();
        \App\Models\Pedido::factory(100)->create();
        \App\Models\Reparacion::factory(15)->create();
        \App\Models\CuentasPorCobrar::factory(100)->create();
        $this->call(CompraTableSeeder::class);
        $this->call(DetalleCompraTableSeeder::class);
        $this->call(VentaTableSeeder::class);
        $this->call(DetalleVentaSeeder::class);

    }
}
