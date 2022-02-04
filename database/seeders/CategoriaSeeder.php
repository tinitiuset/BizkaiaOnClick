<?php

namespace Database\Seeders;

use App\Models\Categoria;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creamos los obj para meter en la BD
        $categoria = new Categoria();
        $categoria->nombre = "Cine y literatura";
        $categoria->descripcion = "Nuevos estrenos de cine, literatura y firma de autores";
        $categoria->created_at=date("Y-m-d H:i:s");
        $categoria->updated_at=date("Y-m-d H:i:s");
        $categoria->save();

        $categoria2 = new Categoria();
        $categoria2->nombre = "Festivales";
        $categoria2->descripcion = "Festivales de música, cine, poesía y gastonómicos";
        $categoria2->created_at=date("Y-m-d H:i:s");
        $categoria2->updated_at=date("Y-m-d H:i:s");
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->nombre = "Planes";
        $categoria3->descripcion = "Planes culturales y actividades";
        $categoria3->created_at=date("Y-m-d H:i:s");
        $categoria3->updated_at=date("Y-m-d H:i:s");
        $categoria3->save();

        $categoria4 = new Categoria();
        $categoria4->nombre = "Teatro y danza";
        $categoria4->descripcion = "Obras de teatro, bailes populares";
        $categoria4->created_at=date("Y-m-d H:i:s");
        $categoria4->updated_at=date("Y-m-d H:i:s");
        $categoria4->save();

        $categoria5 = new Categoria();
        $categoria5->nombre = "Música";
        $categoria5->descripcion = "Conciertos de música";
        $categoria5->created_at=date("Y-m-d H:i:s");
        $categoria5->updated_at=date("Y-m-d H:i:s");
        $categoria5->save();

        $categoria6 = new Categoria();
        $categoria6->nombre = "Eventos";
        $categoria6->descripcion = "Eventos culturales, visitas guiadas, actividades, etc";
        $categoria6->created_at=date("Y-m-d H:i:s");
        $categoria6->updated_at=date("Y-m-d H:i:s");
        $categoria6->save();

        $categoria7 = new Categoria();
        $categoria7->nombre = "Museos";
        $categoria7->descripcion = "Visitas guiadas a museos, nuevas exposiciones, entradas gratuitas, etc";
        $categoria7->created_at=date("Y-m-d H:i:s");
        $categoria7->updated_at=date("Y-m-d H:i:s");
        $categoria7->save();

        $categoria8 = new Categoria();
        $categoria8->nombre = "Exposiciones";
        $categoria8->descripcion = "Exposiciones de arte y para niños";
        $categoria8->created_at=date("Y-m-d H:i:s");
        $categoria8->updated_at=date("Y-m-d H:i:s");
        $categoria8->save();
    }
}
