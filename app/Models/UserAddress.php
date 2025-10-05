<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

    protected $fillable = [
        'user_id',
        'direccion',
        'ciudad',
        'pais',
        'codigo_postal',
    ];

    public $timestamps = true;

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
