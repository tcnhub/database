<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventarios';

    protected $fillable = [
        'producto_id',
        'stock',
        'stock_minimo',
    ];

    public $timestamps = true; // Usa created_at y updated_at

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
