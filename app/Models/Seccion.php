<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    //
    use HasFactory;



    protected $table = 'secciones';

    protected $fillable = [
        'nombre',
        'slug',
    ];

    public $timestamps = true; // Usa created_at y updated_at

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'seccion_id');
    }
    public function productos()
    {
        // la seccion tienen muchos productos
        return $this->hasMany(Producto::class, 'seccion_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function atributos()
    {
        return $this->hasMany(Atributo::class);
    }


}
