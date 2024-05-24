<?php

namespace App\Http\Requests\HistoriaClinica;

use App\Models\TipoHistoriaClinica;
use Illuminate\Foundation\Http\FormRequest;

class SaveHistoriaClinicaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            "idMascota" => "required|integer|exists:mascotas,id",
            "tipo_historia_clinica_id"  => "required|integer|exists:tipos_historias_clinicas,id",
            "descripcion" => "nullable|string",
            "temperatura" => "nullable|string",
            "peso" => "nullable|string",
            "presion_arterial" => "nullable|string",
            "frecuencia_cardiaca" => "nullable|string",
            "porcentaje_deshidratacion" => "nullable|string",
            "examen_tacto_rectal" => "nullable|string",
            "frecuencia_respiratoria" => "nullable|string",
            "tiempo_llenado_capilar" => "nullable|string",
            "examen_clinico" => "nullable|string",
            "conformidad_pago" => "nullable|string",
            "documentacion_firmada" => "nullable|bool",
            "riesgo_quirurgico" =>  "nullable|bool",
            "miccion" => "nullable|bool",
            "deposicion" => "nullable|bool",
            "ayuno_previo" => "nullable|bool",

            "diagnosticos_mascotas" => "nullable|array",
            "diagnosticos_mascotas.*.diagnostico_id" => "required_with:diagnosticos_mascotas|exists:diagnosticos,id",
            "diagnosticos_mascotas.*.estado" => "required_with:diagnosticos_mascotas|string",
            "diagnoticos_mascotas.*.historial_clinica_id" => "required_with:diagnosticos_mascotas|exists:historias_clinicas,id", // "diagnosticos_mascotas.*.mascota_id" => "required_with:diagnosticos_mascotas|exists:mascotas,id
            
            "examenes_auxiliares_mascotas" => "nullable|array",
            "examenes_auxiliares_mascotas.*.mascota_id" => "required_with:examenes_auxiliares_mascotas|exists:mascotas,id",
            "examenes_auxiliares_mascotas.*.examen_auxiliar_id" => "required_with:examenes_auxiliares_mascotas|exists:examenes_auxiliares,id",
            "examenes_auxiliares_mascotas.*.indicaciones" => "required_with:examenes_auxiliares_mascotas|string",
            "examenes_auxiliares_mascotas.*.historial_clinica_id" => "required_with:examenes_auxiliares_mascotas|exists:historias_clinicas,id",

            "tratamientos" => "nullable|array",
            "tratamientos.*.producto_id" => "required_with:tratamientos|exists:productos,id",
            "tratamientos.*.categoria_id" => "required_with:tratamientos|exists:categorias,id",
            "tratamientos.*.indicaciones" => "required_with:tratamientos|string",
            "tratamientos.*.cantidad" => "required_with:tratamientos|numeric",
            "tratamientos.*.historial_clinica_id" => "required_with:tratamientos|exists:historias_clinicas,id",

            "vacunas" => "nullable|array",
            "vacunas.*.producto_id" => "required_with:vacunas|exists:productos,id",
            "vacunas.*.categoria_id" => "required_with:vacunas|exists:categorias,id",
            "vacunas.*.indicaciones" => "required_with:vacunas|string",
            "vacunas.*.cantidad" => "required_with:vacunas|numeric",
            "vacunas.*.historial_clinica_id" => "required_with:vacunas|exists:historias_clinicas,id",
            
            "anti_parasitarios" => "nullable|array",
            "anti_parasitarios.*.producto_id" => "required_with:anti_parasitarios|exists:productos,id",
            "anti_parasitarios.*.categoria_id" => "required_with:anti_parasitarios|exists:categorias,id",
            "anti_parasitarios.*.indicaciones" => "required_with:anti_parasitarios|string",
            "anti_parasitarios.*.cantidad" => "required_with:anti_parasitarios|numeric",
            "anti_parasitarios.*.historial_clinica_id" => "required_with:anti_parasitarios|exists:historias_clinicas,id",

            "anti_pulgas" => "nullable|array",
            "anti_pulgas.*.producto_id" => "required_with:anti_pulgas|exists:productos,id",
            "anti_pulgas.*.categoria_id" => "required_with:anti_pulgas|exists:categorias,id",
            "anti_pulgas.*.indicaciones" => "required_with:anti_pulgas|string",
            "anti_pulgas.*.cantidad" => "required_with:anti_pulgas|numeric",
            "anti_pulgas.*.historial_clinica_id" => "required_with:anti_pulgas|exists:historias_clinicas,id",

        ];

        $rules = array_merge($rules, $this->agregarRequeridoCuandoTipoHistoriaClinicaEsAdjunto($this));

        return $rules;

        
    }

    public function agregarRequeridoCuandoTipoHistoriaClinicaEsAdjunto($request){
        if($request->tipo_historia_clinica_id && $request->tipo_historia_clinica_id == TipoHistoriaClinica::ADJUNTO){
            return [
                "adjuntos" => "required|array",
                "adjuntos.*" => "required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048",
            ];
        }
    }
}
