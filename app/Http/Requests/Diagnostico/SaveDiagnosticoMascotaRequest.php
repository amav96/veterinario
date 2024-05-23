<?php

namespace App\Http\Requests\Diagnostico;

use Illuminate\Foundation\Http\FormRequest;

class SaveDiagnosticoMascotaRequest extends FormRequest
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
        return [
            "diagnostico_id"        => "required|integer|exists:diagnosticos,id",
            "mascota_id"            => "required|integer|exists:mascotas,id",
            "historia_clinica_id"   => "required|integer|exists:historia_clinicas,id",
            "estado"                => "nullable|string|in:presuntivo,confirmado"
        ];
    }
}
