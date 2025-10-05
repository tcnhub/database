<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Seccion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    public function definition(): array
    {
        $nombre = $this->faker->sentence(3);
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'seccion_id' => Seccion::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}