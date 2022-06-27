<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'Administrador',
                'email'=>'admin@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'administrador'
            ]
        );

        User::create(
            [
                'name'=>'Ana Romero',
                'email'=>'amromero@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado'
            ]
        );

        User::create(
            [
                'name'=>'Nielsandr Meza',
                'email'=>'nvmeza@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado'
            ]
        );

        User::create(
            [
                'name'=>'Jennifer Lazo',
                'email'=>'jennifer.lazo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado'
            ]
        );

        User::create(
            [
                'name'=>'Oscar Sanchez',
                'email'=>'osanchezg@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado'
            ]
        );

        User::create(
            [
                'name'=>'Wilmer Hernández',
                'email'=>'wnhernandezf@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado'
            ]
        );
    }
}
