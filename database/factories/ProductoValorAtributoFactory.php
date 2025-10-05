<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\ValorAtributo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductoValorAtributo>
 */
class ProductoValorAtributoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'valor_atributo_id' => ValorAtributo::factory(),
            'created_at' => now(),
        ];
    }
}