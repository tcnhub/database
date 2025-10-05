<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
{
    public function definition(): array
    {
        $nombre = $this->faker->unique()->word();
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}