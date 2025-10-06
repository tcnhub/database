<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = ['nombre', 'seccion_id', 'categoria_padre_id'];

    // Relación con la sección
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    // Relación padre
    public function parent()
    {
        return $this->belongsTo(Categoria::class, 'categoria_padre_id');
    }

    // Relación hijos
    public function children()
    {
        // with('children') dentro de children() hace que cargue recursivamente todos los niveles de categorías hijas (no solo hijos y nietos).
        return $this->hasMany(Categoria::class, 'categoria_padre_id')->with('children');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'seccion_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }



}
