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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::resource('/usuarios', 'App\Http\Controllers\Admin\UsuariosController', ['as'=>'admin']);
    Route::resource('/categorias', 'App\Http\Controllers\Admin\CategoriasController', ['as'=>'admin']);
    Route::resource('/subcategorias', 'App\Http\Controllers\Admin\SubcategoriasController', ['as'=>'admin']);
    Route::resource('/productos', 'App\Http\Controllers\Admin\ProductosController', ['as'=>'admin']);
    Route::resource('/publicaciones', 'Admin\PublicacionesController', ['as'=>'admin']);
    Route::resource('/portadas', 'Admin\PortadasController', ['as'=>'admin']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
