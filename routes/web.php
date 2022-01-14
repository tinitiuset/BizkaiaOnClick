<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventoAdminController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', [InicioController::class, 'index'])->name('inicio');

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'agenda'], function() {

//     // Route::get('/',[EventoController::class,"index"])->name("agenda.listado");
//     // Route::get("/create", [EventoController::class,"create"])->name("agenda.create");
//     // Route::get("/{id}", [EventoController::class,"show"])->name("agenda.detalle");
//     // Route::post("/", [EventoController::class,"store"])->name("agenda.store");

    

// });

Route::resource("agenda",EventoController::class);



// Route::group(['prefix' => 'admin'], function() {
//     Route::resources([
//         "eventos" => EventoAdminController::class
//     ]);
// });

// Route::resource('eventos',EventoController::class);

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

