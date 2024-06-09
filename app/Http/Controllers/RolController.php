<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    
    public function findAll(Request $request){
        $roles = Rol::with(['permisos'])->get();
        return response()->json($roles);
    }
}
