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
