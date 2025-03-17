<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'fechaNacimiento' => ['required', 'regex:/\d{2}-\d{2}-\d{4}/'], // Ensures dd-mm-yyyy format
            'genero' => 'required|not_in:default',
            'estadoNacimiento' => 'required',
            'alergias' => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'telefono' => 'required|min:10|max:10',
            'nombreEmergencia' => 'required',
            'telefonoEmergencia' => 'required|min:10|max:10',
        ];
    }
}
