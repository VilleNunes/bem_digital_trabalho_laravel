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

        <div class="text-2xl font-bold mb-8 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:opacity-90">
                <i class="fa-solid fa-seedling text-verde-claro"></i>
                <span>Bem Digital</span>
            </a>

            <button @click="open = false" class="md:hidden text-white text-2xl" aria-label="Fechar menu">
                &times;
            </button>
        </div>

        @php
            $userRole = optional(auth()->user()?->rule)->name;
        @endphp

        <nav class="flex-1">
            <ul class="space-y-2">

                <x-nav-item icon="fa-gauge" label="Dashboard" route="dashboard" />

                <x-nav-dropdown icon="fa-users" label="Usuários" routeBase="users" :items="[
                        ['label' => 'Listar Usuários', 'route' => 'users.index', 'icon' => 'fa-list'],
                        ['label' => 'Cadastrar Usuário', 'route' => 'users.create', 'icon' => 'fa-user-plus'],
                    ]" />

                <x-nav-dropdown icon="fa-building" label="Instituições" routeBase="institutions" :items="[
                        ['label' => 'Listar Instituições', 'route' => 'institutions.index', 'icon' => 'fa-list'],
                        ['label' => 'Editar Instituição', 'route' => 'institutions.edit', 'icon' => 'fa-pen-to-square', 'show_on_current_route' => true],
                    ]" />
                <x-nav-dropdown icon="fa-building" label="Campanhas" routeBase="campaingn" :items="[
                        ['label' => 'Criar campanhas', 'route' => 'campaign.create', 'icon' => 'fa-pen-to-square'],
                        ['label' => 'Listar campanhas', 'route' => 'campaign.index', 'icon' => 'fa-list'],
                      
                    ]" />

                <x-nav-dropdown icon="fa-building" label="Doador" routeBase="donors" :items="[
                        ['label' => 'Criar doador', 'route' => 'donors.create', 'icon' => 'fa-pen-to-square'],
                        ['label' => 'Listar doador', 'route' => 'donors.index', 'icon' => 'fa-list'],
                      
                    ]" />

                @if ($userRole === 'admin')
                <x-nav-dropdown icon="fa-hand-holding-heart" label="Doações" routeBase="donations" :items="[
                        ['label' => 'Cadastrar doação', 'route' => 'donations.create', 'icon' => 'fa-plus'],
                        ['label' => 'Listar doações', 'route' => 'donations.index', 'icon' => 'fa-list'],
                    ]" />
                @elseif ($userRole === 'donor')
                <x-nav-item icon="fa-hand-holding-heart" label="Minhas Doações" route="donations.index" />
                @endif

                <x-nav-item icon="fa-chart-line" label="Relatórios" href="#" />
            </ul>
        </nav>
    </div>
</aside>
