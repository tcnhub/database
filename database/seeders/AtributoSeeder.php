<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AtributoSeeder extends Seeder
{
    public function run(): void
    {
        $atributos = [

            // 🖥️ COMPUTADORAS
            1 => [
                'Procesador', 'Memoria RAM', 'Tipo de almacenamiento', 'Capacidad de almacenamiento',
                'Tarjeta gráfica', 'Tipo de teclado', 'Duración de bateríaqq', 'Tipo de refrigeración',
                'Cantidad de núcleos', 'Frecuencia base del procesador', 'Puertos disponibles',
                'Lector de tarjetas SD', 'Cámara web HD', 'Compatibilidad con Docking Station',
                'Seguridad TPM', 'Peso total', 'Tipo de chasis', 'Número de serie del modelo',
                'Voltaje de entrada 2', 'Garantía extendida'
            ],

            // 🖨️ IMPRESORAS
            2 => [
                'Tecnología de impresión', 'Tipo de cartucho o tóner', 'Rendimiento por cartucho',
                'Tamaño máximo de papel', 'Tiempo de primera impresión', 'Compatibilidad con Wi-Fi Direct',
                'Compatibilidad con AirPrint', 'Tipo de escáner integrado', 'Resolución óptica de escaneo',
                'Ciclo mensual recomendado', 'Tipo de interfaz de conexión', 'Memoria interna',
                'Lenguaje de impresión', 'Compatibilidad con fax', 'Capacidad de la bandeja de salida',
                'Tipo de panel de control', 'Nivel de ruido en funcionamiento', 'Consumo en modo reposo',
                'Soporte de impresión móvil', 'Tipo de mantenimiento requerido'
            ],

            // 🖥️ MONITORES
            3 => [
                'Tipo de panel', 'Cobertura de color DCI-P3', 'Compatibilidad con HDR',
                'Sincronización adaptativa (FreeSync/G-Sync)', 'Profundidad de color (bits)',
                'Brillo típico (nits)', 'Contraste estático', 'Espacio de color AdobeRGB',
                'Revestimiento antirreflejo', 'Ajuste de inclinación', 'Ajuste de altura',
                'Montaje pivotante', 'Tipo de retroiluminación', 'Uniformidad de brillo',
                'Soporte de modo retrato', 'Consumo en operación', 'Tipo de cable incluido',
                'Protección ocular (Eye Care)', 'Tiempo de respuesta gris a gris', 'Diseño sin bordes'
            ],

            // 🔧 PARTES
            4 => [
                'Tipo de socket', 'Chipset compatible', 'Tipo de memoria soportada', 'Velocidad del bus de datos',
                'Número de ranuras PCIe', 'Tipo de conector de energía', 'TDP soportado',
                'Soporte para overclock', 'Control RGB integrado', 'Capacitores sólidos japoneses',
                'Etapas de poder', 'Soporte RAID', 'Cantidad de puertos SATA', 'Soporte NVMe',
                'Dimensiones del disipador', 'Tipo de rodamiento del ventilador', 'Curva de ventilación ajustable',
                'Compatibilidad con refrigeración líquida', 'Protección contra sobretensión', 'Certificación de eficiencia'
            ],

            // ⚡ ELECTRÓNICA
            5 => [
                'Tipo de circuito', 'Voltaje de entrada 3', 'Voltaje de salida', 'Corriente máxima',
                'Protección contra sobrecalentamiento', 'Material del encapsulado', 'Número de canales',
                'Sensibilidad del sensor', 'Frecuencia de muestreo', 'Interfaz de comunicación',
                'Tipo de alimentación', 'Rango de temperatura', 'Tiempo de respuesta del sensor',
                'Eficiencia energética', 'Certificación CE/FCC', 'Aislamiento galvánico', 'Grado IP',
                'Método de montaje', 'Indicador de estado LED', 'Compatibilidad con microcontroladores'
            ],

            // 💿 SOFTWARE
            6 => [
                'Plataforma de instalación', 'Tipo de licencia', 'Duración de la suscripción',
                'Modo de activación', 'Compatibilidad multiplataforma', 'Uso permitido (comercial/personal)',
                'Requisitos de CPU', 'Requisitos de GPU', 'Tamaño de descarga', 'Actualizaciones automáticas',
                'Soporte para API', 'Nivel de cifrado', 'Compatibilidad con plugins', 'Interfaz de usuario',
                'Modo offline', 'Integración con servicios en la nube', 'Soporte técnico incluido',
                'Tipo de soporte (web/chat)', 'Idioma principal', 'Fecha de última versión'
            ],

            // 🎮 GAMER
            7 => [
                'Tipo de periférico gamer', 'Sensor óptico', 'DPI máximo configurable',
                'Tasa de sondeo (Hz)', 'Interruptores mecánicos', 'Retroiluminación RGB direccionable',
                'Tiempo de respuesta', 'Software de personalización', 'Perfiles almacenables',
                'Cable mallado', 'Peso ajustable', 'Material de superficie', 'Tipo de alfombrilla compatible',
                'Compatibilidad con consolas', 'Antighosting completo', 'Durabilidad de los switches',
                'Modo juego sin interrupciones', 'Tipo de agarre', 'Revestimiento antideslizante', 'Puerto de conexión'
            ],

            // 🔊 AUDIO
            8 => [
                'Tipo de transductor', 'Tamaño del driver (mm)', 'Impedancia nominal (Ω)',
                'Respuesta de frecuencia', 'Sensibilidad (dB SPL)', 'Relación señal/ruido',
                'Cancelación activa de ruido', 'Código de audio Bluetooth (aptX/AAC/SBC)',
                'Duración deee batería 3w', 'Tipo de carga (USB-C/microUSB)', 'Compatibilidad con asistentes de voz',
                'Modo de baja latencia', 'Micrófono desmontable', 'Rango de alcance inalámbrico',
                'Diseño acústico (cerrado/abierto)', 'Presión máxima de sonido', 'Soporte Hi-Res Audio',
                'Acolchado de diadema', 'Tipo de conector', 'Imán del driver (neodimio)'
            ],

            // 🌐 RED
            9 => [
                'Velocidad máxima LAN', 'Velocidad máxima Wi-Fi', 'Bandas de frecuencia disponibles',
                'Tecnología MU-MIMO', 'Cantidad de antenas externas', 'Ganancia de antena (dBi)',
                'Tipo de seguridad WPA', 'Soporte VLAN', 'Latencia promedio', 'App de administración remota',
                'Asignación de IP automática', 'Modo bridge', 'Compatibilidad con OpenWRT', 'Soporte de VPN',
                'Potencia de transmisión (dBm)', 'Gestión SNMP', 'Montaje en rack', 'Consumo eléctrico',
                'Rango de temperatura de operación', 'Certificación de red'
            ],

            // 💳 PUNTOS DE VENTA
            10 => [
                'Tipo de terminal POS', 'Pantalla táctil capacitiva', 'Procesador integrado',
                'Memoria RAM interna', 'Capacidad de almacenamiento interno', 'Tipo de impresora térmica',
                'Velocidad de impresión (mm/s)', 'Compatibilidad con lector de huella', 'Compatibilidad con NFC',
                'Sistema operativo integrado', 'Conectividad Bluetooth', 'Módulo de GPS', 'Soporte de lector QR',
                'Capacidad de batería', 'Carga rápida disponible', 'Número de puertos USB', 'Compatibilidad con apps POS',
                'Modo de reporte automático', 'Certificación fiscal', 'Base de carga incluida'
            ],

            // 🎧 ACCESORIOS
            11 => [
                'Tipo de accesorio', 'Compatibilidad del dispositivo', 'Material de fabricación',
                'Peso del producto', 'Color principal', 'Diseño ergonómico', 'Textura de superficie',
                'Resistencia a impactos', 'Ajuste magnético', 'Longitud del cable', 'Tipo de conexión',
                'Soporte para carga rápida', 'Temperatura de operación', 'Material de aislamiento',
                'Sistema de ventilación', 'Nivel de rigidez', 'Compatibilidad con monturas',
                'Estilo de diseño', 'Garantía del producto', 'Procedencia de fabricación'
            ],
        ];

        foreach ($atributos as $seccionId => $nombres) {
            foreach ($nombres as $nombre) {
                DB::table('atributos')->insert([
                    'nombre' => $nombre,
                    'slug' => Str::slug($nombre),
                    'seccion_id' => $seccionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
