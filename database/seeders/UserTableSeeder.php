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
                'type'=>'administrador',
                'address'=>'Colonia La Concepción',
                'telephone'=>'99999999'
            ]
        );

        User::create(
            [
                'name'=>'Ana Romero',
                'email'=>'amromero@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Colonia La Cofradía',
                'telephone'=>'99607004'
            ]
        );

        User::create(
            [
                'name'=>'Nielsandr Meza',
                'email'=>'nvmeza@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Colonia Nueva Esperanza',
                'telephone'=>'96832662'
            ]
        );

        User::create(
            [
                'name'=>'Jennifer Lazo',
                'email'=>'jennifer.lazo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Barrio Tierra Blanca',
                'telephone'=>'33476034'
            ]
        );

        User::create(
            [
                'name'=>'Oscar Sanchez',
                'email'=>'osanchezg@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Barrio Los Angeles',
                'telephone'=>'95795073'
            ]
        );

        User::create(
            [
                'name'=>'Wilmer Hernández',
                'email'=>'wnhernandezf@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Colonia La Pradera',
                'telephone'=>'94896083'
            ]
        );

        User::create(
            [
                'name'=>'Lester Bogran',
                'email'=>'lester-bogran@unah.edu.hn',
                'password' => bcrypt('12345678'),
                'type'=>'cliente',
                'address'=>'Colonia Los Andes',
                'telephone'=>'99178932'
            ]
        );


    }
}
