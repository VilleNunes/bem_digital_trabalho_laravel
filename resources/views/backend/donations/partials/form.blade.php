@php
$donationModel = $donation ?? new \App\Models\Donation();
$selectedDonor = old('user_id', $donationModel->user_id);
$selectedCampaign = old('campaign_id', $donationModel->campaign_id ?? request('campaign_id'));
$quantify = old('quantify', $donationModel->quantify ?? 1);
$amount = old('amount', $donationModel->amount ?? '');
$description = old('description', $donationModel->description ?? '');
$isEdit = $donationModel->exists;
$oldType = old('type', '');
$estoque = $estoque ?? 0;
$hasCampaign = !empty($selectedCampaign);
@endphp

<div x-data="{ 
    type: '{{ $oldType }}', 
    campaignId: '{{ $selectedCampaign }}',
    campaignSelected: {{ $hasCampaign ? 'true' : 'false' }}
}" class="space-y-5">
    
    {{-- PRIMEIRO: Selecionar Campanha --}}
    <div>
        <x-input-label for="campaign_id" required value="Selecionar Campanha" />
        <select name="campaign_id" id="campaign_id" class="select w-full" 
            x-model="campaignId"
            @change="if (campaignId !== '') { campaignSelected = true; window.location.href='{{ route('donations.create') }}?campaign_id=' + campaignId; } else { campaignSelected = false; type = ''; }">
            <option value="">Selecione uma campanha</option>
            @foreach ($campaigns as $campaign)
                <option value="{{ $campaign->id }}" {{ ($selectedCampaign == $campaign->id) ? 'selected' : '' }}>
                    {{ $campaign->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('campaign_id')" class="mt-2" />
        @if($hasCampaign)
        <p class="mt-1 text-sm text-green-600">
            <i class="fa-solid fa-check-circle mr-1"></i>Campanha selecionada
        </p>
        @endif
    </div>

    {{-- SEGUNDO: Selecionar Tipo (só habilitado depois de selecionar campanha) --}}
    <div>
        <x-input-label for="type" required value="Tipo da doação" />
        <select name="type" required class="select" id="type" 
            x-model="type"
            :disabled="!campaignSelected">
            <option value="">Selecione o tipo</option>
            <option value="entrada">Entrada</option>
            <option value="saida">Saída</option>
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
        <p x-show="!campaignSelected" class="mt-1 text-sm text-gray-500">
            Selecione uma campanha primeiro
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            {{-- Doador (só aparece para entrada) --}}
            <div x-show="type === 'entrada'" x-transition>
                <x-input-label for="user_id" required value="Selecionar Doador" />
                <select id="user_id" name="user_id" class="select w-full" 
                    :disabled="!type || type !== 'entrada' || !campaignSelected" 
                    x-bind:required="type === 'entrada'">
                    <option value="" disabled {{ $selectedDonor ? '' : 'selected' }}>Escolha um doador</option>
                    @foreach ($donors as $donor)
                        <option value="{{ $donor->id }}" {{ (string) $selectedDonor===(string) $donor->id ? 'selected' : '' }}>
                            {{ $donor->name }} - {{ $donor->email }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>

            {{-- Receptor (só aparece para saída) --}}
            <div x-show="type === 'saida'" x-transition>
                <x-input-label for="recipient_name" required value="Nome de quem recebeu a doação" />
                <x-text-input id="recipient_name" class="block mt-1 w-full" type="text" name="recipient_name"
                    :value="old('recipient_name')" 
                    x-bind:disabled="!type || !campaignSelected" />
                <x-input-error :messages="$errors->get('recipient_name')" class="mt-2" />
                @if(isset($estoque) && $estoque >= 0)
                <div class="mt-2 text-sm {{ $estoque > 0 ? 'text-blue-600' : 'text-red-600' }}">
                    <i class="fa-solid fa-info-circle mr-1"></i>
                    Estoque disponível: <strong>{{ $estoque }}</strong> unidades
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- TERCEIRO: Outros campos (só habilitados depois de selecionar tipo) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <x-input-label for="kg" value="Quantidade em KG/Unitário" />
            <x-text-input id="" class="block mt-1 w-full" name="quantify" type="number" min="1" 
                :value="$quantify" 
                x-bind:disabled="!type || !campaignSelected" />
            <x-input-error :messages="$errors->get('quantify')" class="mt-2" />
            <div x-show="type === 'saida'" class="mt-1 text-xs text-gray-500">
                Máximo disponível: {{ $estoque }} unidades
            </div>
        </div>
        <div>
            <x-input-label for="name" required value="Nome da Doação" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name', $donationModel->name)" 
                required 
                x-bind:disabled="!type || !campaignSelected" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-input-label for="description" value="Descrição" />
        <textarea id="description" name="description" rows="4"
            class="w-full mt-1 rounded border border-gray-300 p-3 focus:ring-2 focus:ring-verde-claro focus:outline-none"
            x-bind:disabled="!type || !campaignSelected">{{ $description }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
</div>
