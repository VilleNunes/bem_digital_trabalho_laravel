@extends('backend.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-2">Editar Instituição</h1>

<nav class="text-sm text-gray-500 mb-5" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('institutions.index') }}" class="text-blue-600 hover:underline">Instituições</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Editar {{ $institution->fantasy_name }}</li>
    </ol>
</nav>

<x-card>
    <form method="POST" action="{{ route('institutions.update', $institution) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="fantasy_name" value="Nome Fantasia" />
                <input id="fantasy_name" name="fantasy_name" type="text"
                       value="{{ old('fantasy_name', $institution->fantasy_name) }}"
                       class="mt-1 block w-full rounded border-gray-300" required />
                <x-input-error :messages="$errors->get('fantasy_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="cnpj" value="CNPJ" />
                <input id="cnpj" name="cnpj" type="text"
                       value="{{ old('cnpj', $institution->cnpj) }}"
                       class="mt-1 block w-full rounded border-gray-300" required />
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone" value="Telefone" />
                <input id="phone" name="phone" type="text"
                       value="{{ old('phone', $institution->phone) }}"
                       class="mt-1 block w-full rounded border-gray-300" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" value="E-mail" />
                <input id="email" name="email" type="email"
                       value="{{ old('email', $institution->email) }}"
                       class="mt-1 block w-full rounded border-gray-300" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="md:col-span-2 flex items-center gap-2 mt-2">
                <input id="is_active" name="is_active" type="checkbox" value="1"
                       {{ old('is_active', $institution->is_active) ? 'checked' : '' }}
                       class="rounded border-gray-300" />
                <x-input-label for="is_active" value="Ativa" />
                <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <x-button-link color="link" :href="route('institutions.index')">
                Cancelar
            </x-button-link>
            <x-button color='green'>
                Salvar
            </x-button>
        </div>
    </form>
</x-card>
@endsection
