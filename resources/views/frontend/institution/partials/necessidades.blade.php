<section class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
    <h2 class="text-gray-900 dark:text-white text-lg font-bold">Necessidades Atuais</h2>

    @php
        $necessidades = $instituicao->necessidades ?? $instituicao->necessidade ?? [];
        if(is_string($necessidades)) {
            $necessidades = json_decode($necessidades, true) ?? [];
        }
    @endphp

    @if(!empty($necessidades) && count($necessidades) > 0)
        <ul class="mt-4 space-y-3">
            @foreach($necessidades as $item)
                @php
                    if(is_array($item)) {
                        $nome = $item['nome'] ?? ($item[0] ?? '');
                        $quant = $item['quantidade'] ?? $item['qtd'] ?? null;
                    } else {
                        $nome = $item->nome ?? (string) $item;
                        $quant = $item->quantidade ?? null;
                    }
                @endphp
                <li class="flex items-center gap-3 text-sm text-gray-700 dark:text-gray-300">
                    <span class="material-symbols-outlined text-primary">inventory_2</span>
                    {{ $nome }} @if($quant) ({{ $quant }}) @endif
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600 dark:text-gray-300">Nenhuma necessidade listada no momento.</p>
    @endif
</section>