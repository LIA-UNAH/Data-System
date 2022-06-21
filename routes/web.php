<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Rutas para usuarios
*/

//HU5 - Visualizar usurios
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])
    ->name('usuarios.index');

//HU6 - Eliminar usuario
Route::delete('/usuarios/{user}', [App\Http\Controllers\UserController::class, 'destroy'])
    ->name('usuarios.destroy');

//HU8 - Buscar y recargar usuario
Route::get('/usuarios/busqueda', [App\Http\Controllers\UserController::class, 'search'])
    ->name('usuarios.searchIndex');



