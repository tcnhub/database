<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Seccion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    public function definition(): array
    {
        $nombre = $this->faker->words(2, true);
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'seccion_id' => Seccion::factory(),
            'categoria_padre_id' => null, // Puede ser asignado en el seeder
            'nivel' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}