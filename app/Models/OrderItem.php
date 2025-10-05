<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'variant_id',
        'cantidad',
        'precio_unitario',
    ];

    public $timestamps = true;

    // Relaciones
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function producto() // Asumiendo que 'product_id' se refiere a Producto
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
