<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    BelongsToMany,
    HasOne,
    HasMany
};

class Producto extends Model
{

    // Nombre de la tabla
    protected $table = 'productos';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'slug',
        'seccion_id',
    ];

    /**
     * Producto pertenece a una Seccion.
     *
     * @return BelongsTo
     */
    public function seccion(): BelongsTo
    {
        // el producto pertence a una seccion
        return $this->belongsTo(Seccion::class, 'seccion_id', 'id');
    }

    /**
     * Categorías (muchos a muchos) a través de la tabla producto_categoria.
     *
     * @return BelongsToMany
     */
    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(
            Categoria::class,
            'producto_categoria',
            'producto_id',
            'categoria_id'
        );
    }

    /**
     * Valores de atributos asignados al producto (muchos a muchos).
     * Tabla pivot: producto_valor_atributo
     *
     * @return BelongsToMany
     */
    public function valoresAtributos(): BelongsToMany
    {
        return $this->belongsToMany(
            ValorAtributo::class,
            'producto_valor_atributo',
            'producto_id',
            'valor_atributo_id'
        );
    }

    /**
     * Variantes del producto (hasMany).
     *
     * @return HasMany
     */
    public function variantes(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    /**
     * Inventario (hasOne).
     *
     * @return HasOne
     */
    public function inventario(): HasOne
    {
        return $this->hasOne(Inventario::class, 'producto_id', 'id');
    }

    /**
     * Reseñas del producto (hasMany).
     *
     * @return HasMany
     */
    public function reseñas(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    /**
     * Items de carrito que referencian el producto (hasMany).
     *
     * @return HasMany
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'product_id', 'id');
    }

    /**
     * Items de orden que referencian el producto (hasMany).
     *
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    /**
     * Wishlists que contienen este producto (hasMany).
     *
     * @return HasMany
     */
    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }





}
