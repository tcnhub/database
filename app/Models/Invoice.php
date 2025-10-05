<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'order_id',
        'numero_factura',
        'pdf_url',
        'fecha_emision',
    ];

    public $timestamps = true;

    // Relaciones
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
