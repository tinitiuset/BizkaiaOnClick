<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FotoController;
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

/*--------------------EVENTO--------------------*/
// GET EVENT
Route::get('eventos/{id}', [EventoController::class,"get"]);
// GET EVENTS
Route::get('eventos', [EventoController::class,"getAll"]);
// POST NEW EVENT
Route::post('eventos', [EventoController::class,"store"]);
// EDIT EXISTING EVENT
Route::put('eventos/{id}', [EventoController::class,"update"]);
// GET CATEGORIAS
Route::get('categorias', [CategoriaController::class,"getAll"]);


/*--------------------FOTO--------------------*/
// GET FOTO
Route::get('fotos/{id}', [FotoController::class,'get']);
// GET FOTOS
Route::get('fotos' , [FotoController::class, 'getAll']);
// POST NEW FOTO
Route::post('fotos',[FotoController::class, 'store']);
