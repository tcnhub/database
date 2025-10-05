<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->optional()->randomElement([null, User::factory()]),
            'product_id' => Producto::factory(),
            'fecha' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}