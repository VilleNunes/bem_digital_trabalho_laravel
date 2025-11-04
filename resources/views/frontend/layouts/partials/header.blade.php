<header class="bg-white dark:bg-gray-800 shadow-xl sticky top-0 z-50 transition-all duration-300">
  <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
    
    <a href="#" class="text-3xl font-extrabold text-primary tracking-tight transition-colors duration-300 hover:text-primary-dark">
      Bem Digital
    </a>
    
    <nav class="hidden md:flex items-center space-x-8 text-gray-700 dark:text-gray-300">
      <a href="#impacto" class="hover:text-primary font-medium transition-colors duration-200">Impacto</a>
      <a href="#campanhas" class="hover:text-primary font-medium transition-colors duration-200">Campanhas</a>
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
    <a href="#impacto" class="block py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 px-2 rounded-md transition-colors">Impacto</a>
    <a href="#campanhas" class="block py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 px-2 rounded-md transition-colors">Campanhas</a>
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