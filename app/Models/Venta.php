<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function items()
    {
        return $this->hasMany(VentaItem::class, 'venta_id', 'id');
    }

    public function estado()
    {
        return $this->hasOne(EstadoVenta::class, 'id', 'estado_id');
    }

    public function comprobante()
    {
        return $this->hasOne(Comprobante::class, 'venta_id', 'id');
    }
}
