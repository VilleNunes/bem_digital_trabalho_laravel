@extends('backend.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

@if (session('success'))
    <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li>
            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:underline">Conteúdo</a>
        </li>
        <span class="mx-2">/</span>
        <li class="text-gray-700 font-semibold">Listagem de Doadores</li>
    </ol>
</nav>

<div class="flex justify-end mb-3">
    <x-button-link :href="route('donors.create')">
        Cadastrar Doador
    </x-button-link>
</div>

<div class="grid grid-cols-3 gap-3 mb-5">
    <x-card-metrics value="{{ $totalDonor }}" color="green" label="Total de Doadores" />
    <x-card-metrics value="{{ $donorActive }}" color="blue" label="Total de Doadores Ativos" />
    <x-card-metrics value="{{ $donorInactive }}" color="red" label="Total de Doadores Desativados" />
</div>

@include('backend.components.filter')

<x-card>
     @include('backend.components.table', [
        'fields' => ['id', 'nome', 'email', 'telefone'],
        'keys' => ['id', 'name', 'email', 'phone'],
        'items' => $donors,
        'title' => 'Lista de Doadores',
        'edit' => 'donors.edit',
        'delete' => 'donors.destroy',
        'show' => 'donors.show'
])

</x-card>
@endsection
