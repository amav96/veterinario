<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;
    
    protected $table = "historias_clinicas";

    public function tipoHistoriaClinica(){
        return $this->belongsTo(TipoHistoriaClinica::class, 'tipo_historia_clinica_id');
    }
}
