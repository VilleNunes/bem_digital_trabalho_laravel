@php
$headers = [
'ID',
'Tipo',
'Doação',
'Doador/Receptor',
'Campanha',
'Instituição',
'Quantidade',
'Registrada em',
];
@endphp

<div class="overflow-x-auto">
    <p class="py-3 text-md text-gray-700 font-semibold">Lista de Doações</p>

    <table class="hidden md:table min-w-full divide-y divide-gray-200 border border-gray-200">
        <thead class="bg-white">
            <tr>
                @foreach ($headers as $header)
                <th class="px-6 py-3 text-left text-md font-bold text-gray-700">{{ $header }}</th>
                @endforeach
                <th class="px-6 py-3 text-center text-md font-bold text-gray-700">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-[12px] text-gray-800">
            @forelse ($donations as $donation)
            <tr class="hover:bg-gray-50 transition-colors even:bg-gray-50 odd:bg-gray-100">
                <td class="px-6 py-2">{{ $donation->id }}</td>
                <td class="px-6 py-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $donation->isEntrada() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $donation->type_formatted }}
                    </span>
                </td>
                <td class="px-6 py-2">{{ $donation->name }}</td>
                <td class="px-6 py-2">
                    @if($donation->isEntrada())
                        {{ $donation->user->name ?? '-' }}
                    @else
                        {{ $donation->recipient_name ?? '-' }}
                    @endif
                </td>
                <td class="px-6 py-2">{{ optional($donation->campaign)->name ?? '-' }}</td>
                <td class="px-6 py-2">{{ optional($donation->campaign?->institution)->fantasy_name ?? '-' }}</td>
                <td class="px-6 py-2">{{ $donation->quantify ?? '-' }}</td>
                <td class="px-6 py-2">
                    {{ optional($donation->created_at)->format('d/m/Y H:i') }}
                </td>
                <td class="px-6 py-2 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('donations.show', $donation) }}"
                            class="px-3 py-1 bg-gray-300 text-gray-800 hover:bg-gray-200 rounded text-xs">Detalhes</a>

                        @if ($userRole === 'admin')
                        <a href="{{ route('donations.edit', $donation) }}"
                            class="px-3 py-1 bg-blue-500 text-white hover:bg-blue-600 rounded text-xs">Editar</a>

                        <form action="{{ route('donations.destroy', $donation) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir esta doação?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-500 text-white hover:bg-red-600 rounded text-xs">Excluir</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="{{ count($headers) + 1 }}" class="px-6 py-4 text-center text-gray-600">
                    Nenhuma doação encontrada.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="md:hidden space-y-4">
        @forelse ($donations as $donation)
        <div class="bg-white p-4 border border-gray-200 rounded-lg shadow-sm space-y-2">
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Tipo:</span>
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $donation->isEntrada() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $donation->type_formatted }}
                </span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Doação:</span>
                <span class="text-gray-800">{{ $donation->name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">{{ $donation->isEntrada() ? 'Doador:' : 'Receptor:' }}</span>
                <span class="text-gray-800">
                    @if($donation->isEntrada())
                        {{ $donation->user->name ?? '-' }}
                    @else
                        {{ $donation->recipient_name ?? '-' }}
                    @endif
                </span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Campanha:</span>
                <span class="text-gray-800">{{ optional($donation->campaign)->name ?? '-' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Instituição:</span>
                <span class="text-gray-800">{{ optional($donation->campaign?->institution)->fantasy_name ?? '-'
                    }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Quantidade:</span>
                <span class="text-gray-800">{{ $donation->quantify ?? '-' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Valor:</span>
                <span class="text-gray-800">
                    {{ $donation->amount !== null ? 'R$ ' . number_format($donation->amount, 2, ',', '.') : '-' }}
                </span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-600">Registrada em:</span>
                <span class="text-gray-800">{{ optional($donation->created_at)->format('d/m/Y H:i') }}</span>
            </div>

            <div class="flex justify-start gap-2 pt-2">
                <a href="{{ route('donations.show', $donation) }}"
                    class="px-3 py-1 bg-gray-300 text-gray-800 hover:bg-gray-200 rounded text-xs">Detalhes</a>

                @if ($userRole === 'admin')
                <a href="{{ route('donations.edit', $donation) }}"
                    class="px-3 py-1 bg-blue-500 text-white hover:bg-blue-600 rounded text-xs">Editar</a>

                <form action="{{ route('donations.destroy', $donation) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir esta doação?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-3 py-1 bg-red-500 text-white hover:bg-red-600 rounded text-xs">Excluir</button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <div class="bg-white p-4 border border-gray-200 rounded-lg shadow-sm text-center text-gray-600">
            Nenhuma doação encontrada.
        </div>
        @endforelse
    </div>

    <div class="flex justify-end mt-4 space-x-1">
        @if ($donations->onFirstPage())
        <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Anterior</span>
        @else
        <a href="{{ $donations->previousPageUrl() }}"
            class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">Anterior</a>
        @endif

        @foreach ($donations->getUrlRange(1, $donations->lastPage()) as $page => $url)
        @if ($page == $donations->currentPage())
        <span class="px-3 py-1 bg-blue-500 text-white rounded">{{ $page }}</span>
        @else
        <a href="{{ $url }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">{{ $page }}</a>
        @endif
        @endforeach

        @if ($donations->hasMorePages())
        <a href="{{ $donations->nextPageUrl() }}"
            class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">Próximo</a>
        @else
        <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Próximo</span>
        @endif
    </div>
</div>