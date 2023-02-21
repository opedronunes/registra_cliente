<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'rg' => fake()->numerify('#######'),
            'email' => fake()->email(),
            'telefone' => fake()->e164PhoneNumber(),
            'endereco' => fake()->address(),
            'imagem' => fake()->image(null, 640, 480),
        ];
    }
}
