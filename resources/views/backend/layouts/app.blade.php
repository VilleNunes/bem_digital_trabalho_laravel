<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Dashboard</title>
    <script type="module">
        import { initCEPMask, initPhoneMask } from '/js/masks.js';

        document.addEventListener('DOMContentLoaded', () => {
            const cepInput = document.getElementById('address_zip');
            const stateInput = document.getElementById('address_state');
            const cityInput = document.getElementById('address_city');
            const neighborhoodInput = document.getElementById('address_neighborhood');
            const roadInput = document.getElementById('address_road');
            initCEPMask(cepInput, stateInput, cityInput, neighborhoodInput, roadInput);
            const phoneInput = document.getElementById('phone');
            initPhoneMask(phoneInput);
        });
    </script>

</head>

<body class="flex min-h-screen text-gray-800 flex-row">


    <div class="bg-gray-200 top-0 bottom-[67%] left-0 right-0 absolute -z-40">

    </div>
    <div class="bg-gray-100 bottom-0 top-[33%] left-0 right-0 absolute -z-40">

    </div>

    @include('backend.partials.navbar')
    <!-- Conteúdo principal -->
    <div class="flex-1 flex flex-col">
        @include('backend.partials.topbar')
        <!-- Conteúdo -->
        <main class="py-6 px-2 space-y-6">
            <div class="px-5 mx-auto w-full">
                @yield('content')

            </div>
        </main>
    </div>



    <!-- Load Chart.js once for the app -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>

</html>