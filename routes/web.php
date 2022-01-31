<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventoAdminController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
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
    return view('index');
})->name("index");

Route::get('/test', function() {
    return view('test');
});

Route::get('/usuario', function() {
    return view('usuario');
});

Route::middleware("auth")->group(function ()
{

    Route::get('/enviaevento', function() {
        return view('enviaevento');
    });
    Route::get('/perfil', function() {
        return view('perfil');
    });
    

});

Route::get('/detalleevento/{id}', function() {
    return view('detalleEvento');
});

// Route::get('/agenda',[EventoController::class,"index"]);
Route::get('/agenda', function() {
    return view('agenda');
});



Route::get('/user/create', [UserController::class, 'create']);

// Route::resource('/fotos', FotoController::class);

// Route::resource('eventos',EventoController::class);

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

