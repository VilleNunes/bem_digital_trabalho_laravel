@extends('frontend.layouts.app')

@section('title', 'Instituição Demo - Bem Digital')

@section('content')
@php
// Dados estáticos de exemplo - AGORA COM OBJETOS
$inst = (object)[
'id' => 1,
'fantasy_name' => 'Lar Esperança - Centro de Apoio à Criança',
'verificada' => true,
'logo_url' => null,
'description' => 'Organização sem fins lucrativos que atende crianças e adolescentes em situação de vulnerabilidade
social, oferecendo educação, alimentação e atividades culturais.',
'descricao_curta' => 'Apoio à crianças em situação de vulnerabilidade',
'cidade' => 'Maringá',
'estado' => 'PR',
'ano_fundacao' => 1998,
'tipo' => 'Organização Não Governamental',
'is_active' => true,
'campaigns' => [
(object)[
'name' => 'Campanha do Agasalho 2024',
'description' => 'Arrecadação de roupas de frio para o inverno',
'mark' => 64,
'beginning' => '2024-05-01',
'termination' => '2024-08-31',
'phone' => '(44) 3224-5678',
'legend_phone' => 'WhatsApp para doações'
],
(object)[
'name' => 'Material Escolar',
'description' => 'Doação de materiais para o ano letivo',
'mark' => 45,
'beginning' => '2024-01-15',
'termination' => '2024-12-15',
'phone' => '(44) 3224-5678',
'legend_phone' => 'Telefone fixo'
]
]
];
@endphp

<div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden group/design-root">

    {{-- Header Partial --}}
    @include('frontend.layouts.partials.header')

    {{-- Main --}}
    <main class="layout-container flex h-full grow flex-col items-center">
        <div class="layout-content-container flex flex-col w-full max-w-6xl flex-1 px-4 sm:px-6 py-8">

            {{-- Breadcrumbs --}}
            <div class="flex flex-wrap gap-2 px-4 pb-6">
                <a href="{{ url('/') }}" class="text-primary text-sm font-medium hover:underline">Início</a>
                <span class="text-gray-500">/</span>
                <a href="{{ route('institutions.index') }}"
                    class="text-primary text-sm font-medium hover:underline">Instituições</a>
                <span class="text-gray-500">/</span>
                <span class="text-gray-800 dark:text-gray-200 text-sm font-medium">{{ $inst->fantasy_name }}</span>
            </div>

            {{-- Header da Instituição --}}
            <div class="flex p-4">
                <div class="flex w-full flex-col gap-8 sm:flex-row sm:justify-between items-start">
                    <div class="flex flex-col sm:flex-row gap-6 w-full">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-xl shadow-md min-h-32 w-32"
                            style="background-image: url('{{ $inst->logo_url }}');">
                        </div>

                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <h1 class="text-gray-900 dark:text-white text-3xl font-bold">{{ $inst->fantasy_name }}
                                </h1>
                                @if(!empty($inst->verificada) && $inst->verificada)
                                <span class="material-symbols-outlined text-green-500"
                                    title="Instituição Verificada">verified</span>
                                @endif
                            </div>

                            <p class="text-gray-600 dark:text-gray-300">{{ $inst->description }}</p>

                            <p class="text-gray-500 dark:text-gray-400 text-sm">
                                {{ $inst->cidade }}{{ $inst->estado ? ', '.$inst->estado : '' }}
                                @if($inst->ano_fundacao)
                                - Fundada em {{ $inst->ano_fundacao }}
                                @endif
                                @if($inst->tipo)
                                - {{ $inst->tipo }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <button
                        class="flex items-center justify-center rounded-xl h-12 px-6 bg-primary text-white text-base font-bold hover:bg-primary/90 shadow-sm">
                        Fazer Doação
                    </button>
                </div>
            </div>

            {{-- Campanhas de Exemplo --}}
            <div class="p-4 mt-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Campanhas Ativas</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($inst->campaigns as $campanha)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $campanha->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $campanha->description }}</p>

                        {{-- Informações da campanha --}}
                        <div class="space-y-2 mb-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                📅 <strong>Período:</strong>
                                {{ \Carbon\Carbon::parse($campanha->beginning)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($campanha->termination)->format('d/m/Y') }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                📞 <strong>Contato:</strong> {{ $campanha->phone }} ({{ $campanha->legend_phone }})
                            </p>
                        </div>

                        {{-- Barra de progresso --}}
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-primary h-2.5 rounded-full progress-bar"
                                style="--progress: {{ $campanha->mark }}%"></div>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400 mt-2">
                            <span>{{ $campanha->mark }}% do objetivo alcançado</span>
                            <span>Meta: 100%</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Partials --}}
            @include('frontend.institution.partials.galeria', ['institution' => $inst])
            @include('frontend.institution.partials.depoimentos', ['institution' => $inst])
            @include('frontend.institution.partials.necessidades', ['institution' => $inst])
            @include('frontend.institution.partials.transparencia', ['institution' => $inst])


            {{-- Informações de Contato --}}
            <div class="p-4 mt-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Contato</h2>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Email:</strong> contato@laresperanca.org
                            </p>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Telefone:</strong> (44) 3224-5678</p>
                        </div>
                        <div>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Endereço:</strong> Rua das Flores, 123 -
                                Centro</p>
                            <p class="text-gray-600 dark:text-gray-300"><strong>Cidade:</strong> Maringá - PR</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- Footer Partial --}}
    @include('frontend.layouts.partials.footer')

</div>
@endsection

<style>
    .progress-bar {
        width: var(--progress, 0%);
        transition: width 0.5s ease-in-out;
        min-width: 0.5rem;
        /* Garante que sempre mostre algo */
        border-radius: 0.625rem;
        /* rounded-full equivalente */
    }
</style>