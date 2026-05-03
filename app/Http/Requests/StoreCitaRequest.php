<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|regex:/^[a-zA-Z\s]+$/',
            'documento' => 'required|numeric',
            'tipo_cita' => 'required|regex:/^[a-zA-Z\s]+$/',
            'eps' => 'required|regex:/^[a-zA-Z\s]+$/',
            'edad' => 'required|numeric|min:1|max:120',
            'fecha' => 'required|date',
            'hora' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.regex' => 'Solo letras en el nombre',
            'documento.numeric' => 'Solo números en documento',
        ];
    }
}
