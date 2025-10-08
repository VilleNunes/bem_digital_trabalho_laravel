@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

<nav class="text-sm text-gray-500" aria-label="Breadcrumb">
  <ol class="list-reset flex">
    <li>
      <a href="{{ route('users.create') }}" class="text-blue-600 hover:underline">Usuários</a>
      <span class="mx-2">/</span>
    </li>
    <li class="text-gray-700 font-semibold">Criar Usuários</li>
  </ol>
</nav>

<x-card class="space-y-6">

    <!-- Nome e Telefone -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <x-input-label for="name" value="Nome" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="phone" value="Telefone" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
    </div>

    <!-- Email -->
    <div>
        <x-input-label for="email" value="Email" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Senha e Confirmação -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <x-input-label for="password" value="Senha" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password_confirmation" value="Confirmar Senha" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>
    </div>

    <!-- Endereço completo -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div>
            <x-input-label for="address_zip" value="CEP" />
            <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address_zip" :value="old('address_zip')" required />
            <x-input-error :messages="$errors->get('address_zip')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_state" value="Estado" />
            <x-text-input id="address_state" class="block mt-1 w-full" type="text" name="address_state" :value="old('address_state')" required />
            <x-input-error :messages="$errors->get('address_state')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_city" value="Cidade" />
            <x-text-input id="address_city" class="block mt-1 w-full" type="text" name="address_city" :value="old('address_city')" required />
            <x-input-error :messages="$errors->get('address_city')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_neighborhood" value="Bairro" />
            <x-text-input id="address_neighborhood" class="block mt-1 w-full" type="text" name="address_neighborhood" :value="old('address_neighborhood')" required />
            <x-input-error :messages="$errors->get('address_neighborhood')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address_road" value="Rua" />
            <x-text-input id="address_road" class="block mt-1 w-full" type="text" name="address_road" :value="old('address_road')" required />
            <x-input-error :messages="$errors->get('address_road')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_number" value="Número" />
            <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address_number" :value="old('address_number')" required />
            <x-input-error :messages="$errors->get('address_number')" class="mt-2" />
        </div>
        <div class="col-span-2">
            <x-input-label for="address_complement" value="Complemento" />
            <x-text-input id="address_complement" class="block mt-1 w-full" type="text" name="address_complement" :value="old('address_complement')" />
            <x-input-error :messages="$errors->get('address_complement')" class="mt-2" />
        </div>
    </div>

    <!-- Permissões -->
    <div class="space-y-2">
        <h2 class="text-xl mb-2">Permissões do Usuário</h2>
        <div class="flex flex-col">
            @foreach ($modules as $module)
                <label for="module_{{ $module->id }}" class="flex items-center p-2 cursor-pointer">
                    <input id="module_{{ $module->id }}" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="modules[]"
                        value="{{ $module->id }}">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $module->title }}
                    </span>
                </label>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end gap-3">
         <x-button-link :href="route('users.index')">
            Cancelar
        </x-button-link>
        <x-button color='green'>
            Cadastrar
        </x-button>
    </div>

</x-card>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('address_zip');
    const stateInput = document.getElementById('address_state');
    const cityInput = document.getElementById('address_city');
    const neighborhoodInput = document.getElementById('address_neighborhood');
    const roadInput = document.getElementById('address_road');

    if (!cepInput) return;

    let alertShown = false;

    cepInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 8);
        if (this.value.length === 8) {
            fetchCEP(this.value);
        } else {
            clearAddressFields();
            alertShown = false; // reset para novo CEP
        }
    });

    async function fetchCEP(cep) {
        stateInput.value = '...';
        cityInput.value = '...';
        neighborhoodInput.value = '...';
        roadInput.value = '...';

        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.erro) {
                if (!alertShown) alert('CEP não encontrado');
                alertShown = true;
                clearAddressFields();
                return;
            }

            stateInput.value = data.uf;
            cityInput.value = data.localidade;
            neighborhoodInput.value = data.bairro;
            roadInput.value = data.logradouro;
            alertShown = false; // CEP válido, permite alert novo no próximo erro

        } catch {
            if (!alertShown) alert('Erro ao buscar o CEP');
            alertShown = true;
            clearAddressFields();
        }
    }

    function clearAddressFields() {
        stateInput.value = '';
        cityInput.value = '';
        neighborhoodInput.value = '';
        roadInput.value = '';
    }
});
</script>
@endpush


@endsection
