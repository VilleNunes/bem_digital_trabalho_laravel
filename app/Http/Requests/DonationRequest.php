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

        if (! $user) {
            return false;
        }

        // Carrega o relacionamento rule se não estiver carregado
    

     
        return true;
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

        $type = $this->input('type');
        $isEdit = $this->route('donation') !== null;

        $donation = $this->route('donation');
        $rules = [
            'campaign_id' => [
                'required',
                $campaignRule,
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'quantify' => ['nullable', 'integer', 'min:1'],
            'amount' => ['nullable', 'numeric', 'min:0'],
            'recipient_name' => [
                ValidationRule::requiredIf(fn () => $type === 'saida'),
                'nullable',
                'string',
                'max:255',
            ],
            'type' => ['required', 'string', 'in:entrada,saida'],
        ];

        // Adiciona validação de user_id apenas se não for saída
        if ($type !== 'saida') {
            $rules['user_id'] = [
                ValidationRule::requiredIf(fn () => $type === 'entrada' && ! $isEdit),
                'nullable',
                'exists:users,id',
            ];
        }

        return $rules;
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
            'recipient_name.required' => 'Informe o nome de quem recebeu a doação.',
            'recipient_name.max' => 'O nome do receptor não pode ultrapassar 255 caracteres.',
            'type.required' => 'Selecione o tipo da doação.',
            'type.in' => 'O tipo da doação deve ser entrada ou saída.',
        ];
    }

}
