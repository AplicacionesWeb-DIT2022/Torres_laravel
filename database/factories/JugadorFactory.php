<?php

namespace Database\Factories;
use App\Jugador;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class JugadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Dni' => $this->faker->unique()->numberBetween($min = 1000000, $max = 90000000),
            'Nombre' => $this->faker->name(),
            'Apellido' => $this->faker->name(),
            'Equipo' => $this->faker->numberBetween($min = 1, $max =4),
            'Foto' => $this->faker->name(),
        ];

    }

}
