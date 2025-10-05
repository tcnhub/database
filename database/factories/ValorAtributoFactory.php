<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Atributo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ValorAtributo>
 */
class ValorAtributoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'valor' => $this->faker->word(),
            'atributo_id' => Atributo::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}