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
    public const CLIENTE_EDICION =  5;
    public const CLIENTE_CREACION =  6;
    public const SERVICIO_EDICION =  7;
    public const SERVICIO_CREACION =  8;
    public const PRODUCTO_EDICION =  9;
    public const PRODUCTO_CREACION =  10;
    public const MASCOTA_EDICION =  11;
    public const MASCOTA_CREACION =  12;

    const VENTAS = "ventas";
    const CLIENTE = "cliente";
    const SERVICIO = "servicio";
    const PRODUCTO = "producto";
    const MASCOTA = "mascota";
}
