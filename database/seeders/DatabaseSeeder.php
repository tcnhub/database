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
        ]);

        /*
        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'Laptop Lenovo ThinkPad X1', 'slug' => 'laptop-lenovo-thinkpad-x1', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'nombre' => 'Computadora HP Pavilion', 'slug' => 'computadora-hp-pavilion', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'nombre' => 'Laptop Gamer ASUS ROG', 'slug' => 'laptop-gamer-asus-rog', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'nombre' => 'Impresora Laser HP', 'slug' => 'impresora-laser-hp', 'seccion_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'nombre' => 'Impresora Multifuncional Canon', 'slug' => 'impresora-multifuncional-canon', 'seccion_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

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
