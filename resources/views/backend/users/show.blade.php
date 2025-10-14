@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Detalhes do Usuário</h1>

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
    <h2 class="text-xl font-semibold mb-4">Informações do Usuário</h2>

    <!-- Dados principais -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <span class="font-medium text-gray-700">Nome:</span>
            <p class="text-gray-800">{{ $user->name }}</p>
        </div>
        <div>
            <span class="font-medium text-gray-700">Email:</span>
            <p class="text-gray-800">{{ $user->email }}</p>
        </div>

        @if($user->phone)
        <div>
            <span class="font-medium text-gray-700">Telefone:</span>
            <p class="text-gray-800">{{ $user->phone }}</p>
        </div>
        @endif

        @if($user->is_active !== null)
        <div>
            <span class="font-medium text-gray-700">Status:</span>
            <p class="text-gray-800">{{ $user->is_active ? 'Ativo' : 'Inativo' }}</p>
        </div>
        @endif
    </div>

    <!-- Endereço -->
    @if($user->address)
    <div>
        <h3 class="text-lg font-semibold mb-2">Endereço</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @if($user->address->zip)
            <div>
                <span class="font-medium text-gray-700">CEP:</span>
                <p class="text-gray-800">{{ $user->address->zip }}</p>
            </div>
            @endif
            @if($user->address->state)
            <div>
                <span class="font-medium text-gray-700">Estado:</span>
                <p class="text-gray-800">{{ $user->address->state }}</p>
            </div>
            @endif
            @if($user->address->city)
            <div>
                <span class="font-medium text-gray-700">Cidade:</span>
                <p class="text-gray-800">{{ $user->address->city }}</p>
            </div>
            @endif
            @if($user->address->neighborhood)
            <div>
                <span class="font-medium text-gray-700">Bairro:</span>
                <p class="text-gray-800">{{ $user->address->neighborhood }}</p>
            </div>
            @endif
            @if($user->address->road)
            <div>
                <span class="font-medium text-gray-700">Rua:</span>
                <p class="text-gray-800">{{ $user->address->road }}</p>
            </div>
            @endif
            @if($user->address->number)
            <div>
                <span class="font-medium text-gray-700">Número:</span>
                <p class="text-gray-800">{{ $user->address->number }}</p>
            </div>
            @endif
            @if($user->address->complement)
            <div class="col-span-1 md:col-span-2">
                <span class="font-medium text-gray-700">Complemento:</span>
                <p class="text-gray-800">{{ $user->address->complement }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Botões -->
    <div class="flex justify-between mt-6">
        <x-button-link color='blue' href="{{ route('users.index') }}">Voltar</x-button-link>
        <x-button-link href="{{ route('users.edit', $user->id) }}">Editar</x-button-link>
    </div>
</x-card>

@endsection