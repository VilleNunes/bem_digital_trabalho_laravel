@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Usuários</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Criar Usuários</li>
    </ol>
</nav>
<x-card>
    <form action="{{ route('users.store') }}" class="space-y-5" method="post">
        @csrf
        <!-- Nome e Telefone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-input-label for="name" required value="Nome" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="phone" required value="Telefone" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" required value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha e Confirmação -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-input-label for="password" required value="Senha" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password_confirmation" required value="Confirmar Senha" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>
        </div>

        <!-- Endereço -->
        <h2 class="text-xl mb-2 font-semibold">Endereço</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            <div>
                <x-input-label for="address_zip" value="CEP" />
                <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address[zip]"
                    :value="old('address.zip')" />
                <x-input-error :messages="$errors->get('address.zip')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_state" value="Estado" />
                <x-text-input id="address_state" class="block mt-1 w-full" type="text" name="address[state]"
                    :value="old('address.state')" />
                <x-input-error :messages="$errors->get('address.state')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_city" value="Cidade" />
                <x-text-input id="address_city" class="block mt-1 w-full" type="text" name="address[city]"
                    :value="old('address.city')" />
                <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_neighborhood" value="Bairro" />
                <x-text-input id="address_neighborhood" class="block mt-1 w-full" type="text"
                    name="address[neighborhood]" :value="old('address.neighborhood')" />
                <x-input-error :messages="$errors->get('address.neighborhood')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address_road" value="Rua" />
                <x-text-input id="address_road" class="block mt-1 w-full" type="text" name="address[road]"
                    :value="old('address.road')" />
                <x-input-error :messages="$errors->get('address.road')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="address_number" value="Número" />
                <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address[number]"
                    :value="old('address.number')" />
                <x-input-error :messages="$errors->get('address.number')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="address_complement" value="Complemento" />
                <x-text-input id="address_complement" class="block mt-1 w-full" type="text" name="address[complement]"
                    :value="old('address.complement')" />
                <x-input-error :messages="$errors->get('address.complement')" class="mt-2" />
            </div>
        </div>

        <!-- Permissões -->
        <div class="space-y-2">
            <h2 class="text-xl mb-2 font-semibold">Permissões do Usuário</h2>
            <x-input-error :messages="$errors->get('modules')" class="mt-2" />
            <div class="flex flex-col">
                @foreach ($modules as $module)
                <label for="module_{{ $module->id }}" class="flex items-center p-2 cursor-pointer">
                    <input id="module_{{ $module->id }}" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="modules[]"
                        value="{{ $module->id }}" {{ in_array($module->id, old('modules', [])) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $module->title }}
                    </span>
                </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <x-button-link color="link" :href="route('users.index')">
                Cancelar
            </x-button-link>
            <x-button color='green'>
                Cadastrar
            </x-button>
        </div>
    </form>
</x-card>

@endsection