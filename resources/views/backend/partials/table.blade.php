<div class="overflow-x-auto">
    <!-- Título -->
    <p class="py-3 text-md text-gray-700 font-semibold">{{ $title }}</p>

    <!-- ======================== -->
    <!-- TABELA (DESKTOP) -->
    <!-- ======================== -->
    <table class="hidden md:table min-w-full border border-gray-200 divide-y divide-gray-200">
        <thead class="bg-white">
            <tr>
                @foreach ($fields as $field)
                    <th class="px-6 py-3 text-left text-md font-bold text-gray-700">
                        {{ ucfirst($field) }}
                    </th>
                @endforeach

                @if (isset($active))
                    <th class="px-6 py-3 text-left text-md font-bold text-gray-700">Ativo</th>
                @endif

                <th class="px-6 py-3 text-center text-md font-bold text-gray-700">Ações</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 text-[13px] text-gray-800">
            @foreach ($items as $item)
                <tr class="even:bg-gray-50 odd:bg-gray-100 hover:bg-gray-50 transition-colors">
                    <!-- Campos -->
                    @foreach ($keys as $key)
                        <td class="px-6 py-2 truncate max-w-xs" title="{{ $item[$key] }}">
                            {{ $item[$key] ?? '-' }}
                        </td>
                    @endforeach

                    <!-- Coluna Ativo -->
                    @if (isset($active))
                        <td class="px-6 py-2 align-middle">
                            <form action="{{ route($active, $item) }}" method="POST"
                                  x-data="{ enabled: {{ $item->is_active ? 'true' : 'false' }} }">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="active" :value="enabled ? 1 : 0">

                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="enabled" @change="$el.form.submit()" class="sr-only">
                                    <div :class="enabled ? 'bg-blue-600' : 'bg-gray-200'"
                                         class="w-11 h-6 rounded-full transition-all"></div>
                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-transform"
                                         :class="{ 'translate-x-full': enabled }"></div>
                                </label>
                            </form>
                        </td>
                    @endif

                    <!-- Coluna Ações -->
                    <td class="px-6 py-2 text-center">
                        <div x-data="{
                                open: false,
                                x: 0,
                                y: 0,
                                toggle(e) {
                                    const rect = e.currentTarget.getBoundingClientRect();
                                    this.x = rect.right - 160;
                                    this.y = rect.bottom;
                                    this.open = !this.open;
                                },
                                close() { this.open = false }
                            }" class="relative inline-block">
                            <button @click="toggle($event)"
                                    class="px-4 py-2 bg-gray-300 text-gray-800 hover:bg-gray-200 rounded flex items-center gap-2 text-sm">
                                Ações
                                <i class="fa-solid fa-angle-down"></i>
                            </button>

                            <!-- Dropdown -->
                            <template x-teleport="body">
                                <div x-show="open" x-cloak x-transition @click.outside="close()"
                                     :style="`position:fixed; left:${x}px; top:${y}px;`"
                                     class="w-36 bg-white border border-gray-200 text-gray-800 text-sm flex flex-col shadow-lg z-50 rounded">
                                    @if (isset($edit))
                                        <a href="{{ route($edit, $item) }}" class="block px-4 py-2 hover:bg-gray-100">Editar</a>
                                    @endif

                                    @if (isset($delete))
                                        <form action="{{ route($delete, $item) }}" method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este item?');"
                                              class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">Excluir</button>
                                        </form>
                                    @endif

                                    @if (isset($show))
                                        <a href="{{ route($show, $item) }}" class="block px-4 py-2 hover:bg-gray-100">Ver</a>
                                    @endif

                                    @if (isset($photo))
                                        <a href="{{ route($photo, $item) }}" class="block px-4 py-2 hover:bg-gray-100">Fotos</a>
                                    @endif
                                </div>
                            </template>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ======================== -->
    <!-- CARDS (MOBILE) -->
    <!-- ======================== -->
    <div class="md:hidden space-y-4 mt-4">
        @foreach ($items as $item)
            <div class="bg-white p-4 border border-gray-200 rounded-lg shadow-sm">
                @foreach ($fields as $i => $field)
                    <div class="flex justify-between py-1">
                        <span class="font-medium text-gray-600">{{ ucfirst($field) }}:</span>
                        <span class="text-gray-800 truncate max-w-[60%]" title="{{ $item[$keys[$i]] ?? '-' }}">
                            {{ $item[$keys[$i]] ?? '-' }}
                        </span>
                    </div>
                @endforeach

                <!-- Ações -->
                <div class="flex justify-center mt-3">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                                class="px-3 py-1 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded text-sm">
                            Ações
                        </button>

                        <div x-show="open" x-cloak x-transition @click.outside="open = false"
                             class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 text-gray-800 shadow-md z-50 rounded">
                            @if (isset($edit))
                                <a href="{{ route($edit, $item) }}" class="block px-4 py-2 hover:bg-gray-100">Editar</a>
                            @endif

                            @if (isset($delete))
                                <form action="{{ route($delete, $item) }}" method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="block w-full text-left px-4 py-2 hover:bg-gray-100">Excluir</button>
                                </form>
                            @endif

                            @if (isset($show))
                                <a href="{{ route($show, $item) }}" class="block px-4 py-2 hover:bg-gray-100">Ver</a>
                            @endif

                            @if (isset($photo))
                                <a href="{{ route($photo, $item) }}" class="block px-4 py-2 hover:bg-gray-100">Fotos</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ======================== -->
    <!-- PAGINAÇÃO -->
    <!-- ======================== -->
    <div class="flex justify-end mt-4 space-x-1 text-sm">
        {{-- Botão Anterior --}}
        @if ($items->onFirstPage())
            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Anterior</span>
        @else
            <a href="{{ $items->previousPageUrl() }}"
               class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">Anterior</a>
        @endif

        {{-- Números --}}
        @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
            @if ($page == $items->currentPage())
                <span class="px-3 py-1 bg-blue-500 text-white rounded">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Botão Próximo --}}
        @if ($items->hasMorePages())
            <a href="{{ $items->nextPageUrl() }}"
               class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">Próximo</a>
        @else
            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Próximo</span>
        @endif
    </div>
</div>
