<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventoFactory extends Factory
{

    public function definition()
    {

        static $number = 0;
        $categorias = Categoria::pluck('nombre')->toArray();
        $usuariosCreadores = User::pluck('id')->toArray();
        $usuariosAprobadores = User::all()->where("tipo","=","administrador")->pluck('id')->toArray();

        return [
            'id' => ++$number,
            'titulo' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'fechaInicio' => $this->faker->date(),
            'fechaFin' => $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'hora' => $this->faker->date("H:i:s"),
            'precio' => $this->faker->randomNumber(2,true),
            'direccion' => $this->faker->address(),
            'estado' => $this->faker->randomElement(["pendiente","aprobado"]),
            'aforo' => $this->faker->randomNumber(2,true),
            'recinto' => "palacioeuskalduna",
            "localidad" => "galdakao",
            "fechaAprobado" => null,
            "usuarioCreador" => $this->faker->randomElement($usuariosCreadores),
            "usuarioAprobador" => $this->faker->randomElement($usuariosAprobadores),
            "categoria" => $this->faker->randomElement($categorias)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
