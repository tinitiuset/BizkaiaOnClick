<?php

use App\Http\Controllers\EventoController;
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
// POST NEW EVENT
Route::post('/eventos', [EventoController::class,"store"]);
// EDIT EXISTING EVENT
Route::put('/eventos/{id}', [EventoController::class,"update"]);
// DELETE EXISTING EVENT
Route::delete('/eventos/{id}', [EventoController::class,"delete"]);
