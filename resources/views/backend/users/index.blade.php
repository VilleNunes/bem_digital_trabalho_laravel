@extends('backend.layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li>
        <li class="text-gray-700 font-semibold">Conteúdo</li>
        <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Listagem de Usuários</li>
    </ol>
</nav>

<div class="flex justify-end mb-3">
    <x-button-link :href="route('users.create')">
        Cadastrar Usuário
    </x-button-link>
</div>

<div class="grid grid-cols-1  sm:grid-cols-1 md:grid-cols-4 gap-3 mb-5">
    <x-card-metrics value="{{ $totalUser }}" color="green" label="Total de Usuários" />
    <x-card-metrics value="{{ $userActive }}" color="blue" label="Total de Usuários Ativos" />
    <x-card-metrics value="{{ $userInactive }}" color="red" label="Total de Usuarios Desativados" />
</div>

@include('backend.users.partials.filter')

<x-card>
    {{-- Tabela --}}
    @include('backend.partials.table',[
    "fields"=>['id','nome','email','Telefone'],
    "keys"=>['id','name','email','phone'],
    "items"=>$users,
    "title"=>'Lista de Usuarios',
    "edit"=>'users.edit',
    "delete"=>'users.destroy',
    "show"=>'users.show',
    "active"=>'users.active'
    ])
</x-card>
@endsection