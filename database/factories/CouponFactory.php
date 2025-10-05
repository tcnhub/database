<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->lexify('???###'),
            'descuento_tipo' => $this->faker->randomElement(['porcentaje', 'fijo']),
            'descuento_valor' => $this->faker->randomFloat(2, 5, 100),
            'fecha_inicio' => now(),
            'fecha_fin' => $this->faker->dateTimeBetween('now', '+1 year'),
            'uso_maximo' => $this->faker->optional()->numberBetween(10, 100),
            'uso_por_usuario' => $this->faker->optional()->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}