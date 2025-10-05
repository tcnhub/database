```markdown
# Database Demo E-commerce

[![Laravel](https://img.shields.io/badge/Laravel-12-green)](https://laravel.com) [![MySQL](https://img.shields.io/badge/MySQL-8.0-blue)](https://mysql.com) [![PHP](https://img.shields.io/badge/PHP-8.3-orange)](https://php.net)

## Descripción

Este repositorio es un **demo de base de datos para un sistema de e-commerce** construido con **Laravel 12** y **MySQL**. Se basa en un esquema relacional completo para una tienda en línea, incluyendo gestión de productos, categorías jerárquicas, inventarios, carritos, pedidos, pagos y más. El enfoque principal es en la modularidad por **secciones** (ej. Computadoras, Electrónica), con validaciones automáticas vía triggers y funciones SQL.

El proyecto incluye:
- Migraciones para recrear la DB desde cero.
- Modelos Eloquent con relaciones (uno-a-muchos, muchos-a-muchos, autoreferenciales para categorías).
- Seeders para poblar secciones, categorías y subcategorías (jerarquía de hasta 3 niveles).
- Soporte para variantes de productos, atributos flexibles y control de stock en tiempo real.

Ideal para prototipos de tiendas en línea, con énfasis en integridad de datos (ej. validación de secciones en categorías y atributos).

## Características Principales

- **Estructura Modular**: Secciones agrupan productos, categorías y atributos para evitar inconsistencias.
- **Jerarquía de Categorías**: Soporte para subcategorías autoreferenciales (`categoria_padre_id` y `nivel`).
- **Gestión de Inventario**: Triggers SQL para validar y actualizar stock al procesar pedidos.
- **Carrito y Pedidos**: Estados dinámicos (activo/abandonado), integración con pagos y envíos.
- **Usuarios y Personalización**: Wishlists, reseñas, direcciones y cupones con límites de uso.
- **Funciones SQL**: `validar_seccion_atributo` y `validar_seccion_categoria` para integridad.
- **Laravel Integrado**: Tablas estándar (sessions, jobs, migrations) listas para usar.

## Requisitos

- PHP >= 8.3
- Laravel 12.x
- MySQL 8.0+ (o compatible)
- Composer
- Node.js y NPM (opcional, para assets)

## Instalación

1. **Clona el Repositorio**:
   ```
git clone https://github.com/tcnhub/database.git
cd database
   ```

2. **Instala Dependencias**:
   ```
composer install
npm install  # Si usas Vite para assets
   ```

3. **Configura el Entorno**:
   Copia `.env.example` a `.env` y edita:
   ```
APP_NAME="E-commerce Demo"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=
   ```

4. **Genera la Clave de App**:
   ```
php artisan key:generate
   ```

5. **Ejecuta Migraciones**:
   ```
php artisan migrate
   ```
   Esto crea todas las tablas basadas en el esquema SQL proporcionado.

6. **Puebla Datos de Prueba**:
   ```
php artisan db:seed
   ```
   - Incluye `SeccionesCategoriasSeeder` para cargar secciones (ej. Computadoras, Impresoras) y categorías jerárquicas.
   - Puedes ejecutar seeders específicos: `php artisan db:seed --class=SeccionesCategoriasSeeder`.

7. **Inicia el Servidor**:
   ```
php artisan serve
   ```
   Visita `http://127.0.0.1:8000` para probar.

## Estructura de la Base de Datos

La DB tiene ~25 tablas principales. Aquí un resumen:

| Tabla | Descripción | Relaciones Clave |
|-------|-------------|------------------|
| `secciones` | Categorías de alto nivel (ej. "Computadoras"). | Uno-a-muchos: `categorias`, `productos`, `atributos`. |
| `categorias` | Subcategorías jerárquicas. | Autoreferencial (`categoria_padre_id`); Muchos-a-muchos con `productos`. |
| `productos` | Productos base. | Uno-a-muchos: `inventarios`, `product_variants`; Muchos-a-muchos: `categorias`, atributos. |
| `atributos` & `valores_atributos` | Atributos flexibles (ej. Color: Rojo). | Muchos-a-muchos con `productos`. |
| `inventarios` | Control de stock. | Uno-a-uno con `productos`; Triggers para validación/resta en pedidos. |
| `carts` & `cart_items` | Carrito de compras. | Relacionado con `users` y `productos`. |
| `orders` & `order_items` | Pedidos y items. | Flujo completo: pagos, envíos, facturas. |
| `users` | Usuarios. | Uno-a-muchos: direcciones, wishlists, reseñas. |

- **Triggers y Funciones**: Validan consistencia (ej. stock insuficiente, secciones mismatch).
- **Diagrama ER**: Usa tools como dbdiagram.io para visualizar (exporta del SQL dump).

Para el esquema completo, revisa `database/migrations/` o el archivo SQL original en la raíz.

## Uso

### Modelos y Relaciones
Ejemplo en Tinker (`php artisan tinker`):
```php
$seccion = App\Models\Seccion::with('categorias.children')->find(1);
$producto = App\Models\Producto::with(['categorias', 'inventario'])->first();
```

### Rutas de Ejemplo
En `routes/web.php` (agrega si no existe):
```php
Route::get('/secciones', function () {
    return App\Models\Seccion::with('categorias')->get();
});
```

### Seeders Personalizados
- `SeccionesCategoriasSeeder`: Carga la jerarquía de categorías (3 niveles) para secciones como "Computadoras" y "Partes".
- Extiende para productos: Crea un `ProductosSeeder` similar.

## Desarrollo y Contribuciones

- **Commits Recientes**: Revisa `git log` para cambios en seeders y migraciones.
- **Mejoras Pendientes**:
    - Agregar seeders para productos y atributos.
    - Integrar autenticación (Laravel Breeze/Jetstream).
    - API REST para frontend (Sanctum).
- Para contribuir: Forkea, crea una rama (`git checkout -b feature/nueva-funcion`), commit y PR.

¡Bienvenido a contribuir! Abre issues para bugs o features.

## Licencia

Este proyecto está bajo la licencia MIT. Ver `LICENSE` para detalles.

---

**Autor**: [tcnhub](https://github.com/tcnhub)  
**Fecha**: Octubre 2025  
**Versión**: 1.0.0
```
