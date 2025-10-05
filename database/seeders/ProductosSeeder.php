<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seccion;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener todas las secciones existentes
        $secciones = Seccion::all();

        // Verificar si hay secciones
        if ($secciones->isEmpty()) {
            $this->command->warn('No se encontraron secciones. Asegúrate de ejecutar SeccionesCategoriasSeeder primero.');
            return;
        }

        // Obtener todas las categorías de todas las secciones (recursivamente)
        $categorias = collect();
        foreach ($secciones as $seccion) {
            $categorias = $categorias->merge($this->getAllCategorias($seccion->id));
        }

        // Verificar si hay categorías
        if ($categorias->isEmpty()) {
            $this->command->warn('No se encontraron categorías. Asegúrate de ejecutar SeccionesCategoriasSeeder primero.');
            return;
        }

        // Contador total de productos
        $totalProductos = 0;
        $maxProductos = 500;

        // Distribuir productos entre las categorías
        while ($totalProductos < $maxProductos && $categorias->isNotEmpty()) {
            // Mezclar categorías para distribución aleatoria
            $categorias = $categorias->shuffle();

            foreach ($categorias as $categoria) {
                if ($totalProductos >= $maxProductos) {
                    break; // Salir si alcanzamos el límite
                }

                // Obtener la sección correspondiente a la categoría
                $seccion = $categoria->seccion;

                // Generar nombre de producto basado en la sección y categoría
                $nombre = $this->generarNombreProducto($faker, $seccion->nombre, $categoria->nombre);

                // Generar slug único
                $baseSlug = Str::slug($nombre);
                $slug = $baseSlug;
                $counter = 1;
                while (Producto::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                // Crear producto
                $producto = Producto::create([
                    'nombre' => $nombre,
                    'slug' => $slug,
                    'seccion_id' => $seccion->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Asignar a la categoría (y a sus padres si es subcategoría)
                $producto->categorias()->attach($categoria->id);

                // Si tiene padre, asignar también al padre para mejor categorización
                $parent = $categoria->parent;
                while ($parent) {
                    $producto->categorias()->attach($parent->id);
                    $parent = $parent->parent;
                }

                $totalProductos++;
            }
        }

        $this->command->info("Se crearon {$totalProductos} productos distribuidos en las categorías.");
    }

    /**
     * Obtener todas las categorías y subcategorías de una sección recursivamente.
     *
     * @param int $seccionId
     * @return \Illuminate\Support\Collection
     */
    private function getAllCategorias(int $seccionId): \Illuminate\Support\Collection
    {
        $categorias = collect();

        // Obtener categorías de nivel 1 con sus hijos cargados recursivamente
        $nivel1 = Categoria::where('seccion_id', $seccionId)
            ->whereNull('categoria_padre_id')
            ->with('children') // Cargar subcategorías recursivamente
            ->get();

        foreach ($nivel1 as $cat1) {
            $categorias->push($cat1);
            $this->addSubcategorias($cat1, $categorias);
        }

        return $categorias;
    }

    /**
     * Añadir subcategorías recursivamente a la colección.
     *
     * @param \App\Models\Categoria $categoria
     * @param \Illuminate\Support\Collection $categorias
     */
    private function addSubcategorias(Categoria $categoria, \Illuminate\Support\Collection &$categorias): void
    {
        $subcategorias = $categoria->children ?? collect(); // Asegurar que children no sea null
        foreach ($subcategorias as $subcat) {
            $categorias->push($subcat);
            $this->addSubcategorias($subcat, $categorias);
        }
    }

    /**
     * Generar un nombre de producto realista basado en la sección y categoría.
     *
     * @param \Faker\Generator $faker
     * @param string $seccionNombre
     * @param string $categoriaNombre
     * @return string
     */
    private function generarNombreProducto(\Faker\Generator $faker, string $seccionNombre, string $categoriaNombre): string
    {
        $marcas = ['Dell', 'HP', 'Lenovo', 'ASUS', 'Acer', 'Samsung', 'Apple', 'MSI', 'Toshiba', 'Sony'];
        $modelo = $faker->lexify('???-####');

        // Personalizar según sección
        switch (strtolower($seccionNombre)) {
            case 'computadoras':
                return $faker->randomElement($marcas) . ' ' . $categoriaNombre . ' ' . $modelo;
            case 'impresoras':
                return $faker->randomElement($marcas) . ' ' . $categoriaNombre . ' Printer ' . $modelo;
            case 'monitores':
                return $faker->randomElement($marcas) . ' ' . $categoriaNombre . ' Monitor ' . $modelo;
            case 'partes':
                return $categoriaNombre . ' Component ' . $faker->randomElement($marcas) . ' ' . $modelo;
            case 'electrónica':
                return $categoriaNombre . ' Device ' . $faker->randomElement($marcas) . ' ' . $modelo;
            case 'software':
                return $categoriaNombre . ' Software License ' . $modelo;
            case 'gamer':
                return 'Gaming ' . $categoriaNombre . ' ' . $faker->randomElement($marcas) . ' ' . $modelo;
            case 'audio':
                return 'Audio ' . $categoriaNombre . ' ' . $faker->randomElement($marcas) . ' ' . $modelo;
            case 'red':
                return 'Network ' . $categoriaNombre . ' ' . $faker->randomElement($marcas) . ' ' . $modelo;
            case 'puntos de venta':
                return 'POS ' . $categoriaNombre . ' ' . $faker->randomElement($marcas) . ' ' . $modelo;
            case 'accesorios':
                return $categoriaNombre . ' Accessory ' . $faker->randomElement($marcas) . ' ' . $modelo;
            default:
                return $faker->sentence(3) . ' ' . $modelo;
        }
    }
}
