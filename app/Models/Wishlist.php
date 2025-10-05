<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'user_id',
        'product_id',
        'fecha',
    ];

    public $timestamps = true;

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function producto() // Asumiendo que 'product_id' se refiere a Producto
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }
}
