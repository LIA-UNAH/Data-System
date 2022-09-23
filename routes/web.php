<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraClienteController;
use App\Http\Controllers\ProveedorController;
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

// Visualizar usuarios
    Route::get('/usuarios', [UserController::class, 'index'])
        ->name('usuarios.index');

// Buscar usuarios
    Route::get('/usuarios/busqueda', [UserController::class, 'search'])
        ->name('usuarios.searchIndex');

// Agregar usuarios
    Route::get("/usuarios/create", [UserController::class, "create"])
        ->name("usuarios.create");

    Route::post("/usuarios/create", [UserController::class, "store"])
        ->name("usuarios.create");

// Editar usuarios
    Route::get("/usuarios/{id}/edit", [UserController::class, "edit"])
        ->name("usuarios.edit")->where('id', '[0-9]+');

    Route::put("/usuarios/{id}/edit", [UserController::class, "update"])
        ->name("usuarios.edit")->where('id', '[0-9]+');

// Eliminar usuarios
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])
        ->name('usuarios.destroy');

// Visualizar usuarios
    Route::get("/usuarios/{id}/", [UserController::class, "show"])
        ->name("usuarios.show")->where('id', '[0-9]+');

// Perfil de usuario
    Route::get("/profile", [UserController::class, "profile"])
        ->name("usuarios.profile")->where('id', '[0-9]+');

    /*
    |--------------------------------------------------------------------------
    | Clientes
    |--------------------------------------------------------------------------
    */

// Visualizar clientes
    Route::get('/clientes', [ClienteController::class, 'index'])
        ->name('clientes.index');

// Buscar clientes
    Route::get('/clientes/busqueda', [ClienteController::class, 'search'])
        ->name('clientes.searchIndex');

// Agregar clientes
    Route::get("/clientes/create", [ClienteController::class, "create"])
        ->name("clientes.create");

    Route::post("/clientes/create", [ClienteController::class, "store"])
        ->name("clientes.create");

// Editar clientes
    Route::get("/clientes/{id}/edit", [ClienteController::class, "edit"])
        ->name("clientes.edit")->where('id', '[0-9]+');

    Route::put("/clientes/{id}/edit", [ClienteController::class, "update"])
        ->name("clientes.edit")->where('id', '[0-9]+');

// Eliminar clientes
    Route::delete('/clientes/{user}', [ClienteController::class, 'destroy'])
        ->name('clientes.destroy');

// Visualizar clientes
    Route::get("/clientes/{id}/", [ClienteController::class, "show"])
        ->name("clientes.show")->where('id', '[0-9]+');

    /*
    |--------------------------------------------------------------------------
    | Productos
    |--------------------------------------------------------------------------
    */

//HU20 - #PRODUCTOS# index, create, store, show, edit, update, destroy
// Listar productos
    Route::get('/productos', [ProductoController::class, 'index'])
        ->name('productos.index');

// Buscar productos
    Route::get('/productos/busqueda', [ProductoController::class, 'search'])
        ->name('productos.searchIndex');

// Agregar productos
Route::get("/productos/create", [ProductoController::class, "create"])
        ->name("productos.create");

Route::post("/productos/create", [ProductoController::class, "store"])
        ->name("productos.create");

// Editar productos
Route::get("/productos/{id}/edit", [ProductoController::class, "edit"])
        ->name("productos.edit")->where('id', '[0-9]+');

Route::put("/productos/{id}/edit", [ProductoController::class, "update"])
        ->name("productos.edit")->where('id', '[0-9]+');

// Visualizar productos
Route::get("/productos/{id}/", [ProductoController::class, "show"])
        ->name("productos.show")->where('id', '[0-9]+');

// Eliminar productos
    Route::delete('/productos/{user}', [ProductoController::class, 'destroy'])
        ->name('productos.destroy');

/*
|--------------------------------------------------------------------------
| Pedidos
|--------------------------------------------------------------------------
*/

//HU23 - index, create, store, show, edit, updare, destroy
Route::resource('/pedidos', PedidoController::class);

