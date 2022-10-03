<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraClienteController;
use App\Http\Controllers\CuentasPorCobrarController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
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

Auth::routes();
Route::get('sendmail', [MailController::class, 'index']);
Route::group(['middleware' => 'auth'], function () {

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Información del sistema
Route::get('/info', [UserController::class, 'info'])->name('info');

/*
|--------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/

// Listar usuarios
Route::get('/usuarios', [UserController::class, 'index'])->middleware('can:controlTotal')
    ->name('usuarios.index');

// Buscar usuarios
Route::get('/usuarios/busqueda', [UserController::class, 'search'])->middleware('can:controlTotal')
    ->name('usuarios.searchIndex');

// Agregar usuarios
Route::get("/usuarios/create", [UserController::class, "create"])->middleware('can:controlTotal')
    ->name("usuarios.create");

Route::post("/usuarios/create", [UserController::class, "store"])->middleware('can:controlTotal')
    ->name("usuarios.create");

// Editar usuarios
Route::get("/usuarios/{id}/edit", [UserController::class, "edit"])->middleware('can:controlTotal')
    ->name("usuarios.edit")->where('id', '[0-9]+');

Route::put("/usuarios/{id}/edit", [UserController::class, "update"])->middleware('can:controlTotal')
    ->name("usuarios.edit")->where('id', '[0-9]+');

// Eliminar usuarios
Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->middleware('can:controlTotal')
    ->name('usuarios.destroy');

// Visualizar usuarios
Route::get("/usuarios/{id}/", [UserController::class, "show"])->middleware('can:controlTotal')
    ->name("usuarios.show")->where('id', '[0-9]+');

// Perfil de usuario
Route::get("/profile", [UserController::class, "profile"])->middleware('can:controlTotal')
    ->name("usuarios.profile")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/

// Visualizar clientes
Route::get('/clientes', [ClienteController::class, 'index'])->middleware('can:controlParcial')
    ->name('clientes.index');

// Buscar clientes
Route::get('/clientes/busqueda', [ClienteController::class, 'search'])->middleware('can:controlParcial')
    ->name('clientes.searchIndex');

// Agregar clientes
Route::get("/clientes/create", [ClienteController::class, "create"])->middleware('can:controlParcial')
    ->name("clientes.create");

Route::post("/clientes/create", [ClienteController::class, "store"])->middleware('can:controlParcial')
    ->name("clientes.create");

// Editar clientes
Route::get("/clientes/{id}/edit", [ClienteController::class, "edit"])->middleware('can:controlParcial')
    ->name("clientes.edit")->where('id', '[0-9]+');

Route::put("/clientes/{id}/edit", [ClienteController::class, "update"])->middleware('can:controlParcial')
    ->name("clientes.edit")->where('id', '[0-9]+');

// Eliminar clientes
Route::delete('/clientes/{user}', [ClienteController::class, 'destroy'])->middleware('can:controlParcial')
    ->name('clientes.destroy');

// Visualizar clientes
Route::get("/clientes/{id}/", [ClienteController::class, "show"])->middleware('can:controlParcial')
    ->name("clientes.show")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
*/

//HU20 - #PRODUCTOS# index, create, store, show, edit, update, destroy
// Listar productos
Route::get('/productos', [ProductoController::class, 'index'])->middleware('can:controlDeCliente')
    ->name('productos.index');

// Buscar productos
Route::get('/productos/busqueda', [ProductoController::class, 'search'])->middleware('can:controlDeCliente')
    ->name('productos.searchIndex');

// Agregar productos
Route::get("/productos/create", [ProductoController::class, "create"])->middleware('can:controlDeCliente')
    ->name("productos.create");

Route::post("/productos/create", [ProductoController::class, "store"])->middleware('can:controlDeCliente')
    ->name("productos.create");

// Editar productos
Route::get("/productos/{id}/edit", [ProductoController::class, "edit"])->middleware('can:controlParcial')
    ->name("productos.edit")->where('id', '[0-9]+');

Route::put("/productos/{id}/edit", [ProductoController::class, "update"])->middleware('can:controlParcial')
    ->name("productos.edit")->where('id', '[0-9]+');

// Visualizar productos
Route::get("/productos/{id}/", [ProductoController::class, "show"])->middleware('can:controlParcial')
    ->name("productos.show")->where('id', '[0-9]+');

// Eliminar productos
Route::delete('/productos/{user}', [ProductoController::class, 'destroy'])->middleware('can:controlParcial')
    ->name('productos.destroy');

/*
|--------------------------------------------------------------------------
| Pedidos
|--------------------------------------------------------------------------
*/

//Listar pedidos
Route::resource('/pedidos', PedidoController::class)->middleware('can:controlDeCliente')->middleware('can:controlDeCliente');

// Visualizar pedido
Route::get('pedidos/{id}/show', [App\Http\Controllers\PedidoController::class, 'show'])->middleware('can:controlDeCliente')
    ->name('pedidos.mostrar');

// Editar pedido
Route::get('/pedidos/{id}/editar', [App\Http\Controllers\PedidoController::class, 'edit'])->middleware('can:controlDeCliente')
    ->name('pedido.edit')
    ->where('id', '[0-9]+');

Route::put('/pedidos/{id}/editar', [App\Http\Controllers\PedidoController::class, 'update'])->middleware('can:controlDeCliente')
    ->name('pedido.update')
    ->where('id', '[0-9]+');

// Eliminar pedido
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->middleware('can:controlDeCliente')
    ->name('pedidos.destroy');


/*
|--------------------------------------------------------------------------
| Proveedores
|--------------------------------------------------------------------------
*/

// Listar proveedores
Route::get('/proveedor', [ProveedorController::class, 'index'])->middleware('can:controlParcial')
    ->name('proveedor.index');

// Agregar proveedor
Route::get("/proveedor/create", [ProveedorController::class, "create"])->middleware('can:controlParcial')
    ->name("proveedor.create");

Route::post("/proveedor/create", [ProveedorController::class, "store"])->middleware('can:controlParcial')
    ->name("proveedor.create");

// Eliminar proveedor
Route::delete('/proveedor/{proved}', [ProveedorController::class, 'destroy'])->middleware('can:controlParcial')
    ->name('proveedor.destroy');

// Editar proveedor
Route::get("/proveedor/{id}/edit", [ProveedorController::class, "edit"])->middleware('can:controlParcial')
    ->name("proveedor.edit")->where('id', '[0-9]+');

Route::put("/proveedor/{id}/edit", [ProveedorController::class, "update"])->middleware('can:controlParcial')
    ->name("proveedor.edit")->where('id', '[0-9]+');

// Editar proveedor
Route::put('/proveedor/{id}/editar', [ProveedorController::class, 'update'])->middleware('can:controlParcial')
    ->name('proveedor.update');

// Visualizar proveedor
Route::get("/proveedor/{id}/", [ProveedorController::class, "show"])->middleware('can:controlParcial')
    ->name("proveedor.show")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Ventas
|--------------------------------------------------------------------------
*/

// Visualizar ventas
Route::resource('/ventas', VentaClienteController::class)->middleware('can:controlParcial');

// Registrar venta
Route::get("/ventas/create", [App\Http\Controllers\VentaClienteController::class, "create"])->middleware('can:controlParcial')
    ->name("ventas.create");

Route::post("/ventas/create", [App\Http\Controllers\VentaClienteController::class, "store"])->middleware('can:controlParcial')
    ->name("ventas.store");

// Buscar ventas
Route::get('/ventas/busqueda', [App\Http\Controllers\VentaClienteController::class, 'search'])->middleware('can:controlParcial')
    ->name('ventas.searchIndex');

// Factura ventas
Route::get('/ventas/facturas/{id}', [App\Http\Controllers\VentaClienteController::class, 'show'])->middleware('can:controlParcial')
    ->name('ventas.facturas');

// Vista Previa Factura
Route::get('/ventas/factura/', [App\Http\Controllers\VentaClienteController::class, 'factura'])->middleware('can:controlParcial')
    ->name('ventas.factura');

//Buscar producto al registrar venta
Route::get('/ventas/create/busquedapro', [App\Http\Controllers\VentaClienteController::class, 'buscarpro'])->middleware('can:controlParcial')
    ->name('ventas.buscarpro');

//marcar venta como pagada
Route::get('/ventas/pagar/{id}', [VentaClienteController::class, 'pagar_factura'])->middleware('can:controlParcial')
    ->name('ventas.pagar');

/*
|--------------------------------------------------------------------------
| Compras
|--------------------------------------------------------------------------
*/

// Visualizar Compras
Route::resource('/compras', CompraClienteController::class)->middleware('can:controlDeCliente');

Route::post('/compras/guardar', [App\Http\Controllers\CompraClienteController::class, 'compra_guardar'])->middleware('can:controlDeCliente')
        ->name('compras.guardar_compra');

/*
|--------------------------------------------------------------------------
| Inventario
|--------------------------------------------------------------------------
*/

// Visualizar inventario
Route::get('/inventario', [ProductoController::class, 'index_inventario'])->middleware('can:controlDeCliente')
    ->name('inventario.index');

/*
|--------------------------------------------------------------------------
| Categorias
|--------------------------------------------------------------------------
*/

// Listar categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->middleware('can:controlParcial')
    ->name('categorias.index');

// Buscar categorias
Route::get('/categorias/busqueda', [CategoriaController::class, 'search'])->middleware('can:controlParcial')
    ->name('categorias.searchIndex');

// Agregar categorias
Route::get("/categorias/create", [CategoriaController::class, "create"])->middleware('can:controlParcial')
    ->name("categorias.create");

Route::post("/categorias/create", [CategoriaController::class, "store"])->middleware('can:controlParcial')
    ->name("categorias.create");

// Editar categorias
Route::get("/categorias/{id}/edit", [CategoriaController::class, "edit"])->middleware('can:controlParcial')
    ->name("categorias.edit")->where('id', '[0-9]+');

Route::put("/categorias/{id}/edit", [CategoriaController::class, "update"])->middleware('can:controlParcial')
    ->name("categorias.edit")->where('id', '[0-9]+');

// Eliminar categoria
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->middleware('can:controlParcial')
    ->name('categorias.destroy');

// Visualizar categoria
Route::get("/categorias/{id}/", [CategoriaController::class, "show"])->middleware('can:controlParcial')
    ->name("categorias.show")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Reparaciones
|--------------------------------------------------------------------------
*/

// Listar reparaciones
Route::get('/reparaciones', [ReparacionController::class, 'index'])->middleware('can:controlParcial')
    ->name('reparaciones.index');

// Buscar reparaciones
Route::get('/reparaciones/busqueda', [ReparacionController::class, 'search'])->middleware('can:controlParcial')
    ->name('reparaciones.searchIndex');

// Agregar reparaciones
Route::get("/reparaciones/create", [ReparacionController::class, "create"])->middleware('can:controlParcial')
    ->name("reparaciones.create");

Route::post("/reparaciones/create", [ReparacionController::class, "store"])->middleware('can:controlParcial')
    ->name("reparaciones.create");

// Editar reparaciones
Route::get("/reparaciones/{id}/edit", [ReparacionController::class, "edit"])->middleware('can:controlParcial')
    ->name("reparaciones.edit")->where('id', '[0-9]+');

Route::put("/reparaciones/{id}/edit", [ReparacionController::class, "update"])->middleware('can:controlParcial')
    ->name("reparaciones.edit")->where('id', '[0-9]+');

// Eliminar reparaciones
Route::delete('/reparaciones/{reparacion}', [ReparacionController::class, 'destroy'])->middleware('can:controlParcial')
    ->name('reparaciones.destroy');

// Visualizar reparaciones
Route::get("/reparaciones/{id}/", [ReparacionController::class, "show"])->middleware('can:controlParcial')
    ->name("reparaciones.show")->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Cobros
|--------------------------------------------------------------------------
*/

// Listar cobros
Route::get('/cobros', [CuentasPorCobrarController::class, 'index'])->middleware('can:controlParcial')
    ->name('cobros.index');

});

