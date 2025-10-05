<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Seccion;
use App\Models\Categoria;

class SeccionesCategoriasSeeder extends Seeder
{
    public function run(): void
    {
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
                            ['nombre' => 'Mini PCS'],
                            ['nombre' => 'Tablet Android'],
                            ['nombre' => 'Tablet IOS'],
                            ['nombre' => 'Tableta Gráfica'],
                            ['nombre' => 'Impresoras'],
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
                            ['nombre' => 'Impresora Multifuncional Laser'],
                        ],
                    ],
                    [
                        'nombre' => 'Impresora',
                        'children' => [
                            ['nombre' => 'Impresora Laser'],
                            ['nombre' => 'Impresora de Tinta'],
                        ],
                    ],
                    [
                        'nombre' => 'Impresora Varios',
                        'children' => [
                            ['nombre' => 'Impresora Térmica'],
                            ['nombre' => 'Impresora de Etiquetas'],
                            ['nombre' => 'Impresora de Tarjetas'],
                            ['nombre' => 'Scanners'],
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
                            ['nombre' => 'Monitor touch'],
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
                            ['nombre' => 'Partes'],
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
                            ['nombre' => 'Procesador Intel core i5'],
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
                        'nombre' => 'Unidades Solidas',
                        'children' => [
                            ['nombre' => 'Disco Solido Externo (SSD)'],
                            ['nombre' => 'SSD 2.5 SATA'],
                            ['nombre' => 'SSD ACCESORIOS, OTROS'],
                            ['nombre' => 'SSD M.2 NVMe'],
                            ['nombre' => 'SSD M.2 SATA'],
                        ],
                    ],
                    [
                        'nombre' => 'Discos duros',
                        'children' => [
                            ['nombre' => 'DISCO DURO 3.5" SATA'],
                            ['nombre' => 'DISCO DURO EXTERNO 2.5"'],
                            ['nombre' => 'DISCO DURO EXTERNO 3.5"'],
                            ['nombre' => 'DISCO DURO PARA NB SATA'],
                            ['nombre' => 'DISCO DURO PROPIETARIO'],
                        ],
                    ],
                    [
                        'nombre' => 'Placas Madre',
                        'children' => [
                            ['nombre' => 'MB AM4 AMD'],
                            ['nombre' => 'MB AM4 AMD GAMING'],
                            ['nombre' => 'MB AM5 AMD'],
                            ['nombre' => 'MB AM5 AMD GAMING'],
                            ['nombre' => 'MB CI7 S1200'],
                            ['nombre' => 'MB CI7 S1200 GAMING'],
                            ['nombre' => 'MB CI9 S1700 DDR4'],
                            ['nombre' => 'MB CI9 S1700 DDR4 GAMING'],
                            ['nombre' => 'MB CI9 S1700 DDR5'],
                            ['nombre' => 'MB CI9 S1700 DDR5 GAMING'],
                        ],
                    ],
                    [
                        'nombre' => 'Cases',
                        'children' => [
                            ['nombre' => 'CASE PARA DISCOS HDD/SSD'],
                            ['nombre' => 'CASES ATX Slim'],
                            ['nombre' => 'CASES ATX VER2.0'],
                            ['nombre' => 'CASES CON FUENTE P/GAMERS'],
                            ['nombre' => 'CASES MICRO ATX'],
                            ['nombre' => 'CASES SIN FUENTE P/GAMERS'],
                            ['nombre' => 'FUENTE PARA CASE GAMING'],
                            ['nombre' => 'FUENTE PARA CASES'],
                        ],
                    ],
                    [
                        'nombre' => 'Tarjetas de Video',
                        'children' => [
                            ['nombre' => 'PCI EXP NVIDIA GAMING'],
                            ['nombre' => 'PCI EXP RADEON GAMING'],
                            ['nombre' => 'PCI EXPRESS NVIDIA'],
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
                            ['nombre' => 'Baterías Para Laptop'],
                            ['nombre' => 'Baterías Para UPS'],
                            ['nombre' => 'Cables y Adaptadores'],
                            ['nombre' => 'Cámaras de Vigilancia'],
                            ['nombre' => 'Analógicas'],
                            ['nombre' => 'IP'],
                            ['nombre' => 'Cámaras Fotográficas y de video'],
                            ['nombre' => 'Cargadores de Laptop'],
                            ['nombre' => 'Estabilizadores'],
                            ['nombre' => 'Fuentes de poder'],
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
                            ['nombre' => 'ANTIVIRUS'],
                            ['nombre' => 'OFFICE'],
                            ['nombre' => 'OFFICE 365'],
                            ['nombre' => 'WINDOWS BUSINESS'],
                            ['nombre' => 'WINDOWS CONSUMER'],
                            ['nombre' => 'WINDOWS SERVER'],
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
                            ['nombre' => 'Micrófono'],
                            ['nombre' => 'Parlantes'],
                            ['nombre' => 'Trípodes'],
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
                            ['nombre' => 'Acces Point Exteriores'],
                            ['nombre' => 'Acces Point Interiores'],
                            ['nombre' => 'Accesorios'],
                            ['nombre' => 'Adaptador USB Wireless'],
                            ['nombre' => 'Cables'],
                            ['nombre' => 'Canaletas'],
                            ['nombre' => 'Conector RJ-45'],
                            ['nombre' => 'Gabinetes de red'],
                            ['nombre' => 'Jacks'],
                            ['nombre' => 'Patch Panel'],
                            ['nombre' => 'Racks'],
                            ['nombre' => 'Router Ethernet Wireless'],
                            ['nombre' => 'Switch'],
                            ['nombre' => 'Tarjetas de Red'],
                            ['nombre' => 'Tarjetas de red WIFI Internas'],
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Puntos de venta',
                'categorias' => [
                    [
                        'nombre' => 'Puntos de Venta',
                        'children' => [
                            ['nombre' => 'Punto de Venta POS'],
                            ['nombre' => 'Escaneres de codigos'],
                            ['nombre' => 'Gavetas de dinero'],
                            ['nombre' => 'Impresoras de etiqueta'],
                            ['nombre' => 'Impresoras térmicas'],
                            ['nombre' => 'Kits de puntos de venta'],
                            ['nombre' => 'Monitores táctil'],
                            ['nombre' => 'Otros'],
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

        foreach ($data as $sectionData) {
            $seccionSlug = Str::slug($sectionData['nombre']);
            $seccion = Seccion::firstOrCreate(
                ['slug' => $seccionSlug],
                ['nombre' => $sectionData['nombre']]
            );

            foreach ($sectionData['categorias'] as $catData) {
                $catSlug = Str::slug($catData['nombre']);
                $fullCatSlug = $seccionSlug . '-' . $catSlug; // Prefijo para unicidad global

                $categoria = Categoria::firstOrCreate(
                    [
                        'slug' => $fullCatSlug,
                        'seccion_id' => $seccion->id,
                        'categoria_padre_id' => null,
                    ],
                    [
                        'nombre' => $catData['nombre'],
                        'nivel' => 1,
                    ]
                );

                // Subcategorías (nivel 2)
                if (isset($catData['children']) && is_array($catData['children'])) {
                    foreach ($catData['children'] as $childData) {
                        $childSlug = Str::slug($childData['nombre']);
                        $fullChildSlug = $seccionSlug . '-' . $childSlug; // Prefijo también para children

                        Categoria::firstOrCreate(
                            [
                                'slug' => $fullChildSlug,
                                'seccion_id' => $seccion->id,
                                'categoria_padre_id' => $categoria->id,
                            ],
                            [
                                'nombre' => $childData['nombre'],
                                'nivel' => 2,
                            ]
                        );
                    }
                }
            }
        }
    }
}
