<?php
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraClienteController;
use App\Http\Controllers\CuentasPorCobrarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Producto\Item\AgregarCarrito;
use App\Http\Livewire\Producto\Item\VerCarrito;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentaClienteController;
use App\Http\Livewire\Compras\CompraIndex;
use App\Http\Livewire\Compras\ComprasShow;
use App\Http\Livewire\Producto\Item\HistorialVentaCliente;
use App\Http\Livewire\Reparacion\ReparacionIndex;
use App\Http\Livewire\Reparacion\ReparacionShow;
use App\Http\Livewire\Ventas\VentaCreate;
use App\Http\Livewire\Ventas\VentaIndex;
use App\Http\Livewire\Ventas\VentasShow;
use App\Models\Compra;

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

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/venta', AgregarCarrito::class)->name('home-carrito');
    Route::get('/shopping', VerCarrito::class)->name('ver-carrito');
    Route::get('/historial', HistorialVentaCliente::class)->name('ver-carrito-historial');

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

    /*
   |--------------------------------------------------------------------------
   | Perfil
   |--------------------------------------------------------------------------
   */

    // Perfil de usuario
    Route::get("/profile", [UserController::class, "profile"])
        ->name("usuarios.profile")->where('id', '[0-9]+');

    // Editar perfil de usuario
    Route::get("/profile/{id}/edit_profile", [UserController::class, "edit_profile"])
        ->name("usuarios.edit_profile")->where('id', '[0-9]+');

    Route::put("/profile/{id}/edit_profile", [UserController::class, "update_profile"])
        ->name("usuarios.edit_profile")->where('id', '[0-9]+');

    // Perfil de cliente
    Route::get("/profile_cliente", [UserController::class, "profile_cliente"])
        ->name("usuarios.profile_cliente")->where('id', '[0-9]+');

    // Editar perfil de usuario
    Route::get("/profile_cliente/{id}/edit_profile_cliente", [UserController::class, "edit_profile_cliente"])
        ->name("usuarios.edit_profile_cliente")->where('id', '[0-9]+');

    Route::put("/profile_cliente/{id}/edit_profile_cliente", [UserController::class, "update_profile_cliente"])
        ->name("usuarios.edit_profile_cliente")->where('id', '[0-9]+');

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

    // Listar productos
    Route::get('/productos', [ProductoController::class, 'index'])->middleware('can:controlParcial')
        ->name('productos.index');

    // Buscar productos
    Route::get('/productos/busqueda', [ProductoController::class, 'search'])->middleware('can:controlParcial')
        ->name('productos.searchIndex');

    // Agregar productos
    Route::get("/productos/create", [ProductoController::class, "create"])->middleware('can:controlParcial')
        ->name("productos.create");

    Route::post("/productos/create", [ProductoController::class, "store"])->middleware('can:controlParcial')
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
    Route::resource('/pedidos', PedidoController::class)->middleware('can:controlParcial')->middleware('can:controlDeCliente');

    // Visualizar pedido
    Route::get('pedidos/{id}/show', [PedidoController::class, 'show'])->middleware('can:controlParcial')
        ->name('pedidos.mostrar');

    // Editar pedido
    Route::get('/pedidos/{id}/editar', [PedidoController::class, 'edit'])->middleware('can:controlParcial')
        ->name('pedido.edit')
        ->where('id', '[0-9]+');

    Route::put('/pedidos/{id}/editar', [PedidoController::class, 'update'])->middleware('can:controlParcial')
        ->name('pedido.update')
        ->where('id', '[0-9]+');

    // Eliminar pedido
    Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->middleware('can:controlParcial')
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
    Route::get('/ventas', VentaIndex::class)->name('ventas.index')->middleware('can:controlParcial');

    // Registrar venta
    Route::get('/ventas/create', VentaCreate::class)->name('ventas.create')->middleware('can:controlParcial');

    //Editar venta
    Route::get('/ventas/{id}/editar', VentaCreate::class)->name('ventas.edit')->middleware('can:controlParcial');

    // Buscar ventas
    Route::get('/ventas/busqueda', [VentaClienteController::class, 'search'])->middleware('can:controlParcial')
        ->name('ventas.searchIndex');

    // Factura ventas
    Route::get('/ventas/facturas/{venta}', VentasShow::class)->middleware('can:controlParcial')
        ->name('ventas.facturas');

    // Vista Previa Factura
    Route::get('/ventas/factura/', [VentaClienteController::class, 'factura'])->middleware('can:controlParcial')
        ->name('ventas.factura');

    // Buscar producto al registrar venta
    Route::get('/ventas/create/busquedapro', [VentaClienteController::class, 'buscarpro'])->middleware('can:controlParcial')
        ->name('ventas.buscarpro');

    // Marcar venta como pagada
    Route::get('/ventas/pagar/{id}', [VentaClienteController::class, 'pagar_factura'])->middleware('can:controlParcial')
        ->name('ventas.pagar');

    // PDF de venta
    Route::get('/ventas/facturas/descargarPDF/{id}', [VentaClienteController::class, 'pdf'])->middleware('can:controlParcial')
        ->name('ventas.pdf');

    /*
    |--------------------------------------------------------------------------
    | Compras
    |--------------------------------------------------------------------------
    */


    Route::resource('/compras', CompraClienteController::class)->middleware('can:controlParcial');


    Route::get('/lis_compras', CompraIndex::class)->name('compras.index2')->middleware('can:controlParcial');

    // Buscar compras
    Route::get('/compras/busqueda', [CompraClienteController::class, 'search'])->middleware('can:controlParcial')
        ->name('compras.searchIndex');

    Route::post('/compras/guardar', [CompraClienteController::class, 'compra_guardar'])->middleware('can:controlParcial')
        ->name('compras.guardar_compra');

    // Factura ventas
    Route::get('/compras/comprobante/{compra}', ComprasShow::class)->middleware('can:controlParcial')
        ->name('compras.facturas');

    /*
    |--------------------------------------------------------------------------
    | Inventario
    |--------------------------------------------------------------------------
    */

    // Visualizar inventario
    Route::get('/inventario', [ProductoController::class, 'index_inventario'])->middleware('can:controlParcial')
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

    // Eliminar categoria
    Route::post('/categorias/{categoria}', [CategoriaController::class, 'cambioEstado'])->middleware('can:controlParcial')
        ->name('categorias.cambiar');

    /*
    |--------------------------------------------------------------------------
    | Reparaciones
    |--------------------------------------------------------------------------
    */

    // Listar reparaciones
    Route::get('/reparaciones', ReparacionIndex::class)->name('reparaciones.index')->middleware('can:controlParcial');

    // Route::get('/reparaciones', [ReparacionController::class, 'index'])->middleware('can:controlParcial')
    //     ->name('reparaciones.index');

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
    Route::get("/reparaciones/{reparacion}/", ReparacionShow::class)->middleware('can:controlParcial')
        ->name("reparaciones.show")->where('id', '[0-9]+');
    // Route::get("/reparaciones/{id}/", [ReparacionController::class, "show"])->middleware('can:controlParcial')
    //     ->name("reparaciones.show")->where('id', '[0-9]+');

    /*
    |--------------------------------------------------------------------------
    | Cobros
    |--------------------------------------------------------------------------
    */

    // Listar cobros
    Route::get('/cobros', [CuentasPorCobrarController::class, 'index'])->middleware('can:controlParcial')
        ->name('cobros.index');

    // Visualizar cobros
    Route::get('cobros/{id}/show', [CuentasPorCobrarController::class, 'show'])->middleware('can:controlParcial')
        ->name('cobro.mostrar');

    //Reload
    Route::get('/vista', [HomeController::class , 'vista_tabla']);
});

