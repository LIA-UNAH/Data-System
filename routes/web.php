<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentaClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/

// Visualizar usuarios
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])
    ->name('usuarios.index');

// Buscar usuarios
Route::get('/usuarios/busqueda', [App\Http\Controllers\UserController::class, 'search'])
    ->name('usuarios.searchIndex');

// Agregar usuarios
Route::get("/usuarios/create", [App\Http\Controllers\UserController::class, "create"])
    ->name("usuarios.create");

Route::post("/usuarios/create", [App\Http\Controllers\UserController::class, "store"])
    ->name("usuarios.create");

// Editar usuarios
Route::get("/usuarios/{id}/edit", [App\Http\Controllers\UserController::class, "edit"])
    ->name("usuarios.edit")->where('id', '[0-9]+');

Route::put("/usuarios/{id}/edit", [App\Http\Controllers\UserController::class, "update"])
    ->name("usuarios.edit")->where('id', '[0-9]+');

// Eliminar usuarios
Route::delete('/usuarios/{user}', [App\Http\Controllers\UserController::class, 'destroy'])
    ->name('usuarios.destroy');

// Visualizar usuarios
Route::get("/usuarios/{id}/", [App\Http\Controllers\UserController::class, "show"])
    ->name("usuarios.show")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/

// Visualizar clientes
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])
    ->name('clientes.index');

// Buscar clientes
Route::get('/clientes/busqueda', [App\Http\Controllers\ClienteController::class, 'search'])
    ->name('clientes.searchIndex');

// Agregar clientes
Route::get("/clientes/create", [App\Http\Controllers\ClienteController::class, "create"])
    ->name("clientes.create");

Route::post("/clientes/create", [App\Http\Controllers\ClienteController::class, "store"])
    ->name("clientes.create");

// Editar clientes
Route::get("/clientes/{id}/edit", [App\Http\Controllers\ClienteController::class, "edit"])
    ->name("clientes.edit")->where('id', '[0-9]+');

Route::put("/clientes/{id}/edit", [App\Http\Controllers\ClienteController::class, "update"])
    ->name("clientes.edit")->where('id', '[0-9]+');

// Eliminar clientes
Route::delete('/clientes/{user}', [App\Http\Controllers\ClienteController::class, 'destroy'])
    ->name('clientes.destroy');

// Visualizar usuarios
Route::get("/clientes/{id}/", [App\Http\Controllers\ClienteController::class, "show"])
    ->name("clientes.show")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
*/

//HU20 - #PRODUCTOS# index, create, store, show, edit, update, destroy
Route::resource('/productos', ProductoController::class);
//Ver Producto

Route::get('productos/{id}/show', [App\Http\Controllers\ProductoController::class, 'show']
)->name('productos.ver');

// Editar Producto
Route::get('/productos/{id}/editar',  [App\Http\Controllers\ProductoController::class, 'edit'])
->name('producto.edit')
->where('id','[0-9]+');

// Actualizar Producto
Route::put('/productos/{id}/editar', [App\Http\Controllers\ProductoController::class, 'update'])
->name('producto.update')
->where('id','[0-9]+');

/*
|--------------------------------------------------------------------------
| Pedidos
|--------------------------------------------------------------------------
*/

//HU23 - index, create, store, show, edit, updare, destroy
Route::resource('/pedidos', PedidoController::class);

Route::get('pedidos/{id}/show', [App\Http\Controllers\PedidoController::class, 'show']
)->name('pedidos.mostrar');

/*
|--------------------------------------------------------------------------
| Proveedores
|--------------------------------------------------------------------------
*/

// Visualizar proveedor
Route::get('/proveedor', [App\Http\Controllers\ProveedorController::class, 'index'])
    ->name('proveedor.index');

// Crear proveedor
Route::post('/proveedor/crear', [App\Http\Controllers\ProveedorController::class, 'store'])
    ->name('proveedor.store');

// Eliminar proveedor
Route::delete('/proveedor/{proved}', [App\Http\Controllers\ProveedorController::class, 'destroy'])
    ->name('proveedor.destroy');

// Editar proveedor
Route::get('/proveedor/{id}/edit', [App\Http\Controllers\ProveedorController::class, 'edit'])
    ->name('proveedor.edit');

// Editar proveedor
Route::put('/proveedor/{id}/editar', [App\Http\Controllers\ProveedorController::class, 'update'])
    ->name('proveedor.update');

/*
|--------------------------------------------------------------------------
| Ventas
|--------------------------------------------------------------------------
*/

// Visualizar ventas
Route::resource('/ventas', VentaClienteController::class);

//Crear venta

Route::get("/ventas/create", [App\Http\Controllers\VentaClienteController::class, "create"])
    ->name("ventas.create");

Route::post("/ventas/create", [App\Http\Controllers\VentaClienteController::class, "store"])
    ->name("ventas.create");

// Buscar ventas
Route::get('/ventas/busqueda', [App\Http\Controllers\VentaClienteController::class, 'search'])
    ->name('ventas.searchIndex');

// Factura ventas
Route::get('/ventas/facturas', [App\Http\Controllers\VentaClienteController::class, 'factura'])
    ->name('ventas.facturas');

    //buscar producto en ventas create
    Route::get('/ventas/create/busquedapro', [App\Http\Controllers\VentaClienteController::class, 'buscarpro'])
    ->name('ventas.buscarpro');
