@extends('backend.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
    <nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li class="text-gray-700 font-semibold">Conteúdo</li>
            <span class="mx-2">/</span>
            <li class="text-gray-700 font-semibold">Listagem de Instituições</li>
        </ol>
    </nav>

    <div class="flex items-center justify-between mb-3">
        <form method="GET" action="{{ route('institutions.index') }}" class="flex gap-2">
            <input type="text" name="q" value="{{ $query }}" placeholder="Buscar por nome, e-mail, CNPJ ou telefone" class="border border-gray-300 bg-white text-gray-700 rounded px-3 py-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-verde focus:border-verde transition w-80" />
            <x-button color="link">Buscar</x-button>
            @if($query)
                <a href="{{ route('institutions.index') }}" class="text-sm underline text-gray-500">Limpar</a>
            @endif
        </form>

        @if(Route::has('institutions.create'))
            <x-button-link color="link" :href="route('institutions.create')">
                <i class="fa-solid fa-plus"></i> Cadastrar Instituição
            </x-button-link>
        @endif
    </div>

    <x-card>
        {{-- Tabela no mesmo padrão do users --}}
        @include('backend.partials.table', [
            "fields" => ['id', 'Nome Fantasia', 'CNPJ', 'Telefone', 'Email'],
            "keys" => ['id', 'fantasy_name', 'cnpj', 'phone', 'email'],
            "items" => $institutions,
            "title" => 'Lista de Instituições',
            "edit" => 'institutions.edit',
            "delete" => 'institutions.destroy',
            "active" => 'institutions.active'
            // Se você tiver rota de ativação, pode passar "active" => 'institutions.active'
        ])
    </x-card>
@endsection
