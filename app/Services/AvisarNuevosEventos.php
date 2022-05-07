<?php


namespace App\Services;

use App\Http\Controllers\EventoController;
use App\Mail\AvisarNuevosEventosMailable;
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

        $usuarios = User::with('alertas')->get();

        foreach ($usuarios as $usuario) {

            Log::error("hola: ".$usuario);
            Log::error("hola: ".$usuario->categorias);
            
            if (count($usuario->alertas) > 0) {
                
                foreach ($usuario->alertas as $categoriaAlerta) {
                    
                    $eventos = Evento::where("estado","aprobado")->where('fechaFin','>=',date("Y-m-d"))->where('');

                    new AvisarNuevosEventosMailable($eventos);

                }

            }

        }


    }
}
