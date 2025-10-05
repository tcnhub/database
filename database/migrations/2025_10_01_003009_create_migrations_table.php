<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

// sacado de .aqui https://grok.com/c/82085bef-aca4-4182-81e7-f3a1e04616a5

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear todas las tablas
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('slug', 255)->unique();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('atributos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('slug', 255)->unique();
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('valores_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('valor', 255);
            $table->foreignId('atributo_id')->constrained('atributos')->onDelete('cascade');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('slug', 255)->unique();
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            $table->foreignId('categoria_padre_id')->nullable()->constrained('categorias')->onDelete('cascade');
            $table->unsignedTinyInteger('nivel')->default(1);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('slug', 255)->unique();
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('producto_categoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->unique(['producto_id', 'categoria_id'], 'unique_producto_categoria');
        });

        Schema::create('producto_valor_atributo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('valor_atributo_id')->constrained('valores_atributos')->onDelete('cascade');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->unique(['producto_id', 'valor_atributo_id'], 'unique_producto_valor_atributo');
        });

        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('productos')->onDelete('cascade');
            $table->string('nombre', 255);
            $table->decimal('precio_adicional', 10, 2)->default(0.00);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade')->unique();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('stock_minimo')->default(0);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('direccion', 255);
            $table->string('ciudad', 100);
            $table->string('pais', 100);
            $table->string('codigo_postal', 20)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->enum('estado', ['activo', 'abandonado', 'convertido'])->default('activo');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('variant_id')->nullable()->constrained('product_variants')->onDelete('set null');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unique(['cart_id', 'product_id', 'variant_id'], 'unique_cart_item');
        });

        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->unique();
            $table->enum('descuento_tipo', ['porcentaje', 'fijo']);
            $table->decimal('descuento_valor', 10, 2);
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin')->nullable();
            $table->unsignedInteger('uso_maximo')->nullable();
            $table->unsignedInteger('uso_por_usuario')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('direccion_envio_id')->nullable()->constrained('user_addresses')->onDelete('set null');
            $table->enum('estado', ['pendiente', 'pagado', 'enviado', 'cancelado', 'completado'])->default('pendiente');
            $table->decimal('total', 10, 2);
            $table->string('metodo_pago', 50);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('variant_id')->nullable()->constrained('product_variants')->onDelete('set null');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unique(['order_id', 'product_id', 'variant_id'], 'unique_order_item');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->enum('metodo', ['tarjeta', 'paypal', 'transferencia']);
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->decimal('monto', 10, 2);
            $table->string('transaccion_externa_id', 100)->nullable();
            $table->timestamp('fecha')->useCurrent();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('numero_factura', 50)->unique();
            $table->string('pdf_url', 255)->nullable();
            $table->timestamp('fecha_emision')->useCurrent();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('transportista', 50);
            $table->string('numero_guia', 100);
            $table->enum('estado', ['preparando', 'en_transito', 'entregado', 'devuelto'])->default('preparando');
            $table->timestamp('fecha_envio')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedInteger('rating');
            $table->text('comentario')->nullable();
            $table->timestamp('fecha')->useCurrent();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('productos')->onDelete('cascade');
            $table->timestamp('fecha')->useCurrent();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unique(['user_id', 'product_id'], 'unique_wishlist');
        });

        // Crear funciones
        DB::unprepared("
            CREATE FUNCTION `validar_seccion_atributo` (`p_producto_id` BIGINT UNSIGNED, `p_valor_atributo_id` BIGINT UNSIGNED) RETURNS TINYINT(1) DETERMINISTIC READS SQL DATA
            BEGIN
                DECLARE seccion_producto BIGINT UNSIGNED;
                DECLARE seccion_atributo BIGINT UNSIGNED;

                SELECT seccion_id INTO seccion_producto
                FROM productos WHERE id = p_producto_id;

                SELECT a.seccion_id INTO seccion_atributo
                FROM valores_atributos va
                JOIN atributos a ON va.atributo_id = a.id
                WHERE va.id = p_valor_atributo_id;

                RETURN (seccion_producto = seccion_atributo);
            END
        ");

        DB::unprepared("
            CREATE FUNCTION `validar_seccion_categoria` (`p_producto_id` BIGINT UNSIGNED, `p_categoria_id` BIGINT UNSIGNED) RETURNS TINYINT(1) DETERMINISTIC READS SQL DATA
            BEGIN
                DECLARE seccion_producto BIGINT UNSIGNED;
                DECLARE seccion_categoria BIGINT UNSIGNED;

                SELECT seccion_id INTO seccion_producto
                FROM productos WHERE id = p_producto_id;

                SELECT seccion_id INTO seccion_categoria
                FROM categorias WHERE id = p_categoria_id;

                RETURN (seccion_producto = seccion_categoria);
            END
        ");

        // Crear triggers before (validaciones)
        DB::unprepared("
            CREATE TRIGGER `before_insert_producto_categoria` BEFORE INSERT ON `producto_categoria` FOR EACH ROW
            BEGIN
                IF NOT validar_seccion_categoria(NEW.producto_id, NEW.categoria_id) THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'El producto no puede estar asignado a categorías de otra sección';
                END IF;
            END
        ");

        DB::unprepared("
            CREATE TRIGGER `before_insert_producto_valor_atributo` BEFORE INSERT ON `producto_valor_atributo` FOR EACH ROW
            BEGIN
                IF NOT validar_seccion_atributo(NEW.producto_id, NEW.valor_atributo_id) THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'El producto no puede tener atributos de otra sección';
                END IF;
            END
        ");

        DB::unprepared("
            CREATE TRIGGER `before_insert_order_items` BEFORE INSERT ON `order_items` FOR EACH ROW
            BEGIN
                DECLARE disponible INT;
                SELECT stock INTO disponible FROM inventarios WHERE producto_id = NEW.product_id;
                IF disponible < NEW.cantidad THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Stock insuficiente para el producto';
                END IF;
            END
        ");

        // Insertar datos
        DB::table('secciones')->insert([
            ['id' => 1, 'nombre' => 'Computadoras', 'slug' => 'computadoras', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'nombre' => 'Impresoras', 'slug' => 'impresoras', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'nombre' => 'Monitores', 'slug' => 'monitores', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'nombre' => 'Partes', 'slug' => 'partes', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'nombre' => 'Electrónica', 'slug' => 'electronica', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 6, 'nombre' => 'Software', 'slug' => 'software', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 7, 'nombre' => 'Gamer', 'slug' => 'gamer', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 8, 'nombre' => 'Audio', 'slug' => 'audio', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 9, 'nombre' => 'Red', 'slug' => 'red', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 10, 'nombre' => 'Puntos de Venta', 'slug' => 'puntos-de-venta', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 11, 'nombre' => 'Accesorios', 'slug' => 'accesorios', 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('atributos')->insert([
            ['id' => 1, 'nombre' => 'Marca', 'slug' => 'marca', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'nombre' => 'Core', 'slug' => 'core', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'nombre' => 'CPU', 'slug' => 'cpu', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'nombre' => 'Memoria RAM', 'slug' => 'memoria-ram', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'nombre' => 'Unidad Solida SSD', 'slug' => 'unidad-solida-ssd', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 6, 'nombre' => 'Pantalla', 'slug' => 'pantalla', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 7, 'nombre' => 'Resolución', 'slug' => 'resolucion', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 8, 'nombre' => 'Tarjeta de Video', 'slug' => 'tarjeta-video', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 9, 'nombre' => 'Sistema Operativo', 'slug' => 'sistema-operativo', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 10, 'nombre' => 'Almacenamiento', 'slug' => 'almacenamiento', 'seccion_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 11, 'nombre' => 'Marca', 'slug' => 'marca-impresoras', 'seccion_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 12, 'nombre' => 'Tipo de tinta', 'slug' => 'tipo-tinta', 'seccion_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('valores_atributos')->insert([
            ['id' => 1, 'valor' => 'ADVANCE', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'valor' => 'AMC', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'valor' => 'ASUS', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'valor' => 'DELL', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'valor' => 'HP', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 6, 'valor' => 'LENOVO', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 7, 'valor' => 'MSI', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 8, 'valor' => 'SAMSUNG', 'atributo_id' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 9, 'valor' => 'Core i3', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 10, 'valor' => 'Core i5', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 11, 'valor' => 'Core i7', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 12, 'valor' => 'Core i9', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 13, 'valor' => 'RYZEN 3', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 14, 'valor' => 'RYZEN 5', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 15, 'valor' => 'RYZEN 7', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 16, 'valor' => 'RYZEN 9', 'atributo_id' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 17, 'valor' => '4 GB', 'atributo_id' => 4, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 18, 'valor' => '8 GB', 'atributo_id' => 4, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 19, 'valor' => '16 GB', 'atributo_id' => 4, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 20, 'valor' => '32 GB', 'atributo_id' => 4, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 21, 'valor' => '64 GB', 'atributo_id' => 4, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 22, 'valor' => 'Windows 10', 'atributo_id' => 9, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 23, 'valor' => 'Windows 11', 'atributo_id' => 9, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 24, 'valor' => 'Linux', 'atributo_id' => 9, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 25, 'valor' => 'Android', 'atributo_id' => 9, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 26, 'valor' => 'BROTHER', 'atributo_id' => 11, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 27, 'valor' => 'CANON', 'atributo_id' => 11, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 28, 'valor' => 'EPSON', 'atributo_id' => 11, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 29, 'valor' => 'HP', 'atributo_id' => 11, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 30, 'valor' => 'Toner', 'atributo_id' => 12, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 31, 'valor' => 'Tinta liquida', 'atributo_id' => 12, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

        DB::table('categorias')->insert([
            ['id' => 1, 'nombre' => 'Computadoras de escritorio', 'slug' => 'computadoras-escritorio', 'seccion_id' => 1, 'categoria_padre_id' => null, 'nivel' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 2, 'nombre' => 'Computadoras Portátiles', 'slug' => 'computadoras-portatiles', 'seccion_id' => 1, 'categoria_padre_id' => null, 'nivel' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 3, 'nombre' => 'Otros Ordenadores', 'slug' => 'otros-ordenadores', 'seccion_id' => 1, 'categoria_padre_id' => null, 'nivel' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 4, 'nombre' => 'Computadora Profesional', 'slug' => 'computadora-profesional', 'seccion_id' => 1, 'categoria_padre_id' => 1, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 5, 'nombre' => 'Computadora Gamer', 'slug' => 'computadora-gamer', 'seccion_id' => 1, 'categoria_padre_id' => 1, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 6, 'nombre' => 'Computadora Todo en Uno', 'slug' => 'computadora-todo-en-uno', 'seccion_id' => 1, 'categoria_padre_id' => 1, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 7, 'nombre' => 'Computadora Workstation', 'slug' => 'computadora-workstation', 'seccion_id' => 1, 'categoria_padre_id' => 1, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 8, 'nombre' => 'Laptop', 'slug' => 'laptop', 'seccion_id' => 1, 'categoria_padre_id' => 2, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 9, 'nombre' => 'Laptop Gamer', 'slug' => 'laptop-gamer', 'seccion_id' => 1, 'categoria_padre_id' => 2, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 10, 'nombre' => 'Laptop Dos en Uno', 'slug' => 'laptop-dos-en-uno', 'seccion_id' => 1, 'categoria_padre_id' => 2, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 11, 'nombre' => 'Laptop Workstation', 'slug' => 'laptop-workstation', 'seccion_id' => 1, 'categoria_padre_id' => 2, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 12, 'nombre' => 'Multifunción', 'slug' => 'multifuncion', 'seccion_id' => 2, 'categoria_padre_id' => null, 'nivel' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 13, 'nombre' => 'Impresora', 'slug' => 'impresora', 'seccion_id' => 2, 'categoria_padre_id' => null, 'nivel' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 14, 'nombre' => 'Impresora Varios', 'slug' => 'impresora-varios', 'seccion_id' => 2, 'categoria_padre_id' => null, 'nivel' => 1, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 15, 'nombre' => 'Impresora Multifuncional Tinta', 'slug' => 'impresora-multifuncional-tinta', 'seccion_id' => 2, 'categoria_padre_id' => 12, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
            ['id' => 16, 'nombre' => 'Impresora Multifuncional Laser', 'slug' => 'impresora-multifuncional-laser', 'seccion_id' => 2, 'categoria_padre_id' => 12, 'nivel' => 2, 'created_at' => '2025-09-30 18:59:00', 'updated_at' => '2025-09-30 18:59:00'],
        ]);

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

        // Crear el trigger after después de los inserts para evitar sustracción doble
        DB::unprepared("
            CREATE TRIGGER `after_insert_order_items` AFTER INSERT ON `order_items` FOR EACH ROW
            BEGIN
                UPDATE inventarios
                SET stock = stock - NEW.cantidad
                WHERE producto_id = NEW.product_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('shipments');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('user_addresses');
        Schema::dropIfExists('users');
        Schema::dropIfExists('inventarios');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('producto_valor_atributo');
        Schema::dropIfExists('producto_categoria');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('valores_atributos');
        Schema::dropIfExists('atributos');
        Schema::dropIfExists('secciones');
    }
};
