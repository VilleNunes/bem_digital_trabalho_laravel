<header class="bg-white dark:bg-gray-800 shadow-xl sticky top-0 z-50 transition-all duration-300">

    <div class="relative flex border-b border-neutral-300 bg-gray-100 dark:bg-gray-900 p-2 text-neutral-600 dark:border-neutral-700 dark:text-neutral-300">
        <p class="px-6 text-xs sm:text-sm text-gray-700 dark:text-gray-300 mx-auto">
            Dúvidas, precisa de suporte? Entre em contato!
            <a href="#" class="font-medium text-primary underline-offset-2 hover:underline dark:text-white">(44)97400-5974</a>
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-1 py-4 flex justify-between items-center">

        {{-- Logo clicável --}}
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('logo_BemDigital.png') }}" alt="Bem Digital" class="w-[25vh] h-auto hover:opacity-80 transition-opacity">
        </a>

        <nav class="hidden md:flex items-center space-x-8 text-gray-700 dark:text-gray-300">
            <a href="{{ route('home') }}" class="hover:text-primary font-medium transition-colors duration-200">Início</a>
             <a href="{{ route('contato') }}" class="text-gray-700 hover:text-green-700 font-medium transition"> Contato </a>
            <a href="#instituicoes" class="hover:text-primary font-medium transition-colors duration-200">Instituições</a>
            <a href="{{ route('institution.demo') }}" class="hover:text-primary font-medium transition-colors duration-200">Demo</a>
            <a href="#sobre" class="hover:text-primary font-medium transition-colors duration-200">Sobre Nós</a>

            <a href="{{ route('login') }}" class="bg-primary text-white font-semibold hover:bg-primary-dark px-5 py-2.5 rounded-lg shadow-md transition-all duration-300 inline-flex items-center space-x-2 transform hover:scale-105">
                <span class="material-symbols-outlined text-lg">login</span>
                <span>Entrar</span>
            </a>
        </nav>

        <button id="menu-toggle" class="md:hidden text-gray-700 dark:text-white p-2 focus:outline-none focus:ring-2 focus:ring-primary rounded-md">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <a href="{{ route('cadastro.instituicoes')}}" class="block py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 px-2 rounded-md transition-colors">Cadastrar Instituições</a>
        <a href="{{ route('institution.demo') }}" class="block py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 px-2 rounded-md transition-colors">Demo</a>
        <a href="#sobre" class="block py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 px-2 rounded-md transition-colors">Sobre Nós</a>

        <a href="{{ route('login') }}" class="mt-4 w-full text-center bg-primary text-white font-semibold hover:bg-primary-dark px-5 py-2.5 rounded-lg transition-all duration-300 inline-block">
            Entrar
        </a>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleButton = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            // Altera o ícone do botão
            const icon = toggleButton.querySelector('span');
            if (mobileMenu.classList.contains('hidden')) {
                icon.textContent = 'menu';
            } else {
                icon.textContent = 'close';
            }
        });
    });
</script>