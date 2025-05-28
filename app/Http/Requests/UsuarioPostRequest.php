<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioPostRequest extends FormRequest
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
        $usuarioId = $this->route('usuario');

        return [
            'nick' => 'required|string|max:50|unique:usuarios,nick,' . $usuarioId,
            'nombre' => 'required|string|max:100',
            'apellidos' => 'nullable|string|max:150',
            'email' => 'required|email|max:100|unique:usuarios,email,' . $usuarioId,
            'password' => $usuarioId ? 'nullable|string|min:6|confirmed' : 'required|string|min:6|confirmed',
            'karma' => 'nullable|integer|min:0',
            'suscrito' => 'sometimes|boolean',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nick.required' => 'El campo nick es obligatorio.',
            'nick.unique' => 'El nick ya está en uso.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.unique' => 'El email ya está en uso.',
            'email.email' => 'El email debe ser una dirección válida.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'karma.integer' => 'El karma debe ser un número entero.',
            'suscrito.boolean' => 'El campo suscrito debe ser verdadero o falso.',
            'avatar.image' => 'El archivo debe ser una imagen.',
            'avatar.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'avatar.max' => 'La imagen no debe superar los 2MB.',
        ];
    }
}
