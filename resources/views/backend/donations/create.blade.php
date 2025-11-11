@extends('backend.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('donations.index') }}" class="text-blue-600 hover:underline">Doações</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Cadastrar Doação</li>
    </ol>
</nav>
@if(isset($campaignId) && $campaignId)
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <x-card-metrics value="{{ $estoque ?? 0 }}" label="Estoque Disponível" icon="fa-box" color="{{ ($estoque ?? 0) > 0 ? 'blue' : 'red' }}" />
</div>
@endif

<x-card>
    <form action="{{ route('donations.store') }}" method="POST" class="space-y-6">
        @csrf

        @include('backend.donations.partials.form', [
        'donation' => null,
        'donors' => $donors,
        'campaigns' => $campaigns,
        ])

        <div class="flex justify-end gap-3">
            <x-button-link color="link" :href="route('donations.index')">
                Cancelar
            </x-button-link>
            <x-button color="green">
                Salvar Doação
            </x-button>
        </div>
    </form>
</x-card>
@endsection