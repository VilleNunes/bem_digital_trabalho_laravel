@extends('backend.layouts.app')

@section('content')
@php
$userRole = $role ?? optional(auth()->user()->rule)->name;
$formattedAmount = 'R$ ' . number_format($totalAmount ?? 0, 2, ',', '.');
@endphp

<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li class="text-gray-700 font-semibold">Doações</li>
    </ol>
</nav>

@if ($userRole === 'admin')
<div class="flex justify-end mb-4">
    <x-button-link :href="route('donations.create')">
        Cadastrar Doação
    </x-button-link>
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <x-card-metrics value="{{ $donations->count() ?? 0 }}" label="Total de Doações" icon="fa-hand-holding-heart"
        color="green" />
</div>

<x-card>
    @include('backend.donations.partials.table', [
    'donations' => $donations,
    'userRole' => $userRole,
    ])
</x-card>
@endsection