<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaItem extends Model
{
    use HasFactory;

    protected $table = 'ventas_items';
    protected $guarded = [];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id', 'venta_id');
    }
}
