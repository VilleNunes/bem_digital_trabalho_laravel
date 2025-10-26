<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        $rules = [
            // Endereço
            'address.zip' => 'required|string|max:10',
            'address.state' => 'required|string|max:2',
            'address.city' => 'required|string|max:255',
            'address.neighborhood' => 'required|string|max:255',
            'address.road' => 'required|string|max:255',
            'address.number' => 'nullable|string|max:20',
            'address.complement' => 'nullable|string|max:255',
            'title_point' => 'required|string|max:255',

            // Campanha
            'name' => 'required|string|max:255',
            'beginning' => 'required|date|before_or_equal:termination',
            'termination' => 'required|date|after_or_equal:beginning',
            'title' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string'
        ];

   
        $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

        foreach ($dias as $dia) {
            $rules["horarios.$dia.abertura"] = 'nullable|date_format:H:i';
            $rules["horarios.$dia.fechamento"] = 'nullable|date_format:H:i|after_or_equal:horarios.' . $dia . '.abertura';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            // Endereço
            'address.zip.required' => 'O CEP é obrigatório.',
            'address.state.required' => 'O estado é obrigatório.',
            'address.city.required' => 'A cidade é obrigatória.',
            'address.neighborhood.required' => 'O bairro é obrigatório.',
            'address.road.required' => 'A rua é obrigatória.',

            // Campanha
            'name.required' => 'O nome da campanha é obrigatório.',
            'title_point.required' => 'O nome do ponto de coleta e orbrigatorio é obrigatório.',
            'beginning.required' => 'A data inicial é obrigatória.',
            'beginning.before_or_equal' => 'A data inicial deve ser antes ou igual à data final.',
            'termination.required' => 'A data final é obrigatória.',
            'termination.after_or_equal' => 'A data final deve ser igual ou posterior à data inicial.',
            'title.required' => 'A legenda do telefone é obrigatória.',
            'phone.required' => 'O telefone é obrigatório.',
            'category_id.required' => 'A categoria é obrigatória.',
            'category_id.exists' => 'A categoria selecionada é inválida.',
            'description.required' => 'A descrição é obrigatória.',

            // Agenda
            'horarios.*.abertura.date_format' => 'O horário de abertura deve estar no formato HH:MM.',
            'horarios.*.fechamento.date_format' => 'O horário de fechamento deve estar no formato HH:MM.',
            'horarios.*.fechamento.after_or_equal' => 'O horário de fechamento deve ser igual ou posterior ao horário de abertura.',

            'photos.required' => 'É necessário enviar pelo menos uma foto.',
            'photos.array' => 'Formato de fotos inválido.',
            'photos.min' => 'É necessário enviar pelo menos uma foto.',
            'photos.*.image' => 'Cada arquivo deve ser uma imagem.',
            'photos.*.mimes' => 'Formato de imagem inválido (permitidos: jpeg, png, jpg, gif, webp).',
            'photos.*.max' => 'Cada foto deve ter no máximo 5MB.',
        ];

        return $messages;
    }
}
