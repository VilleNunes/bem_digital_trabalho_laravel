@extends('backend.layouts.app')


@section('content')
    <h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
    <nav class="text-sm text-gray-500 mb-5" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li>
            <li class="text-gray-700 font-semibold">Conteúdo</li>
            <span class="mx-2">/</span>
            </li>
            <li class="text-gray-700 font-semibold">Listagem de Usuários</li>
        </ol>
    </nav>
    
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