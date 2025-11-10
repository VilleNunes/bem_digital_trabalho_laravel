@extends('frontend.layouts.app')

@section('content')
@include('frontend.layouts.partials.header')

<section class="min-h-screen bg-gray-50 py-12 px-6" id="campanhas">
    <h1 class="text-3xl font-bold text-green-700 mb-10 text-center">Campanhas Ativas</h1>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @forelse($campaigns as $campaign)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-200">
            <img src="{{ asset('exemplo.jpg') }}" alt="{{ $campaign->name }}" class="w-full h-48 object-cover">

            <div class="p-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $campaign->title }}</h2>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($campaign->description, 100) }}</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span>Início: {{ \Carbon\Carbon::parse($campaign->beginning)->format('d/m/Y') }}</span>
                    <span>Fim: {{ \Carbon\Carbon::parse($campaign->termination)->format('d/m/Y') }}</span>
                </div>
                <a href="{{ route('frontend.campaigns.show', $campaign->id) }}"
                    class="mt-4 block text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-colors">
                    Ver Detalhes
                </a>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500 col-span-full">Nenhuma campanha ativa no momento.</p>
        @endforelse

    </div>
</section>

@include('frontend.layouts.partials.footer')
@endsection
