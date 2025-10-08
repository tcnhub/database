<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ComputadorasAtributosSeeder extends Seeder
{
    public function run()
    {
        // 1. Insertar sección "Computadoras" (si no existe)
        $seccionId = DB::table('secciones')->insertGetId([
            'nombre' => 'Computadoras',
            'slug' => 'computadoras',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 2. Insertar atributos para computadoras
        $ramId = DB::table('atributos')->insertGetId([
            'nombre' => 'RAM',
            'slug' => 'ram',
            'seccion_id' => $seccionId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $procesadorId = DB::table('atributos')->insertGetId([
            'nombre' => 'Procesador',
            'slug' => 'procesador',
            'seccion_id' => $seccionId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $almacenamientoId = DB::table('atributos')->insertGetId([
            'nombre' => 'Almacenamiento',
            'slug' => 'almacenamiento',
            'seccion_id' => $seccionId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 3. Insertar valores de atributos (ejemplos del contexto de computadoras)
        DB::table('valores_atributos')->insert([
            // Valores para RAM
            ['valor' => '8GB', 'atributo_id' => $ramId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['valor' => '16GB', 'atributo_id' => $ramId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['valor' => '32GB', 'atributo_id' => $ramId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Valores para Procesador
            ['valor' => 'Intel i5', 'atributo_id' => $procesadorId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['valor' => 'AMD Ryzen 7', 'atributo_id' => $procesadorId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Valores para Almacenamiento
            ['valor' => '512GB SSD', 'atributo_id' => $almacenamientoId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['valor' => '1TB HDD', 'atributo_id' => $almacenamientoId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
