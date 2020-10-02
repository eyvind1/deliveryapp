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

//auth jwt

Route::post('register',[Api\UserController::class,'register']);
Route::post('login',[Api\UserController::class,'login']);
Route::get('logout',[Api\UserController::class,'logout']);
Route::get('user',[Api\UserController::class,'getCurrentUser']);

Route::post('update',[Api\UserController::class,'update']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
