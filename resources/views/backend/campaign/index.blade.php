@extends('backend.layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li>
        <li class="text-gray-700 font-semibold">Conteúdo</li>
        <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Listagem de Campanhas</li>
    </ol>
</nav>

<div class="flex justify-end mb-3">
    <x-button-link :href="route('campaign.create')">
        Cadastrar Campanha
    </x-button-link>
</div>

<div class="grid grid-cols-1  sm:grid-cols-1 md:grid-cols-4 gap-3 mb-5">

</div>

@include('backend.campaign.partials.filter')


<x-card>
    {{-- Tabela --}}
    @include('backend.partials.table',[
    "fields"=>['id','nome','Data Inicial','Data Final'],
    "keys"=>['id','name','beginning','termination'],
    "items"=>$campaigns,
    "title"=>'Lista de Campanhas',
    "edit"=>'campaign.edit',
    "active"=>'campaign.active',
    "photo"=>'campaign.photoUpload'
    ])
</x-card>
@endsection