@extends('frontend.layouts.app')

@section('content')
@include('frontend.layouts.partials.header')

<section class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
        <div class="grid md:grid-cols-2">

            <!-- Carrossel -->
            <div id="campaignCarousel" class="relative w-full overflow-hidden">
                <div class="flex transition-transform duration-700" id="carouselInner">
                    <img src="https://placehold.co/600x400?text={{ urlencode($campaign->name) }}" class="w-full object-cover" alt="Imagem da campanha">
                    <img src="https://placehold.co/600x400/eee/333?text=Solidariedade" class="w-full object-cover" alt="Imagem 2">
                </div>

                
                <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-3 py-2 rounded-r-lg">‹</button>
                <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-3 py-2 rounded-l-lg">›</button>
            </div>

            <!-- Detalhes -->
            <div class="p-8">
                <h2 class="text-3xl font-bold text-green-700 mb-4">{{ $campaign->name }}</h2>
                <p class="text-gray-700 mb-6">{{ $campaign->description }}</p>

                <div class="space-y-2 mb-4">
                    <p><strong>Instituição:</strong> {{ $campaign->institution->name ?? 'Não informada' }}</p>
                    <p><strong>Categoria:</strong> {{ $campaign->category->name ?? 'Não informada' }}</p>
                    <p><strong>Período:</strong>
                        {{ \Carbon\Carbon::parse($campaign->beginning)->format('d/m/Y') }} —
                        {{ \Carbon\Carbon::parse($campaign->termination)->format('d/m/Y') }}
                    </p>
                </div>

                <div class="mt-4">
                    <p><strong>Contato:</strong> {{ $campaign->phone }}</p>
                    <p class="text-sm text-gray-500">{{ $campaign->legend_phone }}</p>
                </div>

                <div class="mt-6">
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $campaign->phone) }}" target="_blank"
                       class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                        Entrar em contato
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
