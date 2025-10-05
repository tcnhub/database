<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Producto::factory(),
            'user_id' => $this->faker->optional()->randomElement([null, User::factory()]),
            'rating' => $this->faker->numberBetween(1, 5),
            'comentario' => $this->faker->optional()->sentence(),
            'fecha' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}