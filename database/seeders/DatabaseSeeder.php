<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();//llama al factory para crear usuarios random
        $this->call(EventoSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}