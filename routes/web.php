<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;

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

/*Route::get('/categoria', function () {
    return view('categoria');
});
Route::get('/createCategoria',[CategoriaController::class,'create']);*/

//de esta manera se pueden acceder a todas las url
Route::resource('categoria',CategoriaController::class);


/*Route::resources([
    'categorias' => CategoriaController::class
    // 'posts' => PostController::class,
]);*/

Route::resource('eventos',EventoController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

