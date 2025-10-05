<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Producto::factory(),
            'nombre' => $this->faker->word() . ' Variant',
            'precio_adicional' => $this->faker->randomFloat(2, 0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}