@extends('backend.layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Resumo</h1>
        <div class="relative">
            <input type="date" class="w-full border border-salmao-dark bg-gelo text-salmao-dark
           rounded-lg pl-10 pr-3 py-2 text-sm focus:outline-none
           focus:ring-2 focus:ring-verde focus:border-verde transition" />
            <span class="absolute left-3 top-1.5 text-salmao-dark">
                📅
            </span>
        </div>

    </div>
    <!-- Grid principal: duas áreas (doações ocupa 2/3 e metas 1/3 em md+) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Gráfico de doações (ocupa 2 colunas em md+) -->
        <div class="bg-white rounded-2xl p-4 shadow-sm md:col-span-2">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Gráfico de número de doações (período)
            </h3>
            @include('backend.partials.charts.grafico_doacoes')
        </div>
        <!-- Gráfico de metas -->
        <div class="bg-white rounded-2xl p-4 shadow-sm flex flex-col items-center justify-center md:col-span-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Metas (%)</h3>
            @include('backend.partials.charts.grafico_metas')
        </div>
    </div>

    <!-- Cards inferiores: grid responsiva (1 / 2 / 4 colunas) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div>
            @include('backend.partials.cards.total')
        </div>
        <div>
            @include('backend.partials.cards.top_ongs')
        </div>
        <div>
            @include('backend.partials.cards.top_doadores')
        </div>
        <div>
            @include('backend.partials.cards.visitantes')
        </div>
    </div>
</div>
</div>
@endsection