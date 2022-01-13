<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\CategoriaController;
=======
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
>>>>>>> 17a8198a01eefc2cdf156feb4c4c51f64226f880

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

Route::get('/agenda', function () {
    return view('agenda');
});

<<<<<<< HEAD
Route::resources([
    'categorias' => CategoriaController::class
    // 'posts' => PostController::class,
]);
=======
Route::resource('eventos',EventoController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
>>>>>>> 17a8198a01eefc2cdf156feb4c4c51f64226f880

Auth::routes();

