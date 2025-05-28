<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficioPostRequest extends FormRequest
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
            'especie_id' => 'required|exists:especies,id',
            'descripcion' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'especie_id.required' => 'El campo especie es obligatorio.',
            'especie_id.exists' => 'La especie seleccionada no es válida.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
        ];
    }
}
