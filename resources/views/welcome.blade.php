<!DOCTYPE html>
<html lang="pt-br" class="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Bem Digital — conectando doadores e instituições com transparência e impacto." />
  <title>Bem Digital</title>
  <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/1077/1077012.png">
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#13ec5b",
            "background-light": "#f6f8f6",
            "background-dark": "#0e1a10",
          },
          fontFamily: {
            display: ["Public Sans", "sans-serif"]
          },
          transitionTimingFunction: {
            'soft': 'cubic-bezier(0.4, 0, 0.2, 1)',
          }
        }
      }
    }
  </script>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .social-icon:hover {
      color: #13ec5b;
      transform: translateY(-2px);
      transition: all 0.3s ease;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#343A40] dark:text-gray-200 transition-colors duration-500 ease-soft">
  <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md shadow-sm">
      <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-4">
        <div class="flex items-center gap-3">
          <svg class="text-primary w-7 h-7" fill="currentColor" viewBox="0 0 48 48"><path d="M42.17 20.17L27.83 5.83C29.14 7.14 28.4 10.19 26.2 13.77C24.85 15.96 22.96 18.34 20.65 20.65C18.34 22.96 15.96 24.85 13.77 26.2C10.19 28.4 7.14 29.14 5.83 27.83L20.17 42.17C21.48 43.48 24.53 42.75 28.11 40.55C30.3 39.2 32.69 37.31 35 35C37.31 32.69 39.2 30.3 40.55 28.11C42.75 24.54 43.48 21.48 42.17 20.17Z"></path></svg>
          <h1 class="text-lg font-bold text-[#0d1b12] dark:text-white">Bem Digital</h1>
        </div>
        <nav class="hidden md:flex items-center gap-8">
          <a href="#" class="hover:text-primary transition-colors">Home</a>
          <a href="#" class="hover:text-primary transition-colors">Doar</a>
          <a href="#" class="hover:text-primary transition-colors">Sobre</a>
          <a href="#" class="hover:text-primary transition-colors">Instituições</a>
          <div class="flex gap-2">
            <button class="bg-primary text-[#0d1b12] px-4 py-2 rounded-lg font-bold hover:opacity-90 transition-opacity">Registro</button>
            <button class="bg-gray-200 dark:bg-gray-700 px-4 py-2 rounded-lg font-bold hover:bg-gray-300 dark:hover:bg-gray-600 transition">Login</button>
          </div>
        </nav>
        <button id="menu-btn" class="md:hidden text-gray-600 dark:text-gray-300 focus:outline-none">
          <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
      </div>

      <nav id="mobile-menu" class="hidden flex-col gap-4 px-6 pb-4 md:hidden bg-background-light dark:bg-background-dark border-t border-gray-200 dark:border-gray-700">
        <a href="#" class="hover:text-primary transition-colors">Home</a>
        <a href="#" class="hover:text-primary transition-colors">Doar</a>
        <a href="#" class="hover:text-primary transition-colors">Sobre</a>
        <a href="#" class="hover:text-primary transition-colors">Instituições</a>
        <div class="flex gap-2">
          <button class="bg-primary text-[#0d1b12] px-4 py-2 rounded-lg font-bold hover:opacity-90">Registro</button>
          <button class="bg-gray-200 dark:bg-gray-700 px-4 py-2 rounded-lg font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Login</button>
        </div>
      </nav>
    </header>

   
    <!-- CONTEÚDO PRINCIPAL -->
    <main class="flex-1">
      <!-- CAMPANHAS -->
      <section class="text-center py-16 px-6">
        <h2 class="text-4xl font-black mb-3 dark:text-white">Nossas Campanhas</h2>
        <p class="max-w-xl mx-auto text-gray-600 dark:text-gray-400">Veja o impacto que fazemos juntos. Sua contribuição transforma realidades.</p>
      </section>

      <!-- CARDS -->
      <section class="grid gap-6 px-6 max-w-6xl mx-auto sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 pb-16">
        <div class="group flex flex-col items-center text-center p-6 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm hover:shadow-xl transition-all duration-300">
          <span class="material-symbols-outlined text-primary text-6xl mb-2">school</span>
          <h3 class="font-bold text-lg mb-1 dark:text-white">Impacto: Educação</h3>
          <p class="text-gray-600 dark:text-gray-400">Mais de <span class="font-bold text-primary">10K alunos</span> beneficiados.</p>
          <button class="bg-primary text-[#0d1b12] px-4 py-2 mt-3 rounded-lg font-bold hover:opacity-90 transition-opacity">Saiba Mais</button>
        </div>
        <div class="group flex flex-col items-center text-center p-6 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm hover:shadow-xl transition-all duration-300">
          <span class="material-symbols-outlined text-primary text-6xl mb-2">local_hospital</span>
          <h3 class="font-bold text-lg mb-1 dark:text-white">Impacto: Saúde</h3>
          <p class="text-gray-600 dark:text-gray-400">Mais de <span class="font-bold text-primary">3K famílias</span> atendidas.</p>
          <button class="bg-primary text-[#0d1b12] px-4 py-2 mt-3 rounded-lg font-bold hover:opacity-90 transition-opacity">Saiba Mais</button>
        </div>
      </section>

    

      <!-- SOBRE -->
      <section class="bg-gray-50 dark:bg-gray-900 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center md:text-left">
          <h2 class="text-3xl md:text-4xl font-black text-[#0d1b12] dark:text-white mb-6">Sobre a Bem Digital</h2>
          <p class="text-gray-600 dark:text-gray-400 max-w-3xl mx-auto md:mx-0 mb-10">
            A <strong>Bem Digital</strong> é uma plataforma que conecta quem quer ajudar com quem mais precisa. 
            Trabalhamos com transparência e tecnologia para aproximar doadores e instituições, 
            garantindo que cada contribuição gere impacto real e mensurável.
          </p>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition">
              <span class="material-symbols-outlined text-primary text-4xl mb-3">favorite</span>
              <h3 class="font-bold text-lg text-[#0d1b12] dark:text-white">Conexão Humana</h3>
              <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                Tornamos o ato de doar simples, direto e significativo para todos.
              </p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition">
              <span class="material-symbols-outlined text-primary text-4xl mb-3">verified</span>
              <h3 class="font-bold text-lg text-[#0d1b12] dark:text-white">Transparência</h3>
              <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                Cada doação é acompanhada, registrada e exibida em nosso painel.
              </p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition">
              <span class="material-symbols-outlined text-primary text-4xl mb-3">groups</span>
              <h3 class="font-bold text-lg text-[#0d1b12] dark:text-white">Comunidade</h3>
              <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                Criamos uma rede de solidariedade e impacto compartilhado.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-10 mt-auto text-gray-700 dark:text-gray-300">
      <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
        <div>
          <h3 class="text-lg font-bold text-[#0d1b12] dark:text-white">Bem Digital</h3>
          <p class="text-sm">Email: contato@bemdigital.com</p>
          <p class="text-sm">Telefone: (11) 99999-9999</p>
        </div>
        <div class="flex gap-4">
          <a href="#" class="social-icon"><i class="material-symbols-outlined">facebook</i></a>
          <a href="#" class="social-icon"><i class="material-symbols-outlined">share</i></a>
          <a href="#" class="social-icon"><i class="material-symbols-outlined">work</i></a>
        </div>
      </div>
      <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">© 2025 Bem Digital. Todos os direitos reservados.</p>
    </footer>
  </div>

</body>
</html>
