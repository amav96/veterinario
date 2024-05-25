<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHistoriaClinica extends Model
{
    use HasFactory;

    protected $table = 'tipos_historias_clinicas';

    const ADJUNTO = 8;

}
