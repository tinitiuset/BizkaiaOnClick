<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Database\Seeder;

class FotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $eventos = Evento::all()->pluck("id");

        $contadorFotos = 1;

        for ($i=0; $i < 30; $i++) { 

            for ($j=$contadorFotos; $j < ($contadorFotos+2); $j++) { 
                
                $foto = new Foto();
                $foto->ruta = ($j.".jpg");
                $foto->evento = $eventos[$i];
                $foto->created_at=date("Y-m-d H:i:s");
                $foto->updated_at=date("Y-m-d H:i:s");
                $foto->save();
                // $foto->evento = $eventos[$i];

            }

            $contadorFotos += 2;

        }

    }
}
