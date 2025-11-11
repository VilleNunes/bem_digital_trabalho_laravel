@extends('frontend.layouts.app')

@section('content')
@include('frontend.layouts.partials.header')
@include('frontend.layouts.partials.carousel')
<section class="min-h-screen  py-12 px-6 max-w-screen-2xl mx-auto " id="campanhas">
    <h1 class="text-4xl font-bold text-green-700 my-20 ">Campanhas em Destaques</h1>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 ">

        @forelse($campaigns as $campaign)
        <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-xl transition-all duration-200">
            <img src="{{ asset($campaign->photos->first()->filename ?? "") }}" alt="{{ $campaign->name }}"
                class="w-full h-64 object-cover">

            <div class="p-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $campaign->title }}</h2>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($campaign->description, 100) }}</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span>Início: {{ \Carbon\Carbon::parse($campaign->beginning)->format('d/m/Y') }}</span>
                    <span>Fim: {{ \Carbon\Carbon::parse($campaign->termination)->format('d/m/Y') }}</span>
                </div>
                <a href="{{ route('campaign.show.public',$campaign) }}"
                    class="mt-4 block text-center w-32 bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-1 rounded transition-colors">
                    Ver Detalhes
                </a>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500 col-span-full">Nenhuma campanha ativa no momento.</p>
        @endforelse

    </div>
    <div class=" mt-10">
        {{ $campaigns->links() }}
    </div>
</section>

@include('frontend.layouts.partials.footer')
@endsection