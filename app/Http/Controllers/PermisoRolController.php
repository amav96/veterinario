<?php

namespace App\Http\Controllers;

use App\Models\PermisoRol;
use Illuminate\Http\Request;

class PermisoRolController extends Controller
{

    public function findAll(Request $request){
        $permisosRoles = PermisoRol::with(['permiso'])->get();
        $permisosRolesAplanados = $permisosRoles->map(function($permisoRol){
            return [
                "id" => $permisoRol->id,
                "permiso_id" => $permisoRol->permiso_id,
                "rol_id" => $permisoRol->rol_id,
                "permiso" => $permisoRol->permiso->nombre
            ];
        });
        return response()->json($permisosRolesAplanados);
    }

    public function save(Request $request){

        $this->valitedate($request, [
            "permiso_id" => "required|exists:permisos,id",
            "rol_id" => "required|exists:roles,id"
        ]);
        
        $permisoRol = PermisoRol::updateOrCreate([
            "permiso_id" => $request->permiso_id,
            "rol_id" => $request->rol_id
        ]);

        return response()->json($permisoRol);
    }

    public function delete($id){
        
        $permisoRol = PermisoRol::find($id);

        if(!$permisoRol){
            return response()->json(["message" => "PermisoRol no encontrado"], 404);
        }

        $permisoRol->delete();
        return response()->json($permisoRol);

    }
}
