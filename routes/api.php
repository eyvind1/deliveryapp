<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//enviar productos
Route::get('enviarproductos',[App\Http\Controllers\Api\JsonController::class,'enviarproductos']);
Route::post('recibirpedido',[App\Http\Controllers\Api\JsonController::class,'recibirpedido']);

//auth jwt

Route::post('register',[App\Http\Controllers\Api\UserController::class,'register']);
Route::post('login',[App\Http\Controllers\Api\UserController::class,'login']);
Route::get('logout',[App\Http\Controllers\Api\UserController::class,'logout']);
Route::get('user',[App\Http\Controllers\Api\UserController::class,'getCurrentUser']);

Route::post('update',[App\Http\Controllers\Api\UserController::class,'update']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
