<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventoAdminController;
use Illuminate\Support\Facades\Auth;
=======
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;

>>>>>>> a8e72fab5dce7bc3ed72ed4592f599f0c0dd6703

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

Route::group(['prefix' => 'agenda'], function() {

    Route::get('/',[EventoController::class,"index"])->name("agenda.listado");
    Route::get("/{id}", [EventoController::class,"show"])->name("agenda.detalle");
    // Route::get("/create", [EventoController::class,"create"])->name("agenda.crear");
    Route::post("/", [EventoController::class,"store"])->name("agenda.store");

});

Route::group(['prefix' => 'admin'], function() {
    Route::resources([
        "eventos" => EventoAdminController::class
    ]);
});

<<<<<<< HEAD
// Route::resource('eventos',EventoController::class);

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
=======
/*Route::get('/categoria', function () {
    return view('categoria.index');
});

Route::get('categoria/create',[CategoriaController::class,'create']);*/

Route::resource('categoria',CategoriaController::class);


/*Route::resources([
    'categorias' => CategoriaController::class
    // 'posts' => PostController::class,
]);*/

Route::resource('eventos',EventoController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
>>>>>>> a8e72fab5dce7bc3ed72ed4592f599f0c0dd6703

Auth::routes();

