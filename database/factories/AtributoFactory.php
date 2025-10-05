<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Seccion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atributo>
 */
class AtributoFactory extends Factory
{
    public function definition(): array
    {
        $nombre = $this->faker->unique()->word();
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'seccion_id' => Seccion::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}