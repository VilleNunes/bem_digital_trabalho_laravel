<div class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-200 p-4 flex flex-col">
        <div class="text-2xl font-bold mb-8">Logo</div>

        <nav class="flex-1">
            <ul class="space-y-2">
                <li><a href="#" class="block p-2 rounded bg-red-200">Dashboard</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 2</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 3</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 4</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 5</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 6</a></li>
            </ul>
        </nav>

        <div class="mt-8">
            <h2 class="font-semibold mb-2">Help</h2>
            <ul class="space-y-2">
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 1</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 2</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 3</a></li>
                <li><a href="#" class="block p-2 rounded hover:bg-gray-300">Menu 4</a></li>
            </ul>
        </div>
    </aside>

    <!-- Conteúdo principal -->
    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="bg-white shadow p-4 flex justify-end space-x-4">
            <a href="#" class="px-3 py-1 border rounded">Campanhas</a>
            <a href="#" class="px-3 py-1 border rounded">Legislação</a>
            <a href="#" class="px-3 py-1 border rounded">Ranking de doadores</a>
            <a href="#" class="px-3 py-1 border rounded">Contato</a>
            <a href="#" class="px-3 py-1 border rounded bg-gray-100">Perfil</a>
        </header>

        <!-- Conteúdo -->
        <main class="p-6 space-y-6">
            <h1 class="text-2xl font-bold">Resumo</h1>

            <div>
                <label class="block text-sm font-medium">Filtro de data</label>
                <input type="date" class="border p-2 rounded mt-1">
            </div>

            <div class="grid grid-cols-3 gap-6">
                <!-- Gráfico principal -->
                <div class="col-span-2 bg-gray-300 rounded p-6 flex items-center justify-center">
                    Gráfico de número de doações - Período
                </div>

                <!-- Gráfico lateral -->
                <div class="bg-gray-300 rounded p-6 flex items-center justify-center">
                    Gráfico das Metas em %
                </div>

                <!-- Cards menores -->
                <div class="bg-gray-300 rounded p-6 flex items-center justify-center">
                    Total - Doado
                </div>
                <div class="bg-gray-300 rounded p-6 flex items-center justify-center">
                    Top de ONGs
                </div>
                <div class="bg-gray-300 rounded p-6 flex items-center justify-center">
                    Top de doadores
                </div>
                <div class="bg-gray-300 rounded p-6 flex items-center justify-center">
                    Visitantes 0000
                </div>
            </div>
        </main>
    </div>
</div>


<!-- <x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> -->