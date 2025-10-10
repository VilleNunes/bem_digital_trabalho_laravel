@extends('backend.layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Resumo</h1>
        <input type="date" class="border rounded-lg px-3 py-2 text-sm" />
    </div>

    <!-- Grid principal -->
    <div class="grid grid-cols-12 gap-6">
        <!-- Gráfico de doações -->
        <div class="col-span-8">
            @include('backend.partials.charts.grafico_doacoes')
        </div>

        <!-- Gráfico de metas -->
        <div class="col-span-4">
            @include('backend.partials.charts.grafico_metas')
        </div>

        <!-- Cards inferiores -->
        <div class="col-span-4">
            @include('backend.partials.cards.total')
        </div>
        <div class="col-span-4">
            @include('backend.partials.cards.top_ongs')
        </div>
        <div class="col-span-4">
            @include('backend.partials.cards.top_doadores')
        </div>
        <div class="col-span-12">
            @include('backend.partials.cards.visitantes')
        </div>
    </div>
</div>
@endsection
