<?php

use App\Http\Controllers\AlertasController;
use Illuminate\Http\Request;
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

    Route::prefix("/alertas")->group(function() {

        Route::get("/",[AlertasController::class,"index"]);
        Route::delete("/{nombre}",[AlertasController::class,"destroy"]);
        Route::post("/",[AlertasController::class,"store"]);


    });

});

Route::middleware(["auth", "esactivo"])->group(function () {

    Route::get('/email/verify', function (Request $request) {

        // $request->user()->sendEmailVerificationNotification();

        return view('auth.verify-register');
        
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

        $request->fulfill();
     
        return redirect('/agenda');

    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

});

// Ver agenda
Route::get('/agenda', function () {
    return view('agenda');
});

// Ver evento
Route::get('/detalleevento/{id}', function () {
    return view('detalleEvento');
});