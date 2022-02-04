<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Models\Evento;
use App\Models\Eventos;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth", "esadmin", "esactivo"])->group(function () {
    Route::resource('categoria', CategoriaController::class);
    Route::resource('fotos', FotoController::class);
    Route::resource("eventos", EventosController::class);
    Route::resource('user', UserController::class);
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('admin.perfil');
    Route::get('/usuario', function () {
        return view('usuario');
    })->name('admin.usuario');
    Route::patch('user/editarperfil/{id}', [UserController::class, "editarPerfil"]);
    Route::get('user/{usuario}/reactivar', [UserController::class, "reactivar"]);
    Route::get("/", function () {

        //metodos añadidos en la página de admin/index
        $numUsuarios = count(User::where('estado', 'activo')->get());
        $numEventosPendientes = count(Evento::where('estado', 'pendiente')->get());
        $numEventosAforo = count(Eventos::where('aforo', '>', '50')->get());
        //cogemos los usuarios activos y los ordenamos de manera desc por fecha de creación y cogemos 10 registros
        $ultimosUsuarios = User::where('estado', 'activo')->orderBy('created_at', 'desc')->take(10)->get();


        return response()->view('admin/index', [
            'numUsuarios' => $numUsuarios,
            'numEventosPendientes' => $numEventosPendientes,
            'numEventosAforo' => $numEventosAforo,
            'ultimosUsuarios' => $ultimosUsuarios
        ]);
    });
});

