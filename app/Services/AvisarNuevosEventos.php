<?php


namespace App\Services;

use App\Http\Controllers\EventoController;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AvisarNuevosEventos
{

    public function __invoke()
    {
        /*
         * Command to run CRON JOB Manually, otherwise will be run every 6 hours as in Console/Kernel.php
         * php artisan schedule:run
         */
        

        // GET last Events

        $usuarios = User::all();

        foreach ($usuarios as $usuario) {
            
            

        }


    }
}
