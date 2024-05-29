<?php

namespace App\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductoGaleriaRequest extends FormRequest
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
            "producto_id"    => "required|integer|exists:productos,id",
            "galeria"        => "required|array",
            "galeria.*"      => "required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048"
        ];
    }
}
