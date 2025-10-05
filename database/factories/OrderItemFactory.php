<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Producto;
use App\Models\ProductVariant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => Producto::factory(),
            'variant_id' => $this->faker->optional()->randomElement([null, ProductVariant::factory()]),
            'cantidad' => $this->faker->numberBetween(1, 5),
            'precio_unitario' => $this->faker->randomFloat(2, 100, 2000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}