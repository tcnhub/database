<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $fillable = [
        'order_id',
        'transportista',
        'numero_guia',
        'estado',
        'fecha_envio',
        'fecha_entrega',
    ];

    protected $casts = [
        'estado' => 'string', // enum('preparando','en_transito','entregado','devuelto')
    ];

    public $timestamps = true;

    // Relaciones
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
