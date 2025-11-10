@php
$donationModel = $donation ?? new \App\Models\Donation();
$selectedDonor = old('user_id', $donationModel->user_id);
$selectedCampaign = old('campaign_id', $donationModel->campaign_id);
$quantify = old('quantify', $donationModel->quantify ?? 1);
$amount = old('amount', $donationModel->amount ?? '');
$description = old('description', $donationModel->description ?? '');
$isEdit = $donationModel->exists;
@endphp

<div class="space-y-5">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <x-input-label for="campaign_id" required value="Selecionar Campanha" />
            <select id="campaign_id" name="campaign_id" class="select w-full" {{ $isEdit ? '' : 'required' }}>
                <option value="" disabled {{ $selectedCampaign ? '' : 'selected' }}>Escolha uma campanha</option>
                @foreach ($campaigns as $campaign)
                <option value="{{ $campaign->id }}" {{ (string) $selectedCampaign===(string) $campaign->id ? 'selected'
                    : '' }}>
                    {{ $campaign->name }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('campaign_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="user_id" required value="Selecionar Doador" />
            <select id="user_id" name="user_id" class="select w-full" {{ $isEdit ? '' : 'required' }}>
                <option value="" disabled {{ $selectedDonor ? '' : 'selected' }}>Escolha um doador</option>
                @foreach ($donors as $donor)
                <option value="{{ $donor->id }}" {{ (string) $selectedDonor===(string) $donor->id ? 'selected' : '' }}>
                    {{ $donor->name }} - {{ $donor->email }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <x-input-label for="kg" value="Quantidade em KG/Unitário" />
            <x-text-input id="" class="block mt-1 w-full" name="quantify" :value="$quantify" />
            <x-input-error :messages="$errors->get('quantify')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="name" required value="Nome da Doação" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name', $donationModel->name)" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-input-label for="description" value="Descrição" />
        <textarea id="description" name="description" rows="4"
            class="w-full mt-1 rounded border border-gray-300 p-3 focus:ring-2 focus:ring-verde-claro focus:outline-none">{{ $description }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
</div>