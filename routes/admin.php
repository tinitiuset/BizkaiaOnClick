<?php

use Illuminate\Support\Facades\Route;
//añado la ruta del controlador
use App\Http\Controllers\Admin\AdminHomeController;

Route::get('', [AdminHomeController::class, 'index']);