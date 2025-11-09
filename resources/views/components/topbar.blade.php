@props([
'title' => 'Plataforma',
'subtitle' => 'Bem Digital',
'user' => Auth::user(),
])

<header class="bg-gelo shadow px-6 flex justify-between items-center">
    <!-- Título -->
    <div class="flex gap-10 items-center justify-center">
        <a href="{{ route('dashboard') }}" class="font-semibold text-xl text-gray-950 hover:opacity-90">
            {{ $title }} <span class="text-verde-claro">{{ $subtitle }}</span>
        </a>

        @if(auth()->user()->rule->name === "admin")
        <div x-data="{modalIsOpen: false}">
            <button x-on:click="modalIsOpen = true" type="button"
                class="whitespace-nowrap rounded-sm bg-green-400 px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 ">Troca
                de unidade</button>
            @include('backend.partials.modal')
        </div>
        @endif
    </div>



    <!-- Menu do usuário -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="flex items-center gap-3 transition px-3 py-2 focus:outline-none">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-medium text-gray-800 leading-tight">
                    Bem-vindo, <span class="text-salmao-dark">{{ $user->name }}</span>
                </p>
                <p class="text-xs text-gray-500">Usuário padrão</p>
            </div>

            <div class="relative">
                {{-- Use o accessor avatar_url no model User para fornecer o caminho completo (storage ou default image)
                --}}
                <img src="{{ $user->avatar_url }}" alt="Foto de perfil"
                    class="w-10 h-10 rounded-full border-2 border-verde-claro shadow-sm">
            </div>
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.outside="open = false" x-transition
            class="absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden z-50">
            <div class="px-4 py-3 text-sm border-b border-gray-100">
                <p class="font-semibold text-gray-900">{{ $user->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500 truncate">{{ $user->email ?? 'admin@exemplo.com' }}</p>
            </div>

            <ul class="text-sm text-gray-700">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-gauge text-salmao-dark w-5"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-user-gear text-salmao-dark w-5"></i> Editar Perfil
                    </a>
                </li>

            </ul>

            <div class="border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-right-from-bracket w-5"></i> Sair
                    </button>
                </form>
            </div>
        </div>
    </div>

</header>