<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    protected $fillable = [
        'product_id',
        'nombre',
        'precio_adicional',
    ];

    public $timestamps = true;

    // Relaciones
    public function producto() // Asumiendo que 'product_id' se refiere a Producto
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }
}
