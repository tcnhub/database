<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->optional()->randomElement([null, User::factory()]),
            'fecha_creacion' => now(),
            'estado' => $this->faker->randomElement(['activo', 'abandonado', 'convertido']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}