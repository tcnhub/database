<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductoCategoria>
 */
class ProductoCategoriaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'categoria_id' => Categoria::factory(),
            'created_at' => now(),
        ];
    }
}