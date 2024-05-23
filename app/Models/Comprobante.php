<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id', 'id');
    }

    public function pagos()
    {
        return $this->hasMany(ComprobantePago::class, 'comprobante_id', 'id');
    }
}
