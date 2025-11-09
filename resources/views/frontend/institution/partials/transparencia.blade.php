<section class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
    <h2 class="text-gray-900 dark:text-white text-lg font-bold">Transparência</h2>

    @php
        $relatorios = $instituicao->relatorios ?? $instituicao->relatorio ?? null;
        if(is_string($relatorios)) {
            $relatorios = json_decode($relatorios, true) ?? $relatorios;
        }
    @endphp

    @if(!empty($relatorios))
        <div class="mt-4 space-y-2">
            @if(is_array($relatorios))
                @foreach($relatorios as $rel)
                    @php
                        $titulo = is_array($rel) ? ($rel['titulo'] ?? 'Relatório') : ($rel->titulo ?? 'Relatório');
                        $url = is_array($rel) ? ($rel['url'] ?? '#') : ($rel->url ?? '#');
                    @endphp
                    <a href="{{ $url }}" target="_blank" rel="noopener" class="flex items-center justify-between gap-2 p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="font-medium text-gray-700 dark:text-gray-200">{{ $titulo }}</span>
                        <span class="material-symbols-outlined text-primary">download</span>
                    </a>
                @endforeach
            @else
                <a href="{{ $relatorios }}" target="_blank" rel="noopener" class="mt-4 flex w-full items-center justify-center gap-2 overflow-hidden rounded-lg h-10 px-4 bg-primary/10 text-primary text-sm font-bold hover:bg-primary/20">
                    <span class="material-symbols-outlined text-base">download</span>
                    <span>Baixar Relatório</span>
                </a>
            @endif
        </div>
    @else
        <p class="text-gray-600 dark:text-gray-300 mt-4">Nenhum relatório disponível.</p>
    @endif
</section>