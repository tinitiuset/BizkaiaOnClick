<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes(['verify' => true]);

// Pagina index
Route::get('/', function () {
    return view('index');
})->name("index");

// Solo si logueado
Route::middleware(["auth", "esactivo","verified"])->group(function () {
    // Registrar evento nuevo
    Route::get('/enviaevento', function () {
        return view('enviaEvento');
    });
    // Ver perfil
    Route::get('/perfil', function () {
        return view('usuario');
    });
    Route::patch('user/editarUsuario/{id}', [UserController::class, "editarUsuario"]);

    Route::get('/email/verify', function () {
        return view('enviaEvento');
    })->name('verification.notice');

});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/agenda');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Ver agenda
Route::get('/agenda', function () {
    return view('agenda');
});

// Ver evento
Route::get('/detalleevento/{id}', function () {
    return view('detalleEvento');
});