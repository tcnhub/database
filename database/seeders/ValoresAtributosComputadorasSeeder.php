<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ValoresAtributosComputadorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        // Insertar 10 valores de atributos específicos para computadoras
        // Distribuídos: 4 para RAM, 3 para Procesador, 3 para Almacenamiento
        DB::table('valores_atributos')->insert([
            // Valores para RAM (atributo_id = $ramId)
            [
                'valor' => '8GB',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => '16GB',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => '32GB',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => '64GB',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Valores para Procesador (atributo_id = $procesadorId)
            [
                'valor' => 'Intel Core i5',
                'atributo_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => 'AMD Ryzen 5',
                'atributo_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => 'Intel Core i7',
                'atributo_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Valores para Almacenamiento (atributo_id = $almacenamientoId)
            [
                'valor' => '512GB SSD',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => '1TB SSD',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'valor' => '2TB HDD',
                'atributo_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $this->command->info('Seeder ejecutado: 10 valores de atributos para computadoras insertados.');
    }
}
