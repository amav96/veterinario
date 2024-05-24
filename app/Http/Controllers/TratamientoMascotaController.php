<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tratamiento\SaveTratamientoMascotaRequest;
use App\Models\TratamientoMascota;
use Illuminate\Http\Request;

class TratamientoMascotaController extends Controller
{
    public function index(Request $request) {

        $query = TratamientoMascota::query();
        $parametros = $request->all();

        $query = $query
                    ->when(isset($parametros["mascota_id"]), function($q) use($parametros){
                        return $q->where("mascota_id", $parametros["mascota_id"]);
                    })
                    ->when(isset($parametros["categoria_id"]), function($q) use($parametros){
                        return $q->where("categoria_id", $parametros["categoria_id"]);
                    })
                    ->when(isset($parametros["historia_clinica_id"]), function($q) use($parametros){
                        return $q->where("historia_clinica_id", $parametros["historia_clinica_id"]);
                    });

        return isset($parametros["page"]) ? $query->paginate() : $query->get();
    }

    public function store(SaveTratamientoMascotaRequest $request){
        $tratamiento = new TratamientoMascota();
        $tratamiento->mascota_id = $request->mascota_id;
        $tratamiento->producto_id = $request->producto_id;
        $tratamiento->cantidad = $request->cantidad;
        $tratamiento->categoria_id = $request->categoria_id;
        $tratamiento->historia_clinica_id = $request->historia_clinica_id;
        $tratamiento->indicaciones = $request->indicaciones;
        $tratamiento->save();
    }

    public function update(SaveTratamientoMascotaRequest $request, $id){
        $tratamiento = TratamientoMascota::find($id);

        if(!$tratamiento){
            return response()->json(["message" => "Tratamiento no encontrado"], 404);
        }

        $tratamiento->mascota_id = $request->mascota_id ?? $tratamiento->mascota_id;
        $tratamiento->producto_id = $request->producto_id ?? $tratamiento->producto_id;
        $tratamiento->cantidad = $request->cantidad ?? $tratamiento->cantidad;
        $tratamiento->categoria_id = $request->categoria_id ?? $tratamiento->categoria_id;
        $tratamiento->historia_clinica_id = $request->historia_clinica_id ?? $tratamiento->historia_clinica_id;
        $tratamiento->indicaciones = $request->indicaciones ?? $tratamiento->indicaciones;
        $tratamiento->save();
    }    

    public function destroy($id){
        $tratamiento = TratamientoMascota::find($id);

        if(!$tratamiento){
            return response()->json(["message" => "Tratamiento no encontrado"], 404);
        }

        $tratamiento->delete();
    }
}
