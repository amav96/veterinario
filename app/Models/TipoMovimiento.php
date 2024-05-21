<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;

    protected $table = 'tipos_movimientos';

    public const VENTA = 1;
    public const COMPRA = 2;
    public const ANULACION = 3;
    public const DIRECTO = 4;
}
