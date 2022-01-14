<?php


namespace App\Services;

use App\Http\Controllers\EventoController;
use App\Models\Evento;

class FetchData
{

    public function __invoke()
    {
        //TODO Method will Fetch Data from Open Data API and save it into the database
        /*
         * Command to run CRON JOB Manually, otherwise will be run every 6 hours as in Console/Kernel.php
         * php artisan schedule:run
         */

        // GET last Event
        $url = "https://api.euskadi.eus/culture/events/v1.0/events?_elements=1&_page=1";
        // Dump Data to prove it's working
        self::saveData(self::getServiceData($url));
    }

    function saveData(array $data)
    {
        $evento = Evento::create([
            'titulo' => $data['nameEs'],
            'description'=> $data['descriptionEs'],
            'fechaInicio' => $data['startDate'],
            'fechaFin' => $data['endDate'],
            'hora' => $data['openingHoursEs'],
            'precio' => null,
            'direccion' => $data['direccion'],
            'estado' => $data['estado'],
            'sala' => $data['placeEs'],
            'recinto' => $data['recinto'],
            'localidad' => $data['localidad'],
        ]);
    }

    function getServiceData($url): array
    {

        //Make petition
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp[] = json_decode(utf8_encode(curl_exec($curl)), true);
        curl_close($curl);

        return $resp;
    }
}
