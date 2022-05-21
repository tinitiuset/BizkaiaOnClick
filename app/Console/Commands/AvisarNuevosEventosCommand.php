<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EventoController;
use App\Mail\AvisarNuevosEventosMailable;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Foto;

class AvisarNuevosEventosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avisar:nuevosEventos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Avisa de los nuevos eventos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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

                $eventosTotal = [];
                
                foreach ($usuario->alertas as $categoriaAlerta) {
                    
                    $eventos = Evento::where("estado","aprobado")->where('fechaAprobado','<=',date("Y-m-d H:i:s"))->where('fechaAprobado','>',date("Y-m-d H:i:s", strtotime('-6 hours')))->where("categoria",$categoriaAlerta->nombre)->get();

                    if ($eventos->count() > 0) {

                        $eventosTotal[$categoriaAlerta->nombre] = $eventos;

                    }

                }

                if (count($eventosTotal) > 0) {

                    $usuario = User::findOrFail($usuario->id);
                    
                    $correo = new AvisarNuevosEventosMailable($eventosTotal, $usuario);

                    Mail::to($usuario->email)->send($correo);

                }

                

            }

        }

        $this->info("avisados");

    }
}
