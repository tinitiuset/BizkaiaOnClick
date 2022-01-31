<?php


namespace App\Services;

use App\Http\Controllers\EventoController;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Foto;

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
        try {
        $url = "https://api.euskadi.eus/culture/events/v1.0/events?_elements=5000&_page=1";
        // Dump Data to prove it's working
        self::saveData(self::getServiceData($url));
        }catch (\Exception $e) {
            echo $e;
        }

    }

    function saveData(array $registros)
    {
        // TODO Arreglar campos vacios
        // TODO Arreglar formatos de fechas

        foreach ($registros as $data) {
            
            if ($data['provinceNoraCode'] == "48") {

                $data['nameEs'] = str_replace('"','',$data['nameEs']); 

                if (count(Evento::where("titulo",utf8_decode($data['nameEs']))->get("id")) == 0) {

                    if (count(Categoria::where("nombre",utf8_decode($data['typeEs']))->get()) == 0) {
                
                        Categoria::create([
                            'nombre' => utf8_decode($data['typeEs'])
                        ]);
            
                    }
            

                    if (isset($data['descriptionEs'])) {

                        $data['descriptionEs'] = html_entity_decode($data['descriptionEs'], ENT_QUOTES, "UTF-8");
                        $data['descriptionEs'] = strip_tags($data['descriptionEs']);

                    } else {

                        $data['descriptionEs'] = "descripcion generica de evento: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet illum quod repudiandae aliquid magnam dicta sed, consectetur a perspiciatis vitae atque nam tempora animi voluptates error, molestias omnis, vel voluptatem.";

                    }
                    
                    

                    if (isset($data['priceEs'])) {

                        $data['priceEs'] = str_replace('€','',$data['priceEs']);

                    } else {

                        $data['priceEs'] = 0;

                    }

                    
                    $data['startDate'] = date('Y-m-d',strtotime($data['startDate']));
                    $data['endDate'] = date('Y-m-d',strtotime($data['endDate']));

                    if (!isset($data['openingHoursEs']) || !is_numeric(substr($data['openingHoursEs'],0,1))) {

                        $data['openingHoursEs'] = null;

                    } else {

                        $data['openingHoursEs'] = substr($data['openingHoursEs'],0,5);

                    }
            
                    $evento=Evento::create([
                        'titulo' => utf8_decode($data['nameEs']),
                        'descripcion'=> $data['descriptionEs'],
                        'fechaInicio' => $data['startDate'] ?? '',
                        'fechaFin' => $data['endDate'] ?? '',
                        'hora' => $data['openingHoursEs'],
                        'precio' => doubleval($data['priceEs']),
                        'direccion' => $data['direccion'] ?? '',
                        'estado' => "pendiente",
                        'aforo' => null,
                        'recinto' => $data['establishmentEs'] ?? '',
                        'localidad' => $data['municipalityEs'] ?? '',
                        'categoria' => utf8_decode($data['typeEs'])
                    ]);
    
                    foreach ($data['images'] as $imagen) {
                        
                        $idEvento=Evento::where("titulo",utf8_decode($data['nameEs']))->get("id");
    
                        Foto::create([
                            "ruta" => $imagen['imageFileName'],
                            "evento" => intval($idEvento[0]["id"])
                        ]);
    
                        file_put_contents(public_path()."/img/eventos/".$imagen['imageFileName'], file_get_contents($imagen['imageUrl']));
    
                    }
        
                }

            }

        }




    }

    function getServiceData($url): array
    {

        //Make petition
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp[] = json_decode(utf8_encode(curl_exec($curl)), true);
        curl_close($curl);
        // return $resp[0]["items"][0];
        return $resp[0]["items"];
    }
}
