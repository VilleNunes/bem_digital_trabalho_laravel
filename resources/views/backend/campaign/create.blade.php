@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Campanhas</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Criar Campanhas</li>
    </ol>
</nav>

<x-card x-data="{ abaAtiva: 'campanha' }">
    <!-- Tabs -->
    <div class="flex border-b mb-6">
        <button class="px-4 py-2 -mb-px border-b-2 font-semibold"
            :class="abaAtiva === 'campanha' ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500'"
            @click="abaAtiva = 'campanha'">
            Campanha
        </button>
        <button class="px-4 py-2 -mb-px border-b-2 font-semibold"
            :class="abaAtiva === 'ponto' ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500'"
            @click="abaAtiva = 'ponto'">
            Ponto de Coleta
        </button>
    </div>

    <form action="{{ route('campaign.store') }}" method="post" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Aba Campanha -->
        @include('backend.campaign.partials.form-campaign')

        <!-- Aba Ponto de Coleta -->
        @include('backend.campaign.partials.collection-points')

    </form>
</x-card>

@endsection