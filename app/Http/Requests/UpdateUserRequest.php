<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$userId,
            'password'=>"confirmed",
            'modules' => 'required|array',
            'modules.*' => 'integer|exists:modules,id',

        
            'address.zip' => 'nullable|string|max:20',
            'address.state' => 'nullable|string|max:50',
            'address.city' => 'nullable|string|max:100',
            'address.neighborhood' => 'nullable|string|max:100',
            'address.road' => 'nullable|string|max:255',
            'address.number' => 'nullable|string|max:20',
            'address.complement' => 'nullable|string|max:255',

            
            'phone' => 'nullable|string|max:20',
        ];
    }

     public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'email.unique' => 'Este email já está em uso.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não confere.',
            'modules.required' => 'Você deve selecionar pelo menos uma permissão.',
        ];
    }
}

