<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';
    protected $guarded = [];

    public function tipo()
    {
        return $this->hasOne(TipoAlmacen::class, 'id', 'almacen_tipo_id');
    }
}
