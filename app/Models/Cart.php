<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'fecha_creacion',
        'estado',
    ];

    protected $casts = [
        'estado' => 'string', // enum('activo','abandonado','convertido')
    ];

    public $timestamps = true;

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
