<section class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
    <h2 class="text-gray-900 dark:text-white text-xl font-bold mb-4">Depoimentos</h2>

    @php
    // Dados de exemplo para demonstração
    $depoimentos = [
    (object)[
    'texto' => 'A instituição fez um trabalho incrível na nossa comunidade. As doações chegaram a quem realmente precisava!',
    'autor' => 'Maria Silva',
    'avatar' => null
    ],
    (object)[
    'texto' => 'Transparência total no processo de doação. Sabemos exatamente onde nossos itens estão sendo utilizados.',
    'autor' => 'João Santos',
    'avatar' => null
    ]
    ];
    @endphp

    @if(count($depoimentos) > 0)
    <div class="space-y-6">
        @foreach($depoimentos as $dep)
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
            <blockquote class="text-gray-600 dark:text-gray-300 italic">"{{ $dep->texto }}"</blockquote>
            <cite class="mt-2 flex items-center gap-2 not-italic">
                <div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                    <span class="text-gray-500 dark:text-gray-300 text-xs">👤</span>
                </div>
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $dep->autor }}</span>
            </cite>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-600 dark:text-gray-300">Ainda não há depoimentos para esta instituição.</p>
    @endif
</section>