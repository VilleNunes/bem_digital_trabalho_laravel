@extends('backend.layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li>
        <li class="text-gray-700 font-semibold">Conteúdo</li>
        <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Listagem de Doadores</li>
    </ol>
</nav>

<div class="flex justify-end mb-3">
    <x-button-link :href="route('donors.create')">
        Cadastrar Doadores
    </x-button-link>
</div>

<div class="grid grid-cols-1  sm:grid-cols-1 md:grid-cols-4 gap-3 mb-5">
    <x-card-metrics value="{{ $totalDonor }}" color="green" label="Total de Doadores" />
</div>

@include('backend.donors.partials.filter')

<x-card>
    {{-- Tabela --}}
    @include('backend.partials.table',[
    "fields"=>['id','nome','email','CPF','Telefone'],
    "keys"=>['id','name','email','cpf','phone'],
    "items"=>$donors,
    "title"=>'Lista de Doadores',
    "edit"=>'donors.edit',
    "delete"=>'donors.destroy',
    "show"=>'donors.show',
    ])
</x-card>
@endsection