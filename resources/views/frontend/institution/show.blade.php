@extends('frontend.layouts.app')

@section('title', 'Perfil da Instituição - Bem Digital')

@section('content')
@php
$inst = $institution ?? null;
$nome = $inst ? ($inst->fantasy_name ?? 'Instituição') : 'Instituição';
$descricao = $inst ? ($inst->description ?? 'Descrição não disponível') : 'Descrição não disponível';
$cidade = $inst && $inst->address ? ($inst->address->city ?? '') : '';
$estado = $inst && $inst->address ? ($inst->address->state ?? '') : '';
$verificada = $inst ? ($inst->is_active ?? false) : false;
@endphp

<div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden group/design-root">

    {{-- Header Partial --}}
    @include('frontend.layouts.partials.header')

    {{-- Main --}}
    <main class="layout-container flex h-full grow flex-col items-center">
        <div class="layout-content-container flex flex-col w-full max-w-6xl flex-1 px-4 sm:px-6 py-8">

            @if(!$inst)
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm">
                <p class="text-gray-700 dark:text-gray-300">Instituição não encontrada.</p>
            </div>
            @else
            {{-- Breadcrumbs --}}
            <div class="flex flex-wrap gap-2 px-4 pb-6">
                <a href="{{ route('home') }}" class="text-primary text-sm font-medium hover:underline">Início</a>
                <span class="text-gray-500">/</span>
                <a href="#instituicoes" class="text-primary text-sm font-medium hover:underline">Instituições</a>
                <span class="text-gray-500">/</span>
                <span class="text-gray-800 dark:text-gray-200 text-sm font-medium">{{ $nome }}</span>
            </div>

            {{-- Header da Instituição --}}
            <div class="flex p-4">
                <div class="flex w-full flex-col gap-8 sm:flex-row sm:justify-between items-start">
                    <div class="flex flex-col sm:flex-row gap-6 w-full">
                        {{-- Logo com cor sólida --}}
                        <div class="bg-gray-300 dark:bg-gray-700 aspect-square rounded-xl shadow-md min-h-32 w-32 flex items-center justify-center">
                            <span class="text-gray-500 dark:text-gray-300 text-xs text-center">Logo<br>Indisponível</span>
                        </div>

                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <h1 class="text-gray-900 dark:text-white text-3xl font-bold">{{ $nome }}</h1>
                                @if($verificada)
                                <span class="material-symbols-outlined text-green-500" title="Instituição Verificada">verified</span>
                                @endif
                            </div>

                            <p class="text-gray-600 dark:text-gray-300">{{ $descricao }}</p>

                            <p class="text-gray-500 dark:text-gray-400 text-sm">
                                {{ $cidade }}{{ $estado ? ', '.$estado : '' }}
                            </p>

                            {{-- Informações de contato --}}
                            <div class="flex flex-col gap-1 text-sm text-gray-500 dark:text-gray-400 mt-2">
                                @if($inst->email)
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">mail</span>
                                    <span>{{ $inst->email }}</span>
                                </div>
                                @endif
                                @if($inst->phone)
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">call</span>
                                    <span>{{ $inst->phone }}</span>
                                </div>
                                @endif
                                @if($inst->cnpj)
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">business</span>
                                    <span>CNPJ: {{ $inst->cnpj }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <a href="#" class="flex items-center">
                        <button class="flex items-center justify-center rounded-xl h-12 px-6 bg-primary text-white text-base font-bold hover:bg-primary/90 shadow-sm">
                            Fazer Doação
                        </button>
                    </a>
                </div>
            </div>

            {{-- Partials --}}
            @include('frontend.institution.partials.campanhas', ['institution' => $inst])
            @include('frontend.institution.partials.galeria', ['institution' => $inst])
            @include('frontend.institution.partials.depoimentos', ['institution' => $inst])
            @include('frontend.institution.partials.contatos', ['institution' => $inst])
            @include('frontend.institution.partials.necessidades', ['institution' => $inst])
            @include('frontend.institution.partials.transparencia', ['institution' => $inst])

            @endif

        </div>
    </main>

    {{-- Footer Partial --}}
    @include('frontend.layouts.partials.footer')

</div>
@endsection