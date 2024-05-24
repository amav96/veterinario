<?php

namespace App\Http\Requests\Tratamiento;

use Illuminate\Foundation\Http\FormRequest;

class SaveTratamientoMascotaRequest extends FormRequest
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
            "mascota_id"                => "required|integer|exists:mascotas,id",
            "producto_id"               => "required|integer|exists:productos,id",
            "cantidad"                  => "required|integer",
            "categoria_id"              => "required|integer|exists:categorias,id",
            "historia_clinica_id"       => "required|integer|exists:historia_clinicas,id",
            "indicaciones"              => "nullable|string"
        ];
    }
}
