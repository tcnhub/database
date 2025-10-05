<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        'codigo',
        'descuento_tipo',
        'descuento_valor',
        'fecha_inicio',
        'fecha_fin',
        'uso_maximo',
        'uso_por_usuario',
    ];

    protected $casts = [
        'descuento_tipo' => 'string', // enum('porcentaje','fijo')
    ];

    public $timestamps = true;
}
