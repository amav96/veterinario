<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    public function especie()
    {
        return $this->belongsTo(Especie::class, 'idEspecie', 'id');
    }

    public function raza()
    {
        return $this->belongsTo(Raza::class, 'idRaza', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente', 'id');
    }

}
