<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoriaClinica\SaveHistoriaClinicaRequest;
use App\Models\Diagnostico;
use App\Models\DiagnosticoMascota;
use App\Models\ExamenAuxiliar;
use App\Models\ExamenAuxiliarMascota;
use App\Models\HistoriaClinica;
use App\Models\HistoriaClinicaAdjunto;
use App\Models\Producto;
use App\Models\TratamientoMascota;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    

    public function create(){
        $diagnosticos = Diagnostico::all();
        $examenesAuxiliares = ExamenAuxiliar::all();
        $tratamientos = Producto::all(); // sirve para vacuna, antiparasitario y antipulgas
    }
  
    public function store(SaveHistoriaClinicaRequest $request){
        
        $historiaClinica = new HistoriaClinica();
        $historiaClinica->idMascota = $request->idMascota;
        $historiaClinica->tipo_historia_clinica_id = $request->tipo_historia_clinica_id;
        $historiaClinica->descripcion = $request->descripcion;
        $historiaClinica->temperatura = $request->temperatura;
        $historiaClinica->peso = $request->peso;
        $historiaClinica->presion_arterial = $request->presion_arterial;
        $historiaClinica->frecuencia_cardiaca = $request->frecuencia_cardiaca;
        $historiaClinica->porcentaje_deshidratacion = $request->porcentaje_deshidratacion;
        $historiaClinica->examen_tacto_rectal = $request->examen_tacto_rectal;
        $historiaClinica->frecuencia_respiratoria = $request->frecuencia_respiratoria;
        $historiaClinica->tiempo_llenado_capilar = $request->tiempo_llenado_capilar;
        $historiaClinica->examen_clinico = $request->examen_clinico;
        $historiaClinica->conformidad_pago = $request->conformidad_pago;
        $historiaClinica->documentacion_firmada = $request->documentacion_firmada;
        $historiaClinica->riesgo_quirurgico = $request->riesgo_quirurgico;
        $historiaClinica->miccion = $request->miccion;
        $historiaClinica->deposicion = $request->deposicion;
        $historiaClinica->ayuno_previo = $request->ayuno_previo;
        $historiaClinica->fecha_atencion = $request->fecha_atencion;
        $historiaClinica->nombre_cirugia = $request->nombre_cirugia;
        

        $historiaClinica->save();

        if($request->diagnosticos_mascotas){
            foreach($request->diagnosticos_mascotas as $diagnostico){
                DiagnosticoMascota::create([
                    "mascota_id" => $request->idMascota,
                    "diagnostico_id" => $diagnostico["diagnostico_id"],
                    "historial_clinica_id" => $historiaClinica->id,
                    "estado" => $diagnostico["estado"]
                ]);

            }
        }

        if($request->examenes_auxiliares_mascotas){
            foreach($request->examenes_auxiliares_mascotas as $examen){
               ExamenAuxiliarMascota::create([
                "mascota_id" => $examen->mascota_id,
                "examen_auxiliar_id" => $examen->examen_auxiliar_id,
                "historial_clinica_id" => $historiaClinica->id,
                "indicaciones" => $examen->indicaciones
               ]); 
            }
        }

        if($request->tratamientos){
            foreach($request->tratamientos as $tratamiento){
                TratamientoMascota::create([
                    "mascota_id" => $request->idMascota,
                    "producto_id" => $tratamiento["producto_id"],
                    "categoria_id" => $tratamiento["categoria_id"],
                    "indicaciones" => $tratamiento["indicaciones"],
                    "cantidad" => $tratamiento["cantidad"],
                    "historial_clinica_id" => $historiaClinica->id,
                ]);
            }
        }

        if($request->vacunas){
            foreach($request->vacunas as $vacuna){
                TratamientoMascota::create([
                    "mascota_id" => $request->idMascota,
                    "producto_id" => $vacuna["producto_id"],
                    "categoria_id" => $vacuna["categoria_id"],
                    "indicaciones" => $vacuna["indicaciones"],
                    "cantidad" => $vacuna["cantidad"],
                    "historial_clinica_id" => $vacuna->id,
                ]);
            }
        }

        if($request->anti_parasitarios){
            foreach($request->anti_parasitarios as $anti){
                TratamientoMascota::create([
                    "mascota_id" => $request->idMascota,
                    "producto_id" => $anti["producto_id"],
                    "categoria_id" => $anti["categoria_id"],
                    "indicaciones" => $anti["indicaciones"],
                    "cantidad" => $anti["cantidad"],
                    "historial_clinica_id" => $anti->id,
                ]);
            }
        }

        if($request->anti_pulgas){
            foreach($request->anti_pulgas as $anti){
                TratamientoMascota::create([
                    "mascota_id" => $request->idMascota,
                    "producto_id" => $anti["producto_id"],
                    "categoria_id" => $anti["categoria_id"],
                    "indicaciones" => $anti["indicaciones"],
                    "cantidad" => $anti["cantidad"],
                    "historial_clinica_id" => $anti->id,
                ]);
            }
        }

        if($request->adjuntos){

            foreach($request->adjuntos as $adjunto){
                $historiaClinicaAdjunto = new HistoriaClinicaAdjunto();
                $historiaClinicaAdjunto->historia_clinica_id = $historiaClinica->id;
                $path = $this->guardarArchivoAdjunto($adjunto, $historiaClinica->id);
                $historiaClinicaAdjunto->path = $path;
                $historiaClinicaAdjunto->save();
            }
        }

        return response()->json($historiaClinica, 201);
   
        // todo
        // si viene sala de espera guardar en sala de espera
        // si viene evento guardar en eventos
    }

    public function guardarArchivoAdjunto($archivo, $historiaCliniaId){
        $nombreArchivo = $archivo->getClientOriginalName().'_'.$historiaCliniaId.'.'.$archivo->getClientOriginalExtension();
        $path = $archivo->storeAs('historias_clinicas', $nombreArchivo, 'public');
        return $path;
    }

    public function update(Request $request, $id) {

        $historiaClinica = HistoriaClinica::find($id);
        if(!$historiaClinica){
            return response()->json(["message" => "Historia Clinica no encontrada"], 404);
        }

        $historiaClinica->idMascota = $request->idMascota ?? $historiaClinica->idMascota;
        $historiaClinica->tipo_historia_clinica_id = $request->tipo_historia_clinica_id ?? $historiaClinica->tipo_historia_clinica_id;
        $historiaClinica->descripcion = $request->descripcion ?? $historiaClinica->descripcion;
        $historiaClinica->temperatura = $request->temperatura ?? $historiaClinica->temperatura;
        $historiaClinica->peso = $request->peso ?? $historiaClinica->peso;
        $historiaClinica->presion_arterial = $request->presion_arterial ?? $historiaClinica->presion_arterial;
        $historiaClinica->frecuencia_cardiaca = $request->frecuencia_cardiaca ?? $historiaClinica->frecuencia_cardiaca;
        $historiaClinica->porcentaje_deshidratacion = $request->porcentaje_deshidratacion ?? $historiaClinica->porcentaje_deshidratacion;
        $historiaClinica->examen_tacto_rectal = $request->examen_tacto_rectal ?? $historiaClinica->examen_tacto_rectal;
        $historiaClinica->frecuencia_respiratoria = $request->frecuencia_respiratoria ?? $historiaClinica->frecuencia_respiratoria;
        $historiaClinica->tiempo_llenado_capilar = $request->tiempo_llenado_capilar ?? $historiaClinica->tiempo_llenado_capilar;
        $historiaClinica->examen_clinico = $request->examen_clinico ?? $historiaClinica->examen_clinico;
        $historiaClinica->conformidad_pago = $request->conformidad_pago ?? $historiaClinica->conformidad_pago;
        $historiaClinica->documentacion_firmada = $request->documentacion_firmada ?? $historiaClinica->documentacion_firmada;
        $historiaClinica->riesgo_quirurgico = $request->riesgo_quirurgico ?? $historiaClinica->riesgo_quirurgico;
        $historiaClinica->miccion = $request->miccion ?? $historiaClinica->miccion;
        $historiaClinica->deposicion = $request->deposicion ?? $historiaClinica->deposicion;
        $historiaClinica->ayuno_previo = $request->ayuno_previo ?? $historiaClinica->ayuno_previo;
        $historiaClinica->fecha_atencion = $request->fecha_atencion ?? $historiaClinica->fecha_atencion;
        $historiaClinica->nombre_cirugia = $request->nombre_cirugia ?? $historiaClinica->nombre_cirugia;
        
        $historiaClinica->save();
    }


}