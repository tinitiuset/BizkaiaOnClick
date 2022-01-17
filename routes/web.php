<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FotoController;

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

Route::resource('categoria',CategoriaController::class);

// Route::resource('eventos',EventoController::class);
/*Route::resources([
    'categorias' => CategoriaController::class
    // 'posts' => PostController::class,
]);*/
// Route::resource('eventos',EventoController::class);

Route::resource('fotos',FotoController::class);

Auth::routes();//no descomentar es para el login

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Auth::routes();


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
