@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Detalhes do Doador</h1>

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li>
            <a href="{{ route('donors.index') }}" class="text-gray-700 hover:underline">Doadores</a>
        </li>
        <span class="mx-2">/</span>
        <li class="text-gray-700 font-semibold">{{ $donor->name }}</li>
    </ol>
</nav>

<!-- Breadcrumb -->
<nav class="text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Usuários</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">{{ $user->name }}</li>
    </ol>
</nav>

<!-- Card com detalhes -->
<x-card>
    <h2 class="text-xl font-semibold mb-4">Informações do Doador</h2>

    <!-- Dados principais -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <span class="font-medium text-gray-700">Nome:</span>
            <p class="text-gray-800">{{ $donor->name }}</p>
        </div>
        <div>
            <span class="font-medium text-gray-700">Email:</span>
            <p class="text-gray-800">{{ $donor->email }}</p>
        </div>

        @if($donor->phone)
        <div>
            <span class="font-medium text-gray-700">Telefone:</span>
            <p class="text-gray-800">{{ $donor->phone }}</p>
        </div>
        @endif

        @if($user->is_active !== null)
        <div>
            <span class="font-medium text-gray-700">Status:</span>
            <p class="text-gray-800">{{ $donor->is_active ? 'Ativo' : 'Inativo' }}</p>
        </div>
        @endif
    </div>

    <!-- Endereço -->
    @if($user->address)
    <div>
        <h3 class="text-lg font-semibold mb-2">Endereço</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @if($donor->address->zip)
            <div>
                <span class="font-medium text-gray-700">CEP:</span>
                <p class="text-gray-800">{{ $donor->address->zip }}</p>
            </div>
            @endif
            @if($donor->address->state)
            <div>
                <span class="font-medium text-gray-700">Estado:</span>
                <p class="text-gray-800">{{ $donor->address->state }}</p>
            </div>
            @endif
            @if($donor->address->city)
            <div>
                <span class="font-medium text-gray-700">Cidade:</span>
                <p class="text-gray-800">{{ $donor->address->city }}</p>
            </div>
            @endif
            @if($donor->address->neighborhood)
            <div>
                <span class="font-medium text-gray-700">Bairro:</span>
                <p class="text-gray-800">{{ $donor->address->neighborhood }}</p>
            </div>
            @endif
            @if($donor->address->road)
            <div>
                <span class="font-medium text-gray-700">Rua:</span>
                <p class="text-gray-800">{{ $donor->address->road }}</p>
            </div>
            @endif
            @if($donor->address->number)
            <div>
                <span class="font-medium text-gray-700">Número:</span>
                <p class="text-gray-800">{{ $donor->address->number }}</p>
            </div>
            @endif
            @if($donor->address->complement)
            <div class="col-span-1 md:col-span-2">
                <span class="font-medium text-gray-700">Complemento:</span>
                <p class="text-gray-800">{{ $donor->address->complement }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Botões -->
    <div class="flex justify-between mt-6">
        <x-button-link color='blue' href="{{ route('donors.index') }}">Voltar</x-button-link>
        <x-button-link href="{{ route('users.edit', $user->id) }}">Editar</x-button-link>
    </div>
</x-card>

@endsection