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
                'telephone'=>'99999999',
                'image'=>'Perfil (39).jpg'
            ]
        );

        User::create(
            [
                'name'=>'Ana Romero',
                'email'=>'amromero@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Colonia La Cofradía',
                'telephone'=>'99607004',
                'image'=>'Perfil (40).jpg'
            ]
        );

        User::create(
            [
                'name'=>'Nielsandr Meza',
                'email'=>'nvmeza@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Colonia Nueva Esperanza',
                'telephone'=>'96832662',
                'image'=>'Perfil (26).jpg'
            ]
        );

        User::create(
            [
                'name'=>'Jennifer Lazo',
                'email'=>'jennifer.lazo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Barrio Tierra Blanca',
                'telephone'=>'33476034',
                'image'=>'Perfil (17).jpg'
            ]
        );

        User::create(
            [
                'name'=>'Oscar Sanchez',
                'email'=>'osanchezg@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Barrio Los Angeles',
                'telephone'=>'95795073',
                'image'=>'Perfil (9).jpg'
            ]
        );

        User::create(
            [
                'name'=>'Wilmer Hernández',
                'email'=>'wnhernandezf@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'empleado',
                'address'=>'Colonia La Pradera',
                'telephone'=>'94896083',
                'image'=>'Perfil (5).jpg'
            ]
        );

        User::create(
            [
                'name'=>'Lester Bogran',
                'email'=>'lester-bogran@unah.edu.hn',
                'password' => bcrypt('12345678'),
                'type'=>'cliente',
                'address'=>'Colonia Los Andes',
                'telephone'=>'99178932',
                'image'=>'Perfil (2).jpg'
            ]
        );


    }
}
