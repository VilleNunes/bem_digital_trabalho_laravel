<section class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
    <h2 class="text-gray-900 dark:text-white text-xl font-bold mb-4">Campanhas Ativas</h2>

    @php
    // CORREÇÃO: usar $institution em vez de $instituicao
    $campanhas = $institution->campaigns ?? [];
    @endphp

    @if($campanhas->count() > 0)
    <div class="flex flex-col gap-6">
        @foreach($campanhas as $campanha)
        <div class="flex flex-col sm:flex-row gap-4 border border-gray-200 dark:border-gray-700 p-4 rounded-lg">
            {{-- Placeholder com cor sólida --}}
            <div
                class="w-full sm:w-1/3 h-40 sm:h-auto bg-gray-300 dark:bg-gray-600 rounded-md flex items-center justify-center">
                <span class="text-gray-500 dark:text-gray-300 text-sm">Imagem da Campanha</span>
            </div>
            <div class="flex flex-col justify-between flex-1">
                <div>
                    <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200">{{ $campanha->name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $campanha->description }}</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                        De {{ \Carbon\Carbon::parse($campanha->beginning)->format('d/m/Y') }}
                        até {{ \Carbon\Carbon::parse($campanha->termination)->format('d/m/Y') }}
                    </p>
                    @if($campanha->phone)
                    <p class="text-xs text-gray-400 dark:text-gray-500">
                        📞 {{ $campanha->phone }} - {{ $campanha->legend_phone }}
                    </p>
                    @endif
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progresso da Campanha</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $campanha->mark ?? 0 }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2.5">
                        {{-- não tenho certeza mas preciso adicionar progress como caracteristicas de campaign par
                        funcionar aqui ne? --}}
                        <div class="bg-primary h-2.5 rounded-full progress-bar" style="--progress: %"></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-600 dark:text-gray-300">Nenhuma campanha ativa encontrada.</p>
    @endif
</section>