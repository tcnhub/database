<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoValorAtributo extends Model
{
    use HasFactory;

    protected $table = 'producto_valor_atributo';

    protected $fillable = [
        'producto_id',
        'valor_atributo_id',
    ];

    public $timestamps = false; // No tiene updated_at, solo created_at

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function valorAtributo()
    {
        return $this->belongsTo(ValorAtributo::class, 'valor_atributo_id'); // Asumiendo modelo ValorAtributo
    }
}
