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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/productos', [\App\Http\Controllers\ProductoController::class, 'index']);
Route::get('/productos/{idProducto}', [\App\Http\Controllers\ProductoController::class, 'show']);
Route::delete('/productos/{idProducto}', [\App\Http\Controllers\ProductoController::class, 'destroy']);
Route::post('/productos', [\App\Http\Controllers\ProductoController::class, 'store']);
Route::put('/productos/{idProducto}', [\App\Http\Controllers\ProductoController::class, 'update']);
Route::put('set_imagen/{idProducto}', [App\Http\Controllers\ProductoController::class, 'setImagen'])->name('set_imagen');
