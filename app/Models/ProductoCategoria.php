<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    use HasFactory;

    protected $table = 'producto_categoria';

    protected $fillable = [
        'producto_id',
        'categoria_id',
    ];

    public $timestamps = false; // No tiene updated_at, solo created_at

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
