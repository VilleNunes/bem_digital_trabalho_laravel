<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstitutionRequest extends FormRequest
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
            'fantasy_name' => ['required', 'string', 'max:100'],
            'cnpj' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:institutions,email'],
            'email_adm'=>['required','email','unique:users,email'],
            'cpf'=>['required','min:11','max:20'],
            'name_admin'=>['required'],
            'password'=>['required','min:8','confirmed']
        ];
    }
    public function messages(): array
    {
        return [
            'fantasy_name.required' => 'Informe o nome fantasia.',
            'email.required' => 'Informe o e-mail.',
            'email.email' => 'E-mail inválido.',
            'email.unique' => 'Já existe uma instituição com esse e-mail.',
            'cnpj.required' => 'Informe o CNPJ.',
            'phone.required' => 'Informe o telefone.',
            'photo.image' => 'A foto deve ser uma imagem.',
            'photo.mimes' => 'Formatos permitidos: jpg, jpeg, png, webp.',
            'photo.max' => 'A imagem pode ter no máximo 4 MB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'fantasy_name' => 'nome fantasia',
            'cnpj' => 'CNPJ',
            'phone' => 'telefone',
            'email' => 'e-mail',
            'is_active' => 'ativo',
            'description' => 'descrição',
            'photo' => 'foto',
        ];
    }

    protected function prepareForValidation(): void
    {
        // checkbox ausente => false; presente => true
        $this->merge([
            'is_active' => $this->boolean('is_active'),
            // normalização simples (opcional)
            'cnpj' => $this->cnpjNormalized($this->input('cnpj')),
            'phone' => $this->phoneNormalized($this->input('phone')),
        ]);
    }

    private function cnpjNormalized(?string $v): ?string
    {
        return $v ? preg_replace('/\D+/', '', $v) : $v;
    }

    private function phoneNormalized(?string $v): ?string
    {
        return $v ? preg_replace('/\s+/', ' ', trim($v)) : $v;
    }
}
