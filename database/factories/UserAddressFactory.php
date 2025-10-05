<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'direccion' => $this->faker->streetAddress(),
            'ciudad' => $this->faker->city(),
            'pais' => $this->faker->country(),
            'codigo_postal' => $this->faker->postcode(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}