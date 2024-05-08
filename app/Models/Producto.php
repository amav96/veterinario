<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function linea(): BelongsTo
    {
        return $this->belongsTo(Linea::class, 'idNivel', 'id');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'id');
    }

    public function subCategoria(): BelongsTo
    {
        return $this->belongsTo(SubCategoria::class, 'idSubCategoria', 'id');
    }

    public function unidadMedida(): BelongsTo
    {
        return $this->belongsTo(UnidadMedida::class, 'idUnidadMedida', 'id');
    }

    public function presentacion(): BelongsTo
    {
        return $this->belongsTo(Presentacion::class, 'idPresentacion', 'id');
    }

    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'idProveedor', 'id');
    }
}
