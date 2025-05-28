<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspeciePostRequest extends FormRequest
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
            'nombre_cientifico' => 'required|string|max:150|unique:especies',
            'crecimiento' => 'nullable|string',
            'region' => 'nullable|string|max:100',
            'clima' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'enlace' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_cientifico.required' => 'El campo nombre científico es obligatorio.',
            'nombre_cientifico.unique' => 'El nombre científico ya está en uso.',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.max' => 'La imagen no debe superar los 2MB.',
        ];
    }
}
