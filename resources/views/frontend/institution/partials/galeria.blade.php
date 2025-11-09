<section class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
    <h2 class="text-gray-900 dark:text-white text-xl font-bold mb-4">Galeria de Fotos</h2>

    @php
    $galeria = $institution->galeria ?? $institution->fotos ?? [];
    if(is_string($galeria)) {
    $galeria = json_decode($galeria, true) ?? [];
    }
    @endphp

    @if(!empty($galeria) && count($galeria) > 0)
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($galeria as $url)
        <div class="aspect-square bg-cover bg-center rounded-lg hover:scale-105 transition-transform duration-300" style="background-image: url('{{ $url }}')"></div>
        @endforeach
    </div>
    @else

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="aspect-square bg-blue-300 rounded-lg flex items-center justify-center text-blue-700">Foto 1</div>
        <div class="aspect-square bg-green-300 rounded-lg flex items-center justify-center text-green-700">Foto 2</div>
        <div class="aspect-square bg-yellow-300 rounded-lg flex items-center justify-center text-yellow-700">Foto 3</div>
        <div class="aspect-square bg-purple-300 rounded-lg flex items-center justify-center text-purple-700">Foto 4</div>
        <div class="aspect-square bg-red-300 rounded-lg flex items-center justify-center text-red-700">Foto 5</div>
        <div class="aspect-square bg-indigo-300 rounded-lg flex items-center justify-center text-indigo-700">Foto 6</div>
    </div>
    @endif
</section>