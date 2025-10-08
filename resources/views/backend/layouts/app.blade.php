<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('backend.partials.navbar')
    <!-- Conteúdo principal -->
    <div class="flex-1 flex flex-col">
        @include('backend.partials.topbar')
        <!-- Conteúdo -->
        <main class="p-6 space-y-6 text-gray-600">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>