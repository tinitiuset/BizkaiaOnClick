<?php

use Illuminate\Support\Facades\Route;
//añado la ruta del controlador
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventosController;
// use App\Http\Controllers\EventoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EsAdmin;

// Route::get('', [AdminHomeController::class, 'index']);

Route::middleware([EsAdmin::class])->group(function ()
{
    Route::resource('categoria',CategoriaController::class);
    Route::resource('fotos',FotoController::class);
    Route::resource("eventos",EventosController::class);
    // Route::resource("evento",EventoController::class);
    Route::resource('user', UserController::class);
    Route::get('user/{usuario}/reactivar', [UserController::class,"reactivar"]);
    Route::get("/",function () {

    return view('admin/index');

    });
});

