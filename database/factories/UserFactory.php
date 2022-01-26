<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function autoIncrement()
    {
        for ($i = 0; $i < 1000; $i++) {
            yield $i;
        }
    }

    public function definition()
    {
        // $autoIncrement = $this->autoIncrement(); 
        static $autoIncrement = 0;

        return [
            // 'id' => $this->$autoIncrement->current(),
            'id' => ++$autoIncrement,
            'usuario' => $this->faker->name(),
            'nombre' => $this->faker->name(),
            'apellidos' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'fechaNac' => $this->faker->date(),
            'tipo' => $this->faker->randomElement(["usuario","administrador"]),
            'telefono' => $this->faker->randomNumber(9,true),
            'estado' => $this->faker->randomElement(["activo","inactivo"]),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
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
