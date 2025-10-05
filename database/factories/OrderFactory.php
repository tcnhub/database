<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserAddress;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->optional()->randomElement([null, User::factory()]),
            'direccion_envio_id' => $this->faker->optional()->randomElement([null, UserAddress::factory()]),
            'estado' => $this->faker->randomElement(['pendiente', 'pagado', 'enviado', 'cancelado', 'completado']),
            'total' => $this->faker->randomFloat(2, 100, 5000),
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'paypal', 'transferencia']),
            'fecha_creacion' => now(),
            'fecha_actualizacion' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}