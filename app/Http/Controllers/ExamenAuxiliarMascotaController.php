<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamenAuxiliar\SaveExamenAuxiliarMascotaRequest;
use App\Models\ExamenAuxiliar;
use App\Models\ExamenAuxiliarMascota;
use Illuminate\Http\Request;

class ExamenAuxiliarMascotaController extends Controller
{
    public function index(Request $request) {
        $query = ExamenAuxiliarMascota::query();
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

    public function store(SaveExamenAuxiliarMascotaRequest $request){
        $examenAuxiliar = new ExamenAuxiliar();
        $examenAuxiliar->nombre = $request->nombre;
        $examenAuxiliar->descripcion = $request->descripcion;
        $examenAuxiliar->save();
    }

    public function update(SaveExamenAuxiliarMascotaRequest $request, $id){
        $examenAuxiliar = ExamenAuxiliar::find($id);

        if(!$examenAuxiliar){
            return response()->json(["message" => "Examen auxiliar no encontrado"], 404);
        }

        $examenAuxiliar->mascota_id = $request->mascota_id ?? $examenAuxiliar->mascota_id;
        $examenAuxiliar->examen_auxiliar_id = $request->examen_auxiliar_id ?? $examenAuxiliar->examen_auxiliar_id;
        $examenAuxiliar->historia_clinica_id = $request->historia_clinica_id ?? $examenAuxiliar->historia_clinica_id;
        $examenAuxiliar->indicaciones = $request->indicaciones ?? $examenAuxiliar->indicaciones;
    
        $examenAuxiliar->save();
    }

    public function destroy($id){
        $examenAuxiliar = ExamenAuxiliar::find($id);

        if(!$examenAuxiliar){
            return response()->json(["message" => "Examen auxiliar no encontrado"], 404);
        }

        $examenAuxiliar->delete();
    }

}
