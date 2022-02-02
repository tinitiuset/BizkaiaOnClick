<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

// Pagina index
Route::get('/', function () { return view('index');})->name("index");

// Solo si logueado
Route::middleware(["auth","esactivo"])->group(function ()
{
    // Registrar evento nuevo
    Route::get('/enviaevento', function() {
        return view('enviaEvento');
    });
    // Ver perfil
    Route::get('/perfil', function() {
        return view('usuario');
    });

});

// Ver agenda
Route::get('/agenda', function() { return view('agenda');});

// Ver evento
Route::get('/detalleevento/{id}', function() { return view('detalleEvento');});
