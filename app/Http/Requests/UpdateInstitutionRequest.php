<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitutionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('institution')->id ?? null;

        return [
            'fantasy_name' => ['required', 'string', 'max:100'],
            'cnpj' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:institutions,email,' . $id],
            'is_active' => ['sometimes', 'boolean'],
            'description' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_photo' => ['sometimes', 'boolean'],

            'address.zip' => 'nullable|string|max:20',
            'address.state' => 'nullable|string|max:50',
            'address.city' => 'nullable|string|max:100',
            'address.neighborhood' => 'nullable|string|max:100',
            'address.road' => 'nullable|string|max:255',
            'address.number' => 'nullable|string|max:20',
            'address.complement' => 'nullable|string|max:255',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
            'remove_photo' => $this->boolean('remove_photo'),
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
