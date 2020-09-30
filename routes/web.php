<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/','FrontController@index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/productos/{categoria}', [App\Http\Controllers\FrontController::class, 'categoria']);
Route::get('/productos/{categoria}/{subcategoria}', [App\Http\Controllers\FrontController::class, 'subcategoria']);
Route::get('/{producto}', [App\Http\Controllers\FrontController::class, 'producto']);
Route::get('/blog', [App\Http\Controllers\FrontController::class, 'blog']);
Route::get('/blog/{publicacion}', [App\Http\Controllers\FrontController::class, 'publicacion']);
Route::get('/tienda', [App\Http\Controllers\FrontController::class, 'tienda']);
Route::get('/direccion', [App\Http\Controllers\FrontController::class, 'direccion']);

Route::group(['prefix'=>'admin','middleware'=>'role:admin'], function(){
    Route::resource('/usuarios', 'App\Http\Controllers\Admin\UsuariosController', ['as'=>'admin']);
    Route::resource('/categorias', 'App\Http\Controllers\Admin\CategoriasController', ['as'=>'admin']);
    Route::resource('/subcategorias', 'App\Http\Controllers\Admin\SubcategoriasController', ['as'=>'admin']);
    Route::resource('/productos', 'App\Http\Controllers\Admin\ProductosController', ['as'=>'admin']);
    Route::resource('/pedidos', 'App\Http\Controllers\Admin\PedidosController', ['as'=>'admin']);
    Route::resource('/detalles', 'App\Http\Controllers\Admin\DetallesController', ['as'=>'admin']);
    Route::resource('/publicaciones', 'App\Http\Controllers\Admin\PublicacionesController', ['as'=>'admin']);
    Route::resource('/portadas', 'App\Http\Controllers\Admin\PortadasController', ['as'=>'admin']);
});

Route::post('/carrito/agregar',[App\Http\Controllers\CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito/checkout',[App\Http\Controllers\CarritoController::class, 'checkout'])->name('carrito.checkout');
Route::post('/carrito/remover',[App\Http\Controllers\CarritoController::class, 'remover'])->name('carrito.remover');
Route::post('/carrito/vaciar',[App\Http\Controllers\CarritoController::class, 'vaciar'])->name('carrito.vaciar');
Route::get('/carrito/procesopedido',[App\Http\Controllers\CarritoController::class, 'procesopedido'])->name('carrito.procesopedido');


Route::group(['prefix'=>'cliente','middleware'=>'role:cliente'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});



