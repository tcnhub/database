<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comentario',
        'fecha',
    ];

    public $timestamps = true;

    // Relaciones
    public function producto() // Asumiendo que 'product_id' se refiere a Producto
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
