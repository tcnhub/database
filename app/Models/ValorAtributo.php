<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValorAtributo extends Model
{
    //
    use HasFactory;

    protected $table = 'valores_atributos';

    protected $fillable = [
        'valor',
        'atributo_id',
    ];

    /**
     * Relación belongsTo con Atributo
     */
    public function atributo()
    {
        return $this->belongsTo(Atributo::class, 'atributo_id');
    }

    /**
     * Relación belongsToMany con Producto (a través de producto_valor_atributo)
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_valor_atributo', 'valor_atributo_id', 'producto_id')
            ->withTimestamps();
    }
}
