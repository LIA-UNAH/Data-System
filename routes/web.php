<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
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

/* Rutas para usuarios */

//HU5 - Visualizar usurios
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])
    ->name('usuarios.index');

//HU6 - Eliminar usuario
Route::delete('/usuarios/{user}', [App\Http\Controllers\UserController::class, 'destroy'])
    ->name('usuarios.destroy');

//HU8 - Buscar y recargar usuario
Route::get('/usuarios/busqueda', [App\Http\Controllers\UserController::class, 'search'])
    ->name('usuarios.searchIndex');

//HU20 - #PRODUCTOS# index, create, store, show, edit, update, destroy 
Route::resource('/productos', ProductoController::class);

//HU23 - index, create, store, show, edit, updare, destroy 
Route::resource('/pedidos', PedidoController::class);
Route::post('/pedidos', [App\Http\Controllers\PedidoController::class, 'store'])->name('pedido.store');

//Visualizar clientes
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])
    ->name('clientes.index');
//Buscar y recargar clientes
Route::get('/clientes/busqueda', [App\Http\Controllers\ClienteController::class, 'search'])
    ->name('clientes.searchIndex');
//editar clientes
Route::post('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])
->name('clientes.update');
//Eliminar cliente
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy'])
->name('clientes.destroy');


//Visualizar proveedor
Route::get('/proveedor', [App\Http\Controllers\ProveedorController::class, 'index'])
    ->name('proveedor.index');
//Visualizar proveedor
Route::post('/proveedor/crear', [App\Http\Controllers\ProveedorController::class, 'store'])
->name('proveedor.store');

