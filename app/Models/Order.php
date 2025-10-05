<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'direccion_envio_id',
        'estado',
        'total',
        'metodo_pago',
        'fecha_creacion',
        'fecha_actualizacion',
    ];

    protected $casts = [
        'estado' => 'string', // enum('pendiente','pagado','enviado','cancelado','completado')
    ];

    public $timestamps = true;

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function direccionEnvio()
    {
        return $this->belongsTo(UserAddress::class, 'direccion_envio_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }
}
