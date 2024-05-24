<?php

namespace App\Http\Controllers;

use App\Http\Requests\Diagnostico\SaveDiagnosticoMascotaRequest;
use App\Models\DiagnosticoMascota;
use Illuminate\Http\Request;

class DiagnosticoMascotaController extends Controller
{

    public function index(Request $request) {
        
        $query = DiagnosticoMascota::query();
        $parametros = $request->all();

        $query = $query
                    ->when(isset($parametros["mascota_id"]), function($q) use($parametros){
                        return $q->where("mascota_id", $parametros["mascota_id"]);
                    })
                    ->when(isset($parametros["historia_clinica_id"]), function($q) use($parametros){
                        return $q->where("historia_clinica_id", $parametros["historia_clinica_id"]);
                    });

        return isset($parametros["page"]) ? $query->paginate() : $query->get();
    } 


    public function store(SaveDiagnosticoMascotaRequest $request){

        $diagnostico = new DiagnosticoMascota();
        $diagnostico->diagnostico_id = $request->diagnostico_id;
        $diagnostico->mascota_id = $request->mascota_id;
        $diagnostico->historia_clinica_id = $request->historia_clinica_id;
        $diagnostico->estado = $request->estado;

        $diagnostico->save();
    }

    public function update(SaveDiagnosticoMascotaRequest $request, $id){
        $diagnostico = DiagnosticoMascota::find($id);

        if(!$diagnostico){
            return response()->json(["message" => "Diagnostico no encontrado"], 404);
        }

        $diagnostico->diagnostico_id = $request->diagnostico_id;
        $diagnostico->mascota_id = $request->mascota_id;
        $diagnostico->historia_clinica_id = $request->historia_clinica_id;
        $diagnostico->estado = $request->estado ?? $diagnostico->estado;
        $diagnostico->save();

        // todo: redirigir a vista
        return response()->json($diagnostico);
    }

    public function destroy($id){
        $diagnostico = DiagnosticoMascota::find($id);

        if(!$diagnostico){
            return response()->json(["message" => "Diagnostico no encontrado"], 404);
        }

        $diagnostico->delete();
    }
}
