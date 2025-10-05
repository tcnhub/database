<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'order_id',
        'metodo',
        'estado',
        'monto',
        'transaccion_externa_id',
        'fecha',
    ];

    protected $casts = [
        'metodo' => 'string', // enum('tarjeta','paypal','transferencia')
        'estado' => 'string', // enum('pendiente','aprobado','rechazado')
    ];

    public $timestamps = true;

    // Relaciones
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
