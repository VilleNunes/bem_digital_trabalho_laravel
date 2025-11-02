@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2">Editar Doador</h1>


<nav class="text-sm text-gray-500 mb-5" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('donors.index') }}" class="text-blue-600 hover:underline">Doadors</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Editar Doador {{ $donor->name }}</li>
    </ol>
</nav>

<x-card>
    <form action="{{ route('donors.update', $donor->id) }}" class="space-y-5" method="post">
        @csrf
        @method('PUT')

        <!-- Nome e Telefone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-input-label for="name" value="Nome" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name', $donor->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="phone" value="Telefone" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                    :value="old('phone', $donor->phone)" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>

        <!-- Email -->
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email', $donor->email)" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="cpf" value="CPF" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf', $donor->cpf)"
                    required />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>
        </div>

        <!-- Endereço -->
        <h2 class="text-xl mb-2 font-semibold">Endereço</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            <div>
                <x-input-label for="address_zip" value="CEP" />
                <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address[zip]"
                    :value="old('address.zip', $donor->address->zip ?? '')" />
                <x-input-error :messages="$errors->get('address.zip')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_state" value="Estado" />
                <x-text-input id="address_state" class="block mt-1 w-full" type="text" name="address[state]"
                    :value="old('address.state', $donor->address->state ?? '')" />
                <x-input-error :messages="$errors->get('address.state')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_city" value="Cidade" />
                <x-text-input id="address_city" class="block mt-1 w-full" type="text" name="address[city]"
                    :value="old('address.city', $donor->address->city ?? '')" />
                <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_neighborhood" value="Bairro" />
                <x-text-input id="address_neighborhood" class="block mt-1 w-full" type="text"
                    name="address[neighborhood]"
                    :value="old('address.neighborhood', $donor->address->neighborhood ?? '')" />
                <x-input-error :messages="$errors->get('address.neighborhood')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address_road" value="Rua" />
                <x-text-input id="address_road" class="block mt-1 w-full" type="text" name="address[road]"
                    :value="old('address.road', $donor->address->road ?? '')" />
                <x-input-error :messages="$errors->get('address.road')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_number" value="Número" />
                <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address[number]"
                    :value="old('address.number', $donor->address->number ?? '')" />
                <x-input-error :messages="$errors->get('address.number')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="address_complement" value="Complemento" />
                <x-text-input id="address_complement" class="block mt-1 w-full" type="text" name="address[complement]"
                    :value="old('address.complement', $donor->address->complement ?? '')" />
                <x-input-error :messages="$errors->get('address.complement')" class="mt-2" />
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <x-button-link color="link" :href="route('donors.index')">
                Cancelar
            </x-button-link>
            <x-button color='green'>
                Salvar
            </x-button>
        </div>
    </form>
</x-card>

@endsection