// ver pedido
Route::get('pedidos/{id}/show', [App\Http\Controllers\PedidoController::class, 'show']
)->name('pedidos.mostrar');

// editar pedido
Route::get('/pedidos/{id}/editar',  [App\Http\Controllers\PedidoController::class, 'edit'])
->name('pedido.edit')
->where('id','[0-9]+');

//Actualizar Pedido
Route::put('/pedidos/{id}/editar', [App\Http\Controllers\PedidoController::class, 'update'])
->name('pedido.update')
->where('id','[0-9]+');

Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])
    ->name('pedidos.destroy');


/*
|--------------------------------------------------------------------------
| Proveedores
|--------------------------------------------------------------------------
*/

// Listar proveedores
Route::get('/proveedor', [ProveedorController::class, 'index'])
    ->name('proveedor.index');

// Agregar usuarios
    Route::get("/proveedor/create", [ProveedorController::class, "create"])
        ->name("proveedor.create");

    Route::post("/proveedor/create", [ProveedorController::class, "store"])
        ->name("proveedor.create");

// Eliminar proveedor
Route::delete('/proveedor/{proved}', [ProveedorController::class, 'destroy'])
    ->name('proveedor.destroy');

// Editar proveedores
    Route::get("/proveedor/{id}/edit", [ProveedorController::class, "edit"])
        ->name("proveedor.edit")->where('id', '[0-9]+');

    Route::put("/proveedor/{id}/edit", [ProveedorController::class, "update"])
        ->name("proveedor.edit")->where('id', '[0-9]+');

// Visualizar proveedor
    Route::get("/proveedor/{id}/", [ProveedorController::class, "show"])
        ->name("proveedor.show")->where('id', '[0-9]+');

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
    ->name("ventas.store");

// Buscar ventas
Route::get('/ventas/busqueda', [App\Http\Controllers\VentaClienteController::class, 'search'])
    ->name('ventas.searchIndex');

// Factura ventas
Route::get('/ventas/facturas/{id}', [App\Http\Controllers\VentaClienteController::class, 'factura'])
    ->name('ventas.facturas');

//buscar producto en ventas create
Route::get('/ventas/create/busquedapro', [App\Http\Controllers\VentaClienteController::class, 'buscarpro'])
    ->name('ventas.buscarpro');




/*
|--------------------------------------------------------------------------
| Compras
|--------------------------------------------------------------------------
*/

// Visualizar Compras
Route::resource('/compras', CompraClienteController::class);
Route::post('/compras/guardar', [App\Http\Controllers\CompraClienteController::class, 'compra_guardar'])
    ->name('compras.guardar_compra');


/*
|--------------------------------------------------------------------------
| Inventario
|--------------------------------------------------------------------------
*/

// Visualizar Inventario

Route::get('/inventario', [ProductoController::class, 'index_inventario'])
    ->name('inventario.index');

});


/*
|--------------------------------------------------------------------------
| Categorias
|--------------------------------------------------------------------------
*/

// Listar categorias
Route::get('/categorias', [CategoriaController::class, 'index'])
    ->name('categorias.index');

// Buscar categorias
Route::get('/categorias/busqueda', [CategoriaController::class, 'search'])
    ->name('categorias.searchIndex');

// Agregar categorias
Route::get("/categorias/create", [CategoriaController::class, "create"])
    ->name("categorias.create");

Route::post("/categorias/create", [CategoriaController::class, "store"])
    ->name("categorias.create");

// Editar categorias
Route::get("/categorias/{id}/edit", [CategoriaController::class, "edit"])
    ->name("categorias.edit")->where('id', '[0-9]+');

Route::put("/categorias/{id}/edit", [CategoriaController::class, "update"])
    ->name("categorias.edit")->where('id', '[0-9]+');

// Eliminar categoria
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])
    ->name('categorias.destroy');

// Visualizar categoria
Route::get("/categorias/{id}/", [CategoriaController::class, "show"])
    ->name("categorias.show")->where('id', '[0-9]+');

