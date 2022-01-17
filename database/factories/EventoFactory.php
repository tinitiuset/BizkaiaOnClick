<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'fechaInicio' => $this->faker->date(),
            'fechaFin' => $this->faker->date(),
            'hora' => $this->faker->date("H:i:s"),
            'precio' => $this->faker->randomNumber(2,true),
            'direccion' => $this->faker->address(),
            'estado' => "pendiente",
            'sala' => $this->faker->randomNumber(2,true),
            'recinto' => "palacioeuskalduna",
            "localidad" => "galdakao"
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
