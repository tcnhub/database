<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;

    protected $table = 'atributos';

    protected $fillable = [
        'nombre',
        'slug',
        'seccion_id',
    ];

    /**
     * Relación belongsTo con Seccion
     */
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    /**
     * Relación hasMany con ValorAtributo
     */
    public function valoresAtributos()
    {
        return $this->hasMany(ValorAtributo::class, 'atributo_id');
    }
    public function valores()
    {
        return $this->hasMany(ValorAtributo::class, 'atributo_id');
    }

    /**
     * Relación hasManyThrough con Producto (a través de valores_atributos y producto_valor_atributo)
     */
    public function productos()
    {
        return $this->hasManyThrough(
            Producto::class,
            ValorAtributo::class,
            'atributo_id', // Foreign key on valores_atributos table
            'id', // Foreign key on productos table
            'id', // Local key on atributos table
            'id' // Local key on valores_atributos table
        )->join('producto_valor_atributo', 'valores_atributos.id', '=', 'producto_valor_atributo.valor_atributo_id')
            ->select('productos.*', 'producto_valor_atributo.producto_id');
    }
}
