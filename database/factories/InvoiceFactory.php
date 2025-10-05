<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'numero_factura' => 'INV-' . $this->faker->unique()->numerify('####'),
            'pdf_url' => $this->faker->url(),
            'fecha_emision' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}