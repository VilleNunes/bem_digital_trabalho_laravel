<aside x-data="{ open: false }" class="relative">

    <!-- Botão hambúrguer (mobile) -->
    <button @click="open = !open"
        class="md:hidden fixed top-11 left-3 z-50 bg-gray-800 text-white p-2 rounded-full shadow-lg border-2 border-verde-claro focus:outline-none transition-all duration-300 hover:scale-105"
        aria-label="Abrir menu">
        <i class="fa-solid fa-bars text-xl"></i>
    </button>

    <!-- Menu lateral -->
    <div x-show="open || window.innerWidth >= 768" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full" @click.outside="if (window.innerWidth < 768) open = false"
        class="fixed md:static top-[70px] md:top-0 left-0 h-full w-64 bg-gray-800 text-white p-4 flex flex-col z-40 md:z-0 shadow-lg md:shadow-md">
        <!-- Cabeçalho do menu -->
        <div class="text-2xl font-bold mb-8 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:opacity-90">
                <i class="fa-solid fa-seedling text-verde-claro"></i>
                <span>Bem Digital</span>
            </a>

            <!-- Botão fechar -->
            <button @click="open = false" class="md:hidden text-white text-2xl" aria-label="Fechar menu">
                &times;
            </button>
        </div>

        <!-- Navegação -->
        <nav class="flex-1">
            <ul class="space-y-2">

                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 p-2 rounded transition
                            {{ request()->routeIs('dashboard') ? 'bg-verde-claro text-white' : 'hover:bg-white hover:text-salmao-dark' }}">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Usuários (dropdown) -->
                <li x-data="{ openSub: {{ request()->routeIs('users.*') ? 'true' : 'false' }} }">
                    <button @click="openSub = !openSub"
                        class="w-full flex justify-between items-center p-2 rounded transition
                            {{ request()->routeIs('users.*') ? 'bg-verde-claro text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-users"></i>
                            <span>Usuários</span>
                        </div>
                        <i :class="openSub ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid text-sm"></i>
                    </button>

                    <ul x-show="openSub" x-transition class="ml-4 mt-1 space-y-1 text-sm">
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="block p-1 rounded flex items-center gap-2
                                    {{ request()->routeIs('users.index') ? 'bg-gray-700 text-white' : 'hover:underline' }}">
                                <i class="fa-solid fa-list"></i>
                                <span>Listar Usuários</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}"
                                class="block p-1 rounded flex items-center gap-2
                                    {{ request()->routeIs('users.create') ? 'bg-gray-700 text-white' : 'hover:underline' }}">
                                <i class="fa-solid fa-user-plus"></i>
                                <span>Cadastrar Usuário</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Instituições (dropdown) -->
                <li x-data="{ openInst: {{ request()->routeIs('institutions.*') ? 'true' : 'false' }} }">
                    <button @click="openInst = !openInst"
                        class="w-full flex justify-between items-center p-2 rounded transition
                        {{ request()->routeIs('institutions.*') ? 'bg-verde-claro text-white' : 'hover:bg-white hover:text-salmao-dark' }}">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-building"></i>
                            <span>Instituições</span>
                        </div>
                        <i :class="openInst ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid text-sm"></i>
                    </button>

<<<<<<< HEAD
                <!-- Perfil -->
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-2 p-2 rounded transition
                            {{ request()->routeIs('profile.*') ? 'bg-verde-claro text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Perfil</span>
                    </a>
                </li>

                <!-- Configurações -->
                <li>
                    <a href="#" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700 hover:text-white">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configurações</span>
                    </a>
=======
                    <ul x-show="openInst" x-transition class="ml-4 mt-1 space-y-1 text-sm">
                        <li>
                            <a href="{{ route('institutions.index') }}" class="block p-1 rounded flex items-center gap-2
                            {{ request()->routeIs('institutions.index') ? 'bg-gray-700 text-white' : 'hover:underline' }}">
                                <i class="fa-solid fa-list"></i>
                                <span>Listar Instituições</span>
                            </a>
                        </li>

                        @auth
                                <li>
                                    <a href="{{ route('institutions.edit', auth()->user()?->institution_id ?? auth()->user()?->institution?->id) }}"
                                        class="block p-1 rounded flex items-center gap-2
                            {{ request()->routeIs('institutions.edit') ? 'bg-gray-700 text-white' : 'hover:underline' }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Editar Instituição</span>
                                    </a>
                                </li>
                        @endauth
                    </ul>
>>>>>>> f8c31f51b59d4e932605aab49ffa722f5ec7a351
                </li>

                <!-- Relatórios -->
                <li>
                    <a href="#" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700 hover:text-white">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Relatórios</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Fim do menu lateral -->
