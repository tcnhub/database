<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SeccionesCategoriasSeeder::class,
            AtributoSeeder::class,
        ]);


        DB::table('productos')->insert([
            // Producto de ejemplo, según tu indicación
            ['id' => 1, 'nombre' => 'Laptop Lenovo ThinkPad X1', 'slug' => 'laptop-lenovo-thinkpad-x1', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],

            // Productos extraídos de tu lista
            ['id' => 2, 'nombre' => 'PR-112 Multi-Angle Stand Holder', 'slug' => 'pr-112-multi-angle-stand-holder', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:00:00', 'updated_at' => '2025-10-07 10:00:00'],
            ['id' => 3, 'nombre' => 'Tablet Advance Prime PR5850, 7" 1024x600, Android 8.1, 3G, Dual SIM, 16GB, RAM 1GB.', 'slug' => 'tablet-advance-prime-pr5850-7-1024x600', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:01:00', 'updated_at' => '2025-10-07 10:01:00'],
            ['id' => 4, 'nombre' => 'Tablet Advance Prime PR6172, 8" 1024x600, Android 9 Go , 3G , Dual SIM, 16GB, RAM 1GB.', 'slug' => 'tablet-advance-prime-pr6172-8-1024x600', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:02:00', 'updated_at' => '2025-10-07 10:02:00'],
            ['id' => 5, 'nombre' => 'PAD TRANSFORMADOR ASUS, TECLADO Y TOUCHPAD PARA TABLET TF300T', 'slug' => 'pad-transformador-asus-teclado-y-touchpad-para-tablet-tf300t', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:03:00', 'updated_at' => '2025-10-07 10:03:00'],
            ['id' => 6, 'nombre' => 'Tablet Advance NovaPad NP6070, 10.95" IPS 1920*1200, 8GB RAM, 128GB, Android 14 , 4G LTE', 'slug' => 'tablet-advance-novapad-np6070-10-95-ips', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:04:00', 'updated_at' => '2025-10-07 10:04:00'],
            ['id' => 7, 'nombre' => 'Tablet Lenovo Tab M11, 11" WUXGA (1920x1200) IPS (In-cell/10-point Multi-touch)', 'slug' => 'tablet-lenovo-tab-m11-11-wuxga', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:05:00', 'updated_at' => '2025-10-07 10:05:00'],
            ['id' => 8, 'nombre' => 'CHROMEBOOK LENOVO 100E 2ND GEN AST 11.6" HD TN AMD A4-9120C 1.6 / 2.4GHZ, 4GB DDR4-1866MHZ', 'slug' => 'chromebook-lenovo-100e-2nd-gen-ast-11-6', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:06:00', 'updated_at' => '2025-10-07 10:06:00'],
            ['id' => 9, 'nombre' => 'Unidad de almacenamiento en red Western Digital My Cloud Home, 3TB, USB 3.0, LAN GBE.', 'slug' => 'unidad-de-almacenamiento-en-red-western-digital-my-cloud-home-3tb', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:07:00', 'updated_at' => '2025-10-07 10:07:00'],
            ['id' => 10, 'nombre' => 'PC INTEL CORE I3-12100, 3.3/4.3 GHZ, 16GB DDR4, 512GB M.2 SSD.', 'slug' => 'pc-intel-core-i3-12100-3-3-16gb-ddr4', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:08:00', 'updated_at' => '2025-10-07 10:08:00'],
            ['id' => 11, 'nombre' => 'PC INTEL CORE I3-12100, 3.3/4.3 GHZ, 8GB DDR4, 512GB M.2 SSD , MONITOR 21.5".', 'slug' => 'pc-intel-core-i3-12100-3-3-8gb-ddr4-monitor-21-5', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:09:00', 'updated_at' => '2025-10-07 10:09:00'],
            ['id' => 12, 'nombre' => 'Notebook Lenovo V15 G3 IAP 15.6" FHD TN, Core i3-1215U 1.2 / 4.4GHz, 8GB DDR4-3200MHz', 'slug' => 'notebook-lenovo-v15-g3-iap-15-6-fhd-tn', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:10:00', 'updated_at' => '2025-10-07 10:10:00'],
            ['id' => 13, 'nombre' => 'PC INTEL CORE I3-12100 3.3 GHZ, H610 8GB DDR4, 256GB SSD, MONITOR 21.5".', 'slug' => 'pc-intel-core-i3-12100-3-3-ghz-h610', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:11:00', 'updated_at' => '2025-10-07 10:11:00'],
            ['id' => 14, 'nombre' => 'PC INTEL CORE I5-12450H 2.00/4.40 GHZ, 16GB DDR4, 512 GB SSD', 'slug' => 'pc-intel-core-i5-12450h-2-00-16gb-ddr4', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:12:00', 'updated_at' => '2025-10-07 10:12:00'],
            ['id' => 15, 'nombre' => 'PC INTEL CORE I3-12100, 3.3/4.3 GHZ, 16GB DDR4, 512GB M.2 SSD , MONITOR 21.5".', 'slug' => 'pc-intel-core-i3-12100-3-3-16gb-ddr4-monitor-21-5-copy', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:13:00', 'updated_at' => '2025-10-07 10:13:00'],
            ['id' => 16, 'nombre' => 'Pc Mini Asus Nuc CORE i3-1315U 3.30 GHZ DR4', 'slug' => 'pc-mini-asus-nuc-core-i3-1315u-3-30-ghz-dr4', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:14:00', 'updated_at' => '2025-10-07 10:14:00'],
            ['id' => 17, 'nombre' => 'PC INTEL CORE I3-12100, 3.3/4.3 GHZ, 8GB DDR4, 256GB M.2 SSD , MONITOR 24".', 'slug' => 'pc-intel-core-i3-12100-3-3-8gb-ddr4-monitor-24', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:15:00', 'updated_at' => '2025-10-07 10:15:00'],
            ['id' => 18, 'nombre' => 'PC INTEL CORE I3-12100, 3.3/4.3 GHZ, 8GB DDR4, 500GB M.2 SSD , MONITOR 24".', 'slug' => 'pc-intel-core-i3-12100-3-3-8gb-ddr4-500gb-monitor-24', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:16:00', 'updated_at' => '2025-10-07 10:16:00'],
            ['id' => 19, 'nombre' => 'PC INTEL CORE I5-12450H 2.00/4.40 GHZ, 16GB DDR4, 512 GB SSD. MONITOR 21.5"', 'slug' => 'pc-intel-core-i5-12450h-2-00-16gb-ddr4-monitor-21-5', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:17:00', 'updated_at' => '2025-10-07 10:17:00'],
            ['id' => 20, 'nombre' => 'PC INTEL CORE I3-12100 3.3 GHZ, B760M-P 8GB DDR4, 512GB (2 X 256GB) SSD, MONITOR 21.5".', 'slug' => 'pc-intel-core-i3-12100-3-3-ghz-b760m-p', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:18:00', 'updated_at' => '2025-10-07 10:18:00'],
            ['id' => 21, 'nombre' => 'PC INTEL CORE I3-12100 3.3 GHZ,H610 8GB DDR4, 512GB SSD, MONITOR 21.5".', 'slug' => 'pc-intel-core-i3-12100-3-3-ghz-h610-512gb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:19:00', 'updated_at' => '2025-10-07 10:19:00'],
            ['id' => 22, 'nombre' => 'Computadora Advance Vission VO1470, Intel Core i5-13400 2.5GHz, 16GB DDR5, 1TB SSD M.2 NMVe', 'slug' => 'computadora-advance-vission-vo1470-i5-13400', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:20:00', 'updated_at' => '2025-10-07 10:20:00'],
            ['id' => 23, 'nombre' => 'PC AMC INTEL CORE I5-12400, 2.50 GHZ, 8GB DDR4, 256GB M.2 SSD, MONITOR 21.5".', 'slug' => 'pc-amc-intel-core-i5-12400-8gb-256gb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:21:00', 'updated_at' => '2025-10-07 10:21:00'],
            ['id' => 24, 'nombre' => 'Notebook Lenovo IdeaPad Slim 3, 15.3" WUXGA IPS, Core i5-13420H 2.1/4.6GHz, 16GB DDR5-4800', 'slug' => 'notebook-lenovo-ideapad-slim-3-15-3-wuxga', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:22:00', 'updated_at' => '2025-10-07 10:22:00'],
            ['id' => 25, 'nombre' => 'PC INTEL CORE I3-12100, 3.3 GHZ, 8GB DDR4, 1TB SSD, MONITOR 21.5".', 'slug' => 'pc-intel-core-i3-12100-3-3-ghz-8gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:23:00', 'updated_at' => '2025-10-07 10:23:00'],
            ['id' => 26, 'nombre' => 'Notebook Lenovo V15 G4 IRU, 15.6" FHD TN, Core i5-13420H 2.1 / 4.6GHz, 8GB DDR4-3200MHz', 'slug' => 'notebook-lenovo-v15-g4-iru-15-6-fhd-tn-8gb', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:24:00', 'updated_at' => '2025-10-07 10:24:00'],
            ['id' => 27, 'nombre' => 'PC AMC INTEL CORE I5-12400, 2.50 GHZ, 8GB DDR4, 500GB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-amc-intel-core-i5-12400-8gb-500gb-ssd-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:25:00', 'updated_at' => '2025-10-07 10:25:00'],
            ['id' => 28, 'nombre' => 'PC AMC INTEL CORE I7-11700F 2.50/ 4.40 GHz, 16GB DDR4, 512GB M.2 SSD, GT 1030 2GB.', 'slug' => 'pc-amc-intel-core-i7-11700f-16gb-512gb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:26:00', 'updated_at' => '2025-10-07 10:26:00'],
            ['id' => 29, 'nombre' => 'PC INTEL CORE I5-12400, 2.50 GHZ, 8GB DDR4, 512GB M.2 SSD NVMe.', 'slug' => 'pc-intel-core-i5-12400-8gb-512gb-nvme', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:27:00', 'updated_at' => '2025-10-07 10:27:00'],
            ['id' => 30, 'nombre' => 'PC INTEL CORE I5-12400, 2.50 GHZ, 16GB DDR4, 500GB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-intel-core-i5-12400-16gb-500gb-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:28:00', 'updated_at' => '2025-10-07 10:28:00'],
            ['id' => 31, 'nombre' => 'Computadora Advance Vission VO2470, Intel Core i5-13400 2.5GHz, 16GB DDR5, 1TB SSD M.2 NMVe', 'slug' => 'computadora-advance-vission-vo2470-i5-13400', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:29:00', 'updated_at' => '2025-10-07 10:29:00'],
            ['id' => 32, 'nombre' => 'Notebook Lenovo V15 G4 IRU, 15.6" FHD TN, Core i5-13420H 2.1 / 4.6GHz, 16GB DDR4-3200MHz', 'slug' => 'notebook-lenovo-v15-g4-iru-15-6-fhd-tn-16gb', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:30:00', 'updated_at' => '2025-10-07 10:30:00'],
            ['id' => 33, 'nombre' => 'Pc Mini Asus Nuc CORE i3-1315U 3.30 GHZ DR4, 8GB, 512GB, MONITOR SAMSUNG 24"', 'slug' => 'pc-mini-asus-nuc-core-i3-1315u-monitor-samsung-24', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:31:00', 'updated_at' => '2025-10-07 10:31:00'],
            ['id' => 34, 'nombre' => 'Computadora Advance Vission VO2570, Intel Core i5-14400 2.5GHz, 16GB DDR5, 1TB SSD M.2 NMVe', 'slug' => 'computadora-advance-vission-vo2570-i5-14400', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:32:00', 'updated_at' => '2025-10-07 10:32:00'],
            ['id' => 35, 'nombre' => 'PC INTEL CORE I5-12400 2.50 GHZ, TORNADO 06, 16GB DDR4 , 500GB M.2 SSD, MONITOR 24".', 'slug' => 'pc-intel-core-i5-12400-tornado-06', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:33:00', 'updated_at' => '2025-10-07 10:33:00'],
            ['id' => 36, 'nombre' => 'PC AMC INTEL CORE I5-12400, 2.50 GHZ, 16GB DDR4, 500GB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-amc-intel-core-i5-12400-16gb-500gb-ssd-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:34:00', 'updated_at' => '2025-10-07 10:34:00'],
            ['id' => 37, 'nombre' => 'Computadora Advance Vission VO1470, Intel Core i5-13400 2.5GHz, 16GB DDR5, 1TB SSD M.2 NMVe, Monitor LG 23.8"', 'slug' => 'computadora-advance-vission-vo1470-i5-13400-monitor-lg', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:35:00', 'updated_at' => '2025-10-07 10:35:00'],
            ['id' => 38, 'nombre' => 'PC AMC Ryzen 5 5600GT, 3.60 / 4.60 GHz, 16GB DDR4, 1TB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-amc-ryzen-5-5600gt-16gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:36:00', 'updated_at' => '2025-10-07 10:36:00'],
            ['id' => 39, 'nombre' => 'Notebook Lenovo V15 G4 IRU, 15.6" FHD TN, Core i5-13420H 2.1 / 4.6GHz, 16GB DDR4-3200MHz, 1 TB SSD.', 'slug' => 'notebook-lenovo-v15-g4-iru-15-6-fhd-tn-16gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:37:00', 'updated_at' => '2025-10-07 10:37:00'],
            ['id' => 40, 'nombre' => 'PC AMC INTEL CORE I5-12400, 2.50 GHZ, 16GB DDR4, 1TB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-amc-intel-core-i5-12400-16gb-1tb-ssd-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:38:00', 'updated_at' => '2025-10-07 10:38:00'],
            ['id' => 41, 'nombre' => 'PC INTEL CORE I5-12400, 2.50 GHZ, 16GB DDR4, 500GB M.2 SSD,', 'slug' => 'pc-intel-core-i5-12400-16gb-500gb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:39:00', 'updated_at' => '2025-10-07 10:39:00'],
            ['id' => 42, 'nombre' => 'All-in-One Lenovo IdeaCentre 3 24ALC6 23.8" FHD IPS Ryzen 5 7430U 2.3/4.3GHz 8GB DDR4-3200', 'slug' => 'all-in-one-lenovo-ideacentre-3-24alc6-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:40:00', 'updated_at' => '2025-10-07 10:40:00'],
            ['id' => 43, 'nombre' => 'Computadora Advance Vission VO2470, Intel Core i5-13400 2.5GHz, 16GB DDR5, 1TB SSD M.2 NMVe, Monitor LG 23.8"', 'slug' => 'computadora-advance-vission-vo2470-i5-13400-monitor-lg', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:41:00', 'updated_at' => '2025-10-07 10:41:00'],
            ['id' => 44, 'nombre' => 'PC INTEL Core i5-13400 2.50/4.60GHz 20MB, CASE GAMER, 16GB DDR4 , 500GB M.2 SSD, MONITOR 24".', 'slug' => 'pc-intel-core-i5-13400-case-gamer-16gb-500gb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:42:00', 'updated_at' => '2025-10-07 10:42:00'],
            ['id' => 45, 'nombre' => 'PC AMC INTEL CORE I5-12400, 2.50 GHZ, 16GB DDR5, 256GB Y 1TB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-amc-intel-core-i5-12400-16gb-ddr5-256gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:43:00', 'updated_at' => '2025-10-07 10:43:00'],
            ['id' => 46, 'nombre' => 'Computadora Advance Vission VO2570, Intel Core i5-14400 2.5GHz, 16GB DDR5, 1TB SSD M.2 NMVe, Monitor LG 23.8"', 'slug' => 'computadora-advance-vission-vo2570-i5-14400-monitor-lg', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:44:00', 'updated_at' => '2025-10-07 10:44:00'],
            ['id' => 47, 'nombre' => 'PC INTEL CORE I5-13400 2.50/4.60 GHZ, ARIES 06, 16GB DDR4 , 500 GB M.2 SSD, MONITOR 24".', 'slug' => 'pc-intel-core-i5-13400-aries-06', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:45:00', 'updated_at' => '2025-10-07 10:45:00'],
            ['id' => 48, 'nombre' => 'PC AMC INTEL CORE I7-11700F 2.50/ 4.40 GHz, 16GB DDR4, 512GB M.2 SSD, GT 1030 2GB. MONITOR 23.8"', 'slug' => 'pc-amc-intel-core-i7-11700f-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:46:00', 'updated_at' => '2025-10-07 10:46:00'],
            ['id' => 49, 'nombre' => 'ALL-IN-ONE HP 240 G9 23.8" FHD, Core I5-1235U 3.30/4.40GHZ, 8GB DDR4-3200MHZ 256GB SSD.', 'slug' => 'all-in-one-hp-240-g9-23-8-fhd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:47:00', 'updated_at' => '2025-10-07 10:47:00'],
            ['id' => 50, 'nombre' => 'PC Intel Core i7-14700 2.10/5.40GHz, 16GB DDR5, 1TB SSD M.2.', 'slug' => 'pc-intel-core-i7-14700-16gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:48:00', 'updated_at' => '2025-10-07 10:48:00'],
            ['id' => 51, 'nombre' => 'PC INTEL CORE I5-12400F 2.50/4.40 GHZ, 16GB DDR5, 512 GB SSD, MONITOR 27"', 'slug' => 'pc-intel-core-i5-12400f-16gb-ddr5-monitor-27', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:49:00', 'updated_at' => '2025-10-07 10:49:00'],
            ['id' => 52, 'nombre' => 'PC AMC INTEL CORE I5-12400F 2.50/ 4.40 GHz, 16GB DDR5, 500GB M.2 SSD, RTX 3060 12GB.', 'slug' => 'pc-amc-intel-core-i5-12400f-rtx-3060', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:50:00', 'updated_at' => '2025-10-07 10:50:00'],
            ['id' => 53, 'nombre' => 'PC AMD RYZEN 7 5700G, 3.8/4.6GHz, 16GB DDR4, 1TB SSD SATA, GTX 1650 4GB, MONITOR 27"', 'slug' => 'pc-amd-ryzen-7-5700g-gtx-1650-monitor-27', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:51:00', 'updated_at' => '2025-10-07 10:51:00'],
            ['id' => 54, 'nombre' => 'PC AMD RYZEN 5 8400F 4.2/4.7GHZ, 16GB DDR5, 1TB SSD M.2, MONITOR 27".', 'slug' => 'pc-amd-ryzen-5-8400f-16gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:52:00', 'updated_at' => '2025-10-07 10:52:00'],
            ['id' => 55, 'nombre' => 'PC INTEL CORE I7-14700 2.10/5.40 GHZ, 16GB DDR5, 1TB SSD.', 'slug' => 'pc-intel-core-i7-14700-16gb-1tb-ssd-copy', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:53:00', 'updated_at' => '2025-10-07 10:53:00'],
            ['id' => 56, 'nombre' => 'Notebook ASUS TUF GAMING A15 FA506NC-HN006 15.6", AMD Ryzen™ 5 7535HS, 8GB DDR5, 512GB VRAM 4GB', 'slug' => 'notebook-asus-tuf-gaming-a15-fa506nc-hn006', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:54:00', 'updated_at' => '2025-10-07 10:54:00'],
            ['id' => 57, 'nombre' => 'CPU INTEL CORE i7-12700 2.10 / 4.9GHz, 16GB DDR4, 1TB M.2 SSD, WINDOWS 11, OFFICE PRO 2021.', 'slug' => 'cpu-intel-core-i7-12700-16gb-1tb-ssd-windows-11', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:55:00', 'updated_at' => '2025-10-07 10:55:00'],
            ['id' => 58, 'nombre' => 'PC INTEL CORE I5 12400F 4.40 GHz,16GB DDR5, 1TB SSD,RTX 3050 6GB, MONITOR 24"', 'slug' => 'pc-intel-core-i5-12400f-rtx-3050-monitor-24', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:56:00', 'updated_at' => '2025-10-07 10:56:00'],
            ['id' => 59, 'nombre' => 'Notebook Lenovo V15 G4 IRU, 15.6" FHD TN, Core i7-1355U 1.7 / 5.0GHz, 16GB DDR4-3200MHz', 'slug' => 'notebook-lenovo-v15-g4-iru-i7-1355u', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:57:00', 'updated_at' => '2025-10-07 10:57:00'],
            ['id' => 60, 'nombre' => 'PC AMC INTEL CORE I5-12400F 2.50/ 4.40 GHz, 16GB DDR5, 500GB M.2 SSD, GTX 1650 4GB.', 'slug' => 'pc-amc-intel-core-i5-12400f-gtx-1650', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:58:00', 'updated_at' => '2025-10-07 10:58:00'],
            ['id' => 61, 'nombre' => 'Computadora Advance Vission VO2770, Intel Core i7-14700 2.1GHz, 16GB DDR5, 1TB SSD M.2 NMVe', 'slug' => 'computadora-advance-vission-vo2770-i7-14700', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 10:59:00', 'updated_at' => '2025-10-07 10:59:00'],
            ['id' => 62, 'nombre' => 'Computadora Advance Vission VO1470, Intel Core i7-12700 2.5GHz, 16GB DDR5, 512 GB SSD M.2 NMVe, Monitor LG 23.8"', 'slug' => 'computadora-advance-vission-vo1470-i7-12700-monitor-lg', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:00:00', 'updated_at' => '2025-10-07 11:00:00'],
            ['id' => 63, 'nombre' => 'PC AMC INTEL CORE I7-12700 2.10/4.90 GHZ, 16GB DDR4, 1TB M.2 SSD, MONITOR 23.8".', 'slug' => 'pc-amc-intel-core-i7-12700-16gb-1tb-ssd-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:01:00', 'updated_at' => '2025-10-07 11:01:00'],
            ['id' => 64, 'nombre' => 'Computadora Lenovo ThinkCentre neo 50s Gen 3 Core i5-12400 6C, 2.50 / 4.40GHz, 16GB DDR4-3200MHz', 'slug' => 'computadora-lenovo-thinkcentre-neo-50s-gen-3-i5-12400', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:02:00', 'updated_at' => '2025-10-07 11:02:00'],
            ['id' => 65, 'nombre' => 'Computadora Lenovo ThinkCentre Neo 50S Gen 5, Core i7-14700 5.4GHz, 16GB DDR5-5600', 'slug' => 'computadora-lenovo-thinkcentre-neo-50s-gen-5-i7-14700', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:03:00', 'updated_at' => '2025-10-07 11:03:00'],
            ['id' => 66, 'nombre' => 'PC INTEL CORE I7-12700 i7-12700 2.10 / 4.9GHz, 16GB DDR4, 1TB SSD, MONITOR 21.5".', 'slug' => 'pc-intel-core-i7-12700-16gb-1tb-ssd-monitor-21-5', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:04:00', 'updated_at' => '2025-10-07 11:04:00'],
            ['id' => 67, 'nombre' => 'PC AMC INTEL CORE I7-12700 2.10 / 4.90 GHz, 16GB DDR4, 1 TB M.2 SSD, TARJETA WIRELESS D-LINK DWA-582, MONITOR TEROS 31.5"', 'slug' => 'pc-amc-intel-core-i7-12700-monitor-teros-31-5', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:05:00', 'updated_at' => '2025-10-07 11:05:00'],
            ['id' => 68, 'nombre' => 'Notebook ASUS TUF GAMING F16 FX607VJ-RL016, 16", Core 5 210H hasta 4.8GHz, 8GB DDR4-3200MHz', 'slug' => 'notebook-asus-tuf-gaming-f16-fx607vj-rl016', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:06:00', 'updated_at' => '2025-10-07 11:06:00'],
            ['id' => 69, 'nombre' => 'PC INTEL CORE I7-14700 2.10/5.40 GHZ, 16GB DDR5, 1TB SSD.', 'slug' => 'pc-intel-core-i7-14700-16gb-1tb-ssd-copy-2', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:07:00', 'updated_at' => '2025-10-07 11:07:00'],
            ['id' => 70, 'nombre' => 'Computadora Advance Vission VO2770, Intel Core i7-14700 2.1GHz, 16GB DDR5, 1TB SSD M.2 NMVe, Monitor LG 23.8"', 'slug' => 'computadora-advance-vission-vo2770-i7-14700-monitor-lg', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:08:00', 'updated_at' => '2025-10-07 11:08:00'],
            ['id' => 71, 'nombre' => 'PC AMC INTEL CORE I5-13400 2.50/ 4.60 GHz, 16GB DDR5, 1 TB M.2 SSD, RTX 3050 6GB, MONITOR 27".', 'slug' => 'pc-amc-intel-core-i5-13400-rtx-3050', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:09:00', 'updated_at' => '2025-10-07 11:09:00'],
            ['id' => 72, 'nombre' => 'PC AMC INTEL CORE I5-12400F 2.50/ 4.40 GHz, 16GB DDR5, 500GB M.2 SSD, RTX 3060 12GB, MONITOR 24".', 'slug' => 'pc-amc-intel-core-i5-12400f-rtx-3060-monitor-24', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:10:00', 'updated_at' => '2025-10-07 11:10:00'],
            ['id' => 73, 'nombre' => 'Notebook ASUS TUF GAMING F16 FX607VJ-RL009, 16", Core 5 210H hasta 4.8GHz, 16GB DDR4-3200MHz', 'slug' => 'notebook-asus-tuf-gaming-f16-fx607vj-rl009', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:11:00', 'updated_at' => '2025-10-07 11:11:00'],
            ['id' => 74, 'nombre' => 'PC AMC INTEL CORE I7-12700 2.10 / 4.90 GHz, 16GB DDR4, 1 TB M.2 SSD, MONITOR 27"', 'slug' => 'pc-amc-intel-core-i7-12700-16gb-1tb-ssd-monitor-27', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:12:00', 'updated_at' => '2025-10-07 11:12:00'],
            ['id' => 75, 'nombre' => 'Laptop Gaming VICTUS 15-fa2014la, Intel Core i5, 16 GB DDR4 3200MHz, 512 GB SSD, 15.6 FHD, Windows 11 Home', 'slug' => 'laptop-gaming-victus-15-fa2014la-i5', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:13:00', 'updated_at' => '2025-10-07 11:13:00'],
            ['id' => 76, 'nombre' => 'Notebook ASUS X1605VA-MB195 16.0" WUXGA LED IPS, Core i9-13900H hasta 5.4GHz, 16GB DDR4', 'slug' => 'notebook-asus-x1605va-mb195-i9-13900h', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:14:00', 'updated_at' => '2025-10-07 11:14:00'],
            ['id' => 77, 'nombre' => 'Computadora Lenovo ThinkCentre M80s Gen 3, Core i7-12700 2.1/4.8GHz, 16GB DDR5-4400MHz 1TB SSD, MONITOR 23.8".', 'slug' => 'computadora-lenovo-thinkcentre-m80s-gen-3-i7-12700-monitor-23-8', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:15:00', 'updated_at' => '2025-10-07 11:15:00'],
            ['id' => 78, 'nombre' => 'PC Intel Core i7-12700 2.10/4.90GHz, 32GB DDR5, 1TB SSD M.2, MONITOR 24".', 'slug' => 'pc-intel-core-i7-12700-32gb-ddr5-monitor-24', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:16:00', 'updated_at' => '2025-10-07 11:16:00'],
            ['id' => 79, 'nombre' => 'PC AMC INTEL CORE I7-12700F 2.10/ 4.90 GHz, 32GB DDR5, 1TB M.2 SSD, RTX 3050 6GB, MONITOR 23.8".', 'slug' => 'pc-amc-intel-core-i7-12700f-rtx-3050', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:17:00', 'updated_at' => '2025-10-07 11:17:00'],
            ['id' => 80, 'nombre' => 'PC INTEL CORE I5-12400 4.40 GHZ, 32GB DDR4, 1TB SSD, MONITOR 27"', 'slug' => 'pc-intel-core-i5-12400-32gb-1tb-ssd-monitor-27', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:18:00', 'updated_at' => '2025-10-07 11:18:00'],
            ['id' => 81, 'nombre' => 'Laptop Gaming VICTUS 15-fa2012la, Intel Core i7, 16 GB, 1 TB SSD, 15.6, FHD Windows 11 Home', 'slug' => 'laptop-gaming-victus-15-fa2012la-i7', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:19:00', 'updated_at' => '2025-10-07 11:19:00'],
            ['id' => 82, 'nombre' => 'PC AMD RYZEN 7 8700G 4.2/5.1GHZ, 32GB DDR5, 1TB SSD M.2, RTX3050 LP 6GB, MONITOR 27".', 'slug' => 'pc-amd-ryzen-7-8700g-rtx3050-lp', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:20:00', 'updated_at' => '2025-10-07 11:20:00'],
            ['id' => 83, 'nombre' => 'PC INTEL CORE I7-12700 4.90 GHZ, 16GB DDR4, 1 TB SSD, WIFI, MONITOR 23.8".', 'slug' => 'pc-intel-core-i7-12700-16gb-1tb-ssd-wifi', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:21:00', 'updated_at' => '2025-10-07 11:21:00'],
            ['id' => 84, 'nombre' => 'PC AMD RYZEN 7 9700X 9700X 3.80 / 5.50 GHz16GB DDR5, 1TB SSD M.2, MONITOR 27".', 'slug' => 'pc-amd-ryzen-7-9700x-16gb-1tb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:22:00', 'updated_at' => '2025-10-07 11:22:00'],
            ['id' => 85, 'nombre' => 'PC AMD RYZEN 7 7700X 4.5/5.4GHZ, 16GB DDR5, 1TB SSD M.2, GTX1660 6GB, MONITOR 27".', 'slug' => 'pc-amd-ryzen-7-7700x-gtx1660', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:23:00', 'updated_at' => '2025-10-07 11:23:00'],
            ['id' => 86, 'nombre' => 'NOTEBOOK ASUS ZENBOOK 14 UM3406KA-QD092W R7-350,16G DDR5,1TB SSD,COPILOT,W11H,1Y', 'slug' => 'notebook-asus-zenbook-14-um3406ka-qd092w', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:24:00', 'updated_at' => '2025-10-07 11:24:00'],
            ['id' => 87, 'nombre' => 'PC AMC INTEL CORE I7-12700 2.10/ 4.90 GHz, 32GB DDR5, 1TB M.2 SSD, RTX 3060 12GB, MONITOR 27".', 'slug' => 'pc-amc-intel-core-i7-12700-rtx-3060-monitor-27', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:25:00', 'updated_at' => '2025-10-07 11:25:00'],
            ['id' => 88, 'nombre' => 'PC AMD RYZEN 7 8700G 4.2/5.1GHZ, 32GB DDR5, 1TB SSD M.2, RTX 3060 V2 12GB, MONITOR 27".', 'slug' => 'pc-amd-ryzen-7-8700g-rtx-3060-v2', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:26:00', 'updated_at' => '2025-10-07 11:26:00'],
            ['id' => 89, 'nombre' => 'Notebook ASUS FX507VU-LP180, 15.6" FHD Value IPS, Core i7-13620H hasta 4.90GHz, 16GB DDR5, RTX4050', 'slug' => 'notebook-asus-fx507vu-lp180-rtx4050', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:27:00', 'updated_at' => '2025-10-07 11:27:00'],
            ['id' => 90, 'nombre' => 'Computadora Lenovo ThinkCentre M80s Gen 3, Core i7-12700 2.1/4.8GHz, 16GB DDR5-4400MHz 512GB SSD.', 'slug' => 'computadora-lenovo-thinkcentre-m80s-gen-3-i7-12700-512gb-ssd', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:28:00', 'updated_at' => '2025-10-07 11:28:00'],
            ['id' => 91, 'nombre' => 'PC AMC INTEL CORE i7-13700 2.10/5.20GHz, 32GB DDR5, 1TB M.2 SSD, RTX 3060 12GB, MONITOR 27".', 'slug' => 'pc-amc-intel-core-i7-13700-rtx-3060', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:29:00', 'updated_at' => '2025-10-07 11:29:00'],
            ['id' => 92, 'nombre' => 'Notebook Lenovo ThinkPad T16 Gen 2, 16" WUXGA IPS Core i5-1335U 1.3/4.6GHz, 16GB DDR4-3200', 'slug' => 'notebook-lenovo-thinkpad-t16-gen-2-i5-1335u', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:30:00', 'updated_at' => '2025-10-07 11:30:00'],
            ['id' => 93, 'nombre' => 'PC AMC INTEL CORE I7-13700F 2.10/ 5.20 GHz, 32GB DDR5, 1TB M.2 SSD, RTX 3060 12GB, MONITOR 32".', 'slug' => 'pc-amc-intel-core-i7-13700f-rtx-3060-monitor-32', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:31:00', 'updated_at' => '2025-10-07 11:31:00'],
            ['id' => 94, 'nombre' => 'Laptop Gigabyte AORUS 15.6" FHD IPS, Core i7-12700H 2.30 / 4.70GHz, 16GB DDR4-3200MHz, 1TB SSD.', 'slug' => 'laptop-gigabyte-aorus-15-6-i7-12700h', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:32:00', 'updated_at' => '2025-10-07 11:32:00'],
            ['id' => 95, 'nombre' => 'PC INTEL CORE I7-13700F, 2.10GHZ/5.20GHz, 32GB DDR5, 1TB SSD M.2, 2TB SSD M.2, MONITOR 32"', 'slug' => 'pc-intel-core-i7-13700f-32gb-1tb-2tb-ssd-monitor-32', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:33:00', 'updated_at' => '2025-10-07 11:33:00'],
            ['id' => 96, 'nombre' => 'PC INTEL CORE I9-14900K,3.20/6.00GHz, 36 MB, 64GB DDR5, 1TB SSD M.2, MONITOR 32"', 'slug' => 'pc-intel-core-i9-14900k-64gb-1tb-ssd-monitor-32', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:34:00', 'updated_at' => '2025-10-07 11:34:00'],
            ['id' => 97, 'nombre' => 'Laptop Lenovo Legion Pro 5 16IRX9, 16" FHD IPS, Core i7-14700HX 5.5GHz, 16GB DDR5-5600', 'slug' => 'laptop-lenovo-legion-pro-5-16irx9', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:35:00', 'updated_at' => '2025-10-07 11:35:00'],
            ['id' => 98, 'nombre' => 'PC AMC INTEL CORE ULTRA 7 265K 3.90/5.50GHz, 16GB DDR5, 3TB SSD, MONITOR 23.6" MSI.', 'slug' => 'pc-amc-intel-core-ultra-7-265k', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:36:00', 'updated_at' => '2025-10-07 11:36:00'],
            ['id' => 99, 'nombre' => 'PC INTEL CORE I9-12900KS 3.40 GHZ, Z790 64GB DDR4, 2TB SSD M.2, MONITOR 31.5".', 'slug' => 'pc-intel-core-i9-12900ks-z790-64gb-ddr4', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:37:00', 'updated_at' => '2025-10-07 11:37:00'],
            ['id' => 100, 'nombre' => 'PC INTEL CORE i7-12700 2.10GHz, Z790 32GB DDR4, 1TB SSD M.2, MONITOR 27".', 'slug' => 'pc-intel-core-i7-12700-z790-32gb-ddr4', 'seccion_id' => rand(1, 11), 'created_at' => '2025-10-07 11:38:00', 'updated_at' => '2025-10-07 11:38:00'],
        ]);


        $this->call([
            ValoresAtributosComputadorasSeeder::class
        ]);



        /*
        DB::table('producto_categoria')->insert([
            ['id' => 1, 'producto_id' => 1, 'categoria_id' => 8, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'producto_id' => 2, 'categoria_id' => 4, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'producto_id' => 3, 'categoria_id' => 9, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'producto_id' => 4, 'categoria_id' => 13, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'producto_id' => 5, 'categoria_id' => 14, 'created_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('producto_valor_atributo')->insert([
            ['id' => 1, 'producto_id' => 1, 'valor_atributo_id' => 6, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'producto_id' => 1, 'valor_atributo_id' => 10, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'producto_id' => 1, 'valor_atributo_id' => 17, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'producto_id' => 1, 'valor_atributo_id' => 25, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'producto_id' => 2, 'valor_atributo_id' => 5, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 6, 'producto_id' => 2, 'valor_atributo_id' => 11, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 7, 'producto_id' => 2, 'valor_atributo_id' => 18, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 8, 'producto_id' => 2, 'valor_atributo_id' => 24, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 9, 'producto_id' => 4, 'valor_atributo_id' => 27, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 10, 'producto_id' => 4, 'valor_atributo_id' => 29, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 11, 'producto_id' => 5, 'valor_atributo_id' => 26, 'created_at' => '2025-09-30 18:59:00'],
            ['id' => 12, 'producto_id' => 5, 'valor_atributo_id' => 30, 'created_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('product_variants')->insert([
            ['id' => 1, 'product_id' => 1, 'nombre' => 'ThinkPad X1 16GB', 'precio_adicional' => 200.00, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'product_id' => 4, 'nombre' => 'HP Laser Pro', 'precio_adicional' => 50.00, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('inventarios')->insert([
            ['id' => 1, 'producto_id' => 1, 'stock' => 48, 'stock_minimo' => 5, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'producto_id' => 2, 'stock' => 30, 'stock_minimo' => 3, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'producto_id' => 3, 'stock' => 20, 'stock_minimo' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'producto_id' => 4, 'stock' => 39, 'stock_minimo' => 4, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'producto_id' => 5, 'stock' => 25, 'stock_minimo' => 3, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('users')->insert([
            ['id' => 1, 'nombre' => 'Juan Pérez', 'email' => 'juan.perez@example.com', 'password' => 'hashed_password_123', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'nombre' => 'María López', 'email' => 'maria.lopez@example.com', 'password' => 'hashed_password_456', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('user_addresses')->insert([
            ['id' => 1, 'user_id' => 1, 'direccion' => 'Calle Falsa 123', 'ciudad' => 'Ciudad de México', 'pais' => 'México', 'codigo_postal' => '01000', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'user_id' => 2, 'direccion' => 'Avenida Siempre Viva 456', 'ciudad' => 'Guadalajara', 'pais' => 'México', 'codigo_postal' => '44100', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('carts')->insert([
            ['id' => 1, 'user_id' => null, 'fecha_creacion' => '2025-09-30 18:59:00', 'estado' => 'activo', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'user_id' => 1, 'fecha_creacion' => '2025-09-30 18:59:00', 'estado' => 'convertido', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('cart_items')->insert([
            ['id' => 1, 'cart_id' => 1, 'product_id' => 1, 'variant_id' => 1, 'cantidad' => 2, 'precio_unitario' => 1400.00, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'cart_id' => 2, 'product_id' => 4, 'variant_id' => 2, 'cantidad' => 1, 'precio_unitario' => 350.00, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('coupons')->insert([
            ['id' => 1, 'codigo' => 'DESC10', 'descuento_tipo' => 'porcentaje', 'descuento_valor' => 10.00, 'fecha_inicio' => '2025-09-30 18:59:00', 'fecha_fin' => '2025-12-31 23:59:59', 'uso_maximo' => 100, 'uso_por_usuario' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'codigo' => 'FIX50', 'descuento_tipo' => 'fijo', 'descuento_valor' => 50.00, 'fecha_inicio' => '2025-09-30 18:59:00', 'fecha_fin' => '2025-10-31 23:59:59', 'uso_maximo' => 50, 'uso_por_usuario' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('orders')->insert([
            ['id' => 1, 'user_id' => 1, 'direccion_envio_id' => 1, 'estado' => 'pagado', 'total' => 2800.00, 'metodo_pago' => 'tarjeta', 'fecha_creacion' => '2025-09-30 18:59:00', 'fecha_actualizacion' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'user_id' => null, 'direccion_envio_id' => null, 'estado' => 'pendiente', 'total' => 350.00, 'metodo_pago' => 'paypal', 'fecha_creacion' => '2025-09-30 18:59:00', 'fecha_actualizacion' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('order_items')->insert([
            ['id' => 1, 'order_id' => 1, 'product_id' => 1, 'variant_id' => 1, 'cantidad' => 2, 'precio_unitario' => 1400.00, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'order_id' => 2, 'product_id' => 4, 'variant_id' => 2, 'cantidad' => 1, 'precio_unitario' => 350.00, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('payments')->insert([
            ['id' => 1, 'order_id' => 1, 'metodo' => 'tarjeta', 'estado' => 'aprobado', 'monto' => 2800.00, 'transaccion_externa_id' => 'TXN-123456', 'fecha' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'order_id' => 2, 'metodo' => 'paypal', 'estado' => 'pendiente', 'monto' => 350.00, 'transaccion_externa_id' => 'TXN-789012', 'fecha' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('invoices')->insert([
            ['id' => 1, 'order_id' => 1, 'numero_factura' => 'INV-0001', 'pdf_url' => 'https://example.com/invoices/inv-0001.pdf', 'fecha_emision' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('shipments')->insert([
            ['id' => 1, 'order_id' => 1, 'transportista' => 'DHL', 'numero_guia' => 'TRK-123456789', 'estado' => 'en_transito', 'fecha_envio' => '2025-09-30 18:59:00', 'fecha_entrega' => null, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('reviews')->insert([
            ['id' => 1, 'product_id' => 1, 'user_id' => 1, 'rating' => 5, 'comentario' => 'Excelente laptop, muy rápida.', 'fecha' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'product_id' => 4, 'user_id' => 2, 'rating' => 4, 'comentario' => 'Buena impresora, pero el toner es caro.', 'fecha' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('wishlists')->insert([
            ['id' => 1, 'user_id' => 1, 'product_id' => 3, 'fecha' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'user_id' => 2, 'product_id' => 5, 'fecha' => '2025-09-30 18:59:00', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);
        */


    }

}
