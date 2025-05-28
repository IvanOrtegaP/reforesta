<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoPostRequest extends FormRequest
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
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'ubicacion' => 'nullable|string|max:255',
            'fecha' => 'required|date',
            'tipo_evento' => 'nullable|string|max:100',
            't_terreno' => 'nullable|string|max:100',
            'usuario_id' => 'required|exists:usuarios,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'fecha.required' => 'El campo fecha es obligatorio.',
            'usuario_id.required' => 'El organizador es obligatorio.',
            'usuario_id.exists' => 'El organizador seleccionado no es válido.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'imagen.max' => 'La imagen no debe superar los 2MB.',
            'pdf.mimes' => 'El archivo debe ser un PDF.',
            'pdf.max' => 'El archivo PDF no debe superar los 5MB.',
        ];
    }
}
