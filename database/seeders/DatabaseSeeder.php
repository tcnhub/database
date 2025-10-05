<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seccion;
use App\Models\Categoria;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de secciones y categorías basada en el HTML proporcionado, estructurada recursivamente
        $data = [
            [
                'nombre' => 'Computadoras',
                'categorias' => [
                    [
                        'nombre' => 'Computadoras de escritorio',
                        'children' => [
                            ['nombre' => 'Computadora Profesional'],
                            ['nombre' => 'Computadora Gamer'],
                            ['nombre' => 'Computadora Todo en Uno'],
                            ['nombre' => 'Computadora Workstation'],
                        ],
                    ],
                    [
                        'nombre' => 'Computadoras Portátiles',
                        'children' => [
                            ['nombre' => 'Laptop'],
                            ['nombre' => 'Laptop Gamer Cusco'],
                            ['nombre' => 'Laptop Dos en Uno'],
                            ['nombre' => 'Laptop Workstation'],
                        ],
                    ],
                    [
                        'nombre' => 'Otros Ordenadores',
                        'children' => [
                            ['nombre' => 'Servidores'],
                            ['nombre' => 'Mini PCs'],
                            ['nombre' => 'Tablet Android'],
                            ['nombre' => 'Tablet iOS'],
                            ['nombre' => 'Tableta Gráfica'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Impresoras',
                'categorias' => [
                    [
                        'nombre' => 'Multifunción',
                        'children' => [
                            ['nombre' => 'Impresora Multifuncional Tinta'],
                            ['nombre' => 'Impresora Multifuncional Láser'],
                        ],
                    ],
                    [
                        'nombre' => 'Impresora',
                        'children' => [
                            ['nombre' => 'Impresora Láser'],
                            ['nombre' => 'Impresora de Tinta'],
                        ],
                    ],
                    [
                        'nombre' => 'Impresora Varios',
                        'children' => [
                            ['nombre' => 'Impresora Térmica'],
                            ['nombre' => 'Impresora de Etiquetas'],
                            ['nombre' => 'Impresora de Tarjetas'],
                            ['nombre' => 'Escáneres'],
                            ['nombre' => 'Plotters'],
                            ['nombre' => 'Suministros'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Monitores',
                'categorias' => [
                    [
                        'nombre' => 'Monitores',
                        'children' => [
                            ['nombre' => 'Monitor Touch'],
                            ['nombre' => 'Monitores de LED 32" - 40"'],
                            ['nombre' => 'Monitores Gaming'],
                            ['nombre' => 'Monitores LED 61" - 70"'],
                            ['nombre' => 'Monitores Pivot'],
                            ['nombre' => 'Monitores TFT 15" - 19"'],
                            ['nombre' => 'Monitores TFT 20" - 23"'],
                            ['nombre' => 'Monitores TFT 24" - 28"'],
                            ['nombre' => 'Monitores TFT 29", 32", 34" +'],
                            ['nombre' => 'Pizarras Interactivas'],
                            ['nombre' => 'Televisores'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Partes',
                'categorias' => [
                    [
                        'nombre' => 'CPU',
                        'children' => [
                            ['nombre' => 'Procesador AMD Ryzen 3'],
                            ['nombre' => 'Procesador AMD Ryzen 5'],
                            ['nombre' => 'Procesador AMD Ryzen 7'],
                            ['nombre' => 'Procesador AMD Ryzen 9'],
                            ['nombre' => 'Procesador Intel Core i3'],
                            ['nombre' => 'Procesador Intel Core i5'],
                            ['nombre' => 'Procesador Intel Core i7'],
                            ['nombre' => 'Procesador Intel Core i9'],
                        ],
                    ],
                    [
                        'nombre' => 'Memorias',
                        'children' => [
                            ['nombre' => 'Memoria RAM'],
                            ['nombre' => 'Memoria SD, Micro SD'],
                            ['nombre' => 'Memoria USB, USB-C'],
                        ],
                    ],
                    [
                        'nombre' => 'Unidades Sólidas',
                        'children' => [
                            ['nombre' => 'Disco Sólido Externo (SSD)'],
                            ['nombre' => 'SSD 2.5 SATA'],
                            ['nombre' => 'SSD Accesorios, Otros'],
                            ['nombre' => 'SSD M.2 NVMe'],
                            ['nombre' => 'SSD M.2 SATA'],
                        ],
                    ],
                    [
                        'nombre' => 'Discos Duros',
                        'children' => [
                            ['nombre' => 'Disco Duro 3.5" SATA'],
                            ['nombre' => 'Disco Duro Externo 2.5"'],
                            ['nombre' => 'Disco Duro Externo 3.5"'],
                            ['nombre' => 'Disco Duro para Notebook SATA'],
                            ['nombre' => 'Disco Duro Propietario'],
                        ],
                    ],
                    [
                        'nombre' => 'Placas Madre',
                        'children' => [
                            ['nombre' => 'MB AM4 AMD'],
                            ['nombre' => 'MB AM4 AMD Gaming'],
                            ['nombre' => 'MB AM5 AMD'],
                            ['nombre' => 'MB AM5 AMD Gaming'],
                            ['nombre' => 'MB CI7 S1200'],
                            ['nombre' => 'MB CI7 S1200 Gaming'],
                            ['nombre' => 'MB CI9 S1700 DDR4'],
                            ['nombre' => 'MB CI9 S1700 DDR4 Gaming'],
                            ['nombre' => 'MB CI9 S1700 DDR5'],
                            ['nombre' => 'MB CI9 S1700 DDR5 Gaming'],
                        ],
                    ],
                    [
                        'nombre' => 'Cases',
                        'children' => [
                            ['nombre' => 'Case para Discos HDD/SSD'],
                            ['nombre' => 'Cases ATX Slim'],
                            ['nombre' => 'Cases ATX Ver2.0'],
                            ['nombre' => 'Cases con Fuente para Gamers'],
                            ['nombre' => 'Cases Micro ATX'],
                            ['nombre' => 'Cases sin Fuente para Gamers'],
                            ['nombre' => 'Fuente para Case Gaming'],
                            ['nombre' => 'Fuente para Cases'],
                        ],
                    ],
                    [
                        'nombre' => 'Tarjetas de Video',
                        'children' => [
                            ['nombre' => 'PCI Express NVIDIA Gaming'],
                            ['nombre' => 'PCI Express Radeon Gaming'],
                            ['nombre' => 'PCI Express NVIDIA'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Electrónica',
                'categorias' => [
                    [
                        'nombre' => 'Electrónica',
                        'children' => [
                            ['nombre' => 'Baterías para Laptop'],
                            ['nombre' => 'Baterías para UPS'],
                            ['nombre' => 'Cables y Adaptadores'],
                            ['nombre' => 'Cámaras de Vigilancia'],
                            ['nombre' => 'Cámaras Fotográficas y de Video'],
                            ['nombre' => 'Cargadores de Laptop'],
                            ['nombre' => 'Estabilizadores'],
                            ['nombre' => 'Fuentes de Poder'],
                            ['nombre' => 'Proyectores'],
                            ['nombre' => 'UPS'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Software',
                'categorias' => [
                    [
                        'nombre' => 'Software',
                        'children' => [
                            ['nombre' => 'Antivirus'],
                            ['nombre' => 'Office'],
                            ['nombre' => 'Office 365'],
                            ['nombre' => 'Windows Business'],
                            ['nombre' => 'Windows Consumer'],
                            ['nombre' => 'Windows Server'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Gamer',
                'categorias' => [
                    [
                        'nombre' => 'Gamer',
                        'children' => [
                            ['nombre' => 'Auriculares'],
                            ['nombre' => 'Mouse'],
                            ['nombre' => 'Pad Mouse'],
                            ['nombre' => 'Silla Gamer'],
                            ['nombre' => 'Teclados'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Audio',
                'categorias' => [
                    [
                        'nombre' => 'Audio',
                        'children' => [
                            ['nombre' => 'Auriculares'],
                            ['nombre' => 'Mouse'],
                            ['nombre' => 'Pad Mouse'],
                            ['nombre' => 'Silla Gamer'],
                            ['nombre' => 'Teclados'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Red',
                'categorias' => [
                    [
                        'nombre' => 'Red',
                        'children' => [
                            ['nombre' => 'Auriculares'],
                            ['nombre' => 'Mouse'],
                            ['nombre' => 'Pad Mouse'],
                            ['nombre' => 'Silla Gamer'],
                            ['nombre' => 'Teclados'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Puntos de Venta',
                'categorias' => [
                    [
                        'nombre' => 'Puntos de Venta y POS',
                        'children' => [
                            ['nombre' => 'Auriculares'],
                            ['nombre' => 'Mouse'],
                            ['nombre' => 'Pad Mouse'],
                            ['nombre' => 'Silla Gamer'],
                            ['nombre' => 'Teclados'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Accesorios',
                'categorias' => [
                    [
                        'nombre' => 'Accesorios',
                        'children' => [
                            ['nombre' => 'Auriculares'],
                            ['nombre' => 'Base para Portátil'],
                            ['nombre' => 'Cámaras Web'],
                            ['nombre' => 'Ecran'],
                            ['nombre' => 'Mochilas y Fundas'],
                            ['nombre' => 'Mouse'],
                            ['nombre' => 'Otros'],
                            ['nombre' => 'Parlantes'],
                            ['nombre' => 'Rack'],
                            ['nombre' => 'Smartwatch'],
                            ['nombre' => 'Teclados'],
                        ],
                    ],
                ],
            ],
        ];

        // Crear secciones y categorías recursivamente
        foreach ($data as $seccionData) {
            // Crear o obtener sección existente usando firstOrCreate para evitar duplicados
            $seccion = Seccion::firstOrCreate(
                ['slug' => Str::slug($seccionData['nombre'])],
                [
                    'nombre' => $seccionData['nombre'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            // Crear categorías de manera recursiva empezando desde nivel 1
            $this->createCategorias($seccionData['categorias'], $seccion->id, null, 1);
        }
    }

    /**
     * Función recursiva para crear categorías y sus subcategorías.
     *
     * @param array $categoriasData Datos de categorías (puede tener 'children' para subcategorías)
     * @param int $seccionId ID de la sección
     * @param int|null $parentId ID de la categoría padre (null para nivel 1)
     * @param int $nivel Nivel actual de la categoría
     */
    private function createCategorias(array $categoriasData, int $seccionId, ?int $parentId, int $nivel): void
    {
        foreach ($categoriasData as $categoriaData) {
            $baseSlug = Str::slug($categoriaData['nombre']);
            $slug = $baseSlug;
            $counter = 1;

            // Asegurar slug único para categorías
            while (Categoria::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // Crear o obtener categoría existente usando firstOrCreate
            $categoria = Categoria::firstOrCreate(
                ['slug' => $slug],
                [
                    'nombre' => $categoriaData['nombre'],
                    'seccion_id' => $seccionId,
                    'categoria_padre_id' => $parentId,
                    'nivel' => $nivel,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            // Si hay children (subcategorías), llamar recursivamente con nivel +1
            if (isset($categoriaData['children']) && is_array($categoriaData['children'])) {
                $this->createCategorias($categoriaData['children'], $seccionId, $categoria->id, $nivel + 1);
            }
        }

        $this->call(ProductosSeeder::class);
    }


}
