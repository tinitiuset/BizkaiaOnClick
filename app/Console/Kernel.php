<?php

namespace App\Console;

use App\Services\AvisarNuevosEventos;
use App\Services\FetchData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('avisar:nuevosEventos')->everySixHours();
        // $schedule->command(new AvisarNuevosEventos)->everyMinute();

        // FetchData From Open Data Euskadi
        $schedule->command("cargar:eventosApi")->twiceDaily(6, 18);
        // $schedule->call(new FetchData)->everyMinute();

        //Avisar de los eventos
        
        // $schedule->job(new FetchData)->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
