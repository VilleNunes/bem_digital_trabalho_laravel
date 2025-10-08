@extends('backend.layouts.app')


@section('content')
    <x-card>
        {{-- Tabela --}}
        @include('backend.partials.table',[
            "fields"=>['id','nome','email','Telefone'],
            "keys"=>['id','name','email','phone'],
            "items"=>$users,
            "title"=>'Lista de Usuarios',
        ])
    </x-card>
@endsection