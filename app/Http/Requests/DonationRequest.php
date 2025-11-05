<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;

class DonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        $donation = $this->route('donation');

        if (! $user) {
            return false;
        }

        $role = optional($user->rule)->name;

        if ($role === 'admin') {
            return true;
        }

        if ($role === 'donor') {
            return $donation && $donation->user_id === $user->id;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $institutionId = currentInstitutionId();

        $campaignRule = ValidationRule::exists('campaigns', 'id');

        if ($institutionId) {
            $campaignRule->where(fn ($query) => $query->where('institution_id', $institutionId));
        }

        return [
            'user_id' => [
                ValidationRule::requiredIf(fn () => ! $this->route('donation')),
                'exists:users,id',
            ],
            'campaign_id' => [
                ValidationRule::requiredIf(fn () => ! $this->route('donation')),
                $campaignRule,
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'quantify' => ['nullable', 'integer', 'min:1'],
            'amount' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Selecione o doador responsável pela doação.',
            'user_id.exists' => 'O doador selecionado não foi encontrado.',
            'campaign_id.required' => 'Selecione a campanha vinculada à doação.',
            'campaign_id.exists' => 'A campanha selecionada não foi encontrada ou não pertence à sua instituição.',
            'name.required' => 'Informe o nome da doação.',
            'name.max' => 'O nome da doação não pode ultrapassar 255 caracteres.',
            'quantify.integer' => 'Quantidade deve ser um número inteiro.',
            'quantify.min' => 'Quantidade mínima é 1.',
            'amount.numeric' => 'Valor deve ser numérico.',
            'amount.min' => 'Valor mínimo é zero.',
        ];
    }
}
