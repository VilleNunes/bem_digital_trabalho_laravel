<!DOCTYPE html>
<html data-theme="light">


<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Adiciona o Quill CSS e JS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
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

<body class="flex  text-gray-800 flex-row  bg-gray-100 min-h-screen">

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