<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
use App\Models\Producto;
use App\Models\ProductVariant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cart_id' => Cart::factory(),
            'product_id' => Producto::factory(),
            'variant_id' => $this->faker->optional()->randomElement([null, ProductVariant::factory()]),
            'cantidad' => $this->faker->numberBetween(1, 5),
            'precio_unitario' => $this->faker->randomFloat(2, 100, 2000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}