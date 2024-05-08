<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subCategorias';
   
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'IdCategoria', 'id');
    }
}
