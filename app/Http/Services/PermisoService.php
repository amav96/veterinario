<?php

namespace App\Http\Services;

use App\Models\PermisoRol;

class PermisoService {

    static function permisosRol($rolId){

        $permisosUsuario = PermisoRol::with(['permiso'])->where('rol_id', $rolId)->get();
        $permisosUsuario = $permisosUsuario->pluck('permiso.nombre')->toArray();

        return $permisosUsuario;
    }

    static function autorizado(string $permiso, array $permisos){
        return in_array($permiso, $permisos);
    }
}