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
        $us = User::create(
            [
                'name'=>'Aleksandr Nolasco',
                'email'=>'data-system@outlook.es',
                'password' => bcrypt('DSA12345678.'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'La Esperanza, Intibuca; barrio el centro, frente emprendedores agrícolas negocio DSA',
                'telephone'=>'32042936',
                'image'=>'Perfil (39).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Nielsandr Meza',
                'email'=>'nvmeza@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Empleado',
                'customer'=>'mayorista',
                'address'=>'La Esperanza, Intibuca; barrio el centro, frente emprendedores agrícolas negocio DSA',
                'telephone'=>'96832662',
                'image'=>'Perfil (38).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Ana Romero',
                'email'=>'amromero@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'3917 Ayers Corpus Christi TX 78415 USA',
                'telephone'=>'99607004',
                'image'=>'Perfil (40).jpg'
            ]
        );
        $us->assignRole('Administrador');



        $us = User::create(
            [
                'name'=>'Jennifer Lazo',
                'email'=>'jennifer.lazo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Empleado',
                'customer'=>'mayorista',
                'address'=>'1303 San Jacinto Street Houston TX 77002 USA',
                'telephone'=>'33476034',
                'image'=>'Perfil (26).jpg'
            ]
        );
        $us->assignRole('Empleado');

        $us = User::create(
            [
                'name'=>'Oscar Sanchez',
                'email'=>'osanchezg@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Empleado',
                'customer'=>'mayorista',
                'address'=>'2419 E Haggar Ave Weslaco TX 78599 USA',
                'telephone'=>'95795073',
                'image'=>'Perfil (16).jpg'
            ]
        );
        $us->assignRole('Empleado');

        $us = User::create(
            [
                'name'=>'Wilmer Hernández',
                'email'=>'wnhernandezf@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Empleado',
                'customer'=>'mayorista',
                'address'=>'1303 San Jacinto Street Houston TX 77002 USA',
                'telephone'=>'94896083',
                'image'=>'Perfil (10).jpg'
            ]
        );
        $us->assignRole('Empleado');

        $us = User::create(
            [
                'name'=>'Jairo Martinez',
                'email'=>'jairo.martinez@unah.edu.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'1901 W Hwy 77 San Benito TX 78586 USA',
                'telephone'=>'99178932',
                'image'=>'Perfil (18).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Manuel Gonzalez',
                'email'=>'megonzalezl@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (35).jpg'
            ]
        );
        $us->assignRole('Empleado');

        $us = User::create(
            [
                'name'=>'Jorge Caceres',
                'email'=>'jcaceresb@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (34).jpg'
            ]
        );
        $us->assignRole('Empleado');

        $us = User::create(
            [
                'name'=>'Kimberly Martinez',
                'email'=>'kimberly.licona@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (34).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Meylin Merlo',
                'email'=>'meylin.merlo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (34).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Silvia Palma',
                'email'=>'silvia.palma@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (34).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Estefany López',
                'email'=>'estefanylopez@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (30).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Juan Vallecillo',
                'email'=>'juan_vallecillo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'99999999',
                'image'=>'Perfil (42).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Ingris Carcamo',
                'email'=>'ingris.carcamo@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'33333333',
                'image'=>'Perfil (47).jpg'
            ]
        );
        $us->assignRole('Administrador');

        $us = User::create(
            [
                'name'=>'Ruth Fonseca',
                'email'=>'ruth.fonseca@unah.hn',
                'password' => bcrypt('12345678'),
                'type'=>'Administrador',
                'customer'=>'mayorista',
                'address'=>'15800 South State Street South Holland IL 60473-1200 USA',
                'telephone'=>'33333333',
                'image'=>'Perfil (47).jpg'
            ]
        );
        $us->assignRole('Administrador');

    }
}
