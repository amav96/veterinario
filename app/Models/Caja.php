<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $guarded = ['monto'];

    public function tipo()
    {
        return $this->hasOne(TipoMovimiento::class, 'id', 'tipo_movimiento_id');
    }

    public function medio_pago()
    {
        return $this->hasOne(FormaPago::class, 'id', 'medio_pago_id');
    }
}
