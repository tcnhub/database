<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'metodo' => $this->faker->randomElement(['tarjeta', 'paypal', 'transferencia']),
            'estado' => $this->faker->randomElement(['pendiente', 'aprobado', 'rechazado']),
            'monto' => $this->faker->randomFloat(2, 100, 5000),
            'transaccion_externa_id' => 'TXN-' . $this->faker->unique()->numerify('######'),
            'fecha' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}