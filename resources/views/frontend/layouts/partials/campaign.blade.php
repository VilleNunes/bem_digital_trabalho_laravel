@extends('frontend.layouts.app')

@section('content')
@include('frontend.layouts.partials.header')

<section class="min-h-screen bg-gray-50 py-16 px-6">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
        <div class="grid md:grid-cols-2">

            <div class="relative w-full overflow-hidden">
                <div class="flex transition-transform duration-700" id="carouselInner">
                    @if($campaign->photos && $campaign->photos->count() > 0)
                    @foreach($campaign->photos as $photo)
                    <img src="{{ asset($photo->filename) }}"
                        alt="Imagem da campanha {{ $campaign->name }}"
                        class="w-full h-96 object-cover flex-shrink-0">
                    @endforeach
                    @else
                    <img src="{{ asset('campanha1.jpg') }}"
                        alt="Imagem padrão da campanha"
                        class="w-full h-96 object-cover flex-shrink-0">
                    @endif
                </div>

                <button id="prevBtn"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-3 py-2 rounded-r-lg hover:bg-opacity-70">
                    ‹
                </button>
                <button id="nextBtn"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-3 py-2 rounded-l-lg hover:bg-opacity-70">
                    ›
                </button>
            </div>

            <!-- Informações da Campanha -->
            <div class="p-8 flex flex-col justify-center">
                <h1 class="text-3xl font-bold text-green-700 mb-4">{{ $campaign->name }}</h1>
                <p class="text-gray-700 leading-relaxed mb-6">{{ $campaign->description }}</p>

                <div class="space-y-2 mb-6 text-gray-700">
                    <p><span class="font-semibold">Instituição:</span> {{ $campaign->institution->fantasy_name ?? 'Não informada' }}</p>
                    <p><span class="font-semibold">Categoria:</span> {{ $campaign->category->name ?? 'Não informada' }}</p>
                    <p><span class="font-semibold">Período:</span>
                        {{ \Carbon\Carbon::parse($campaign->beginning)->format('d/m/Y') }} —
                        {{ \Carbon\Carbon::parse($campaign->termination)->format('d/m/Y') }}
                    </p>
                </div>

                <div class="border-t border-gray-200 pt-4 text-gray-700">
                    <p><span class="font-semibold">Contato:</span> {{ $campaign->phone }}</p>
                    <p class="text-sm text-gray-500">{{ $campaign->legend_phone }}</p>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $campaign->phone) }}"
                        target="_blank"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-6 rounded-lg transition">
                        Entrar em Contato
                    </a>
                    <a href="{{ route('frontend.campaigns') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2.5 px-6 rounded-lg transition">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const carousel = document.getElementById('carouselInner');
    const slides = carousel.children;
    let index = 0;

    document.getElementById('prevBtn').onclick = () => move(-1);
    document.getElementById('nextBtn').onclick = () => move(1);

    function move(direction) {
        index = (index + direction + slides.length) % slides.length;
        carousel.style.transform = `translateX(-${index * 100}%)`;
    }
</script>

@include('frontend.layouts.partials.footer')
@endsection
