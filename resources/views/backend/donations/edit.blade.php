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
        <li class="text-gray-700 font-semibold">Editar Doação</li>
    </ol>
</nav>

<x-card>
    <form action="{{ route('donations.update', $donation) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        @include('backend.donations.partials.form', [
            'donation' => $donation,
            'donors' => $donors,
            'campaigns' => $campaigns,
            'estoque' => $estoque ?? 0,
        ])

        <div class="flex justify-end gap-3">
            <x-button-link color="link" :href="route('donations.index')">
                Cancelar
            </x-button-link>
            <x-button color="green">
                Atualizar Doação
            </x-button>
        </div>
    </form>
</x-card>
@endsection
