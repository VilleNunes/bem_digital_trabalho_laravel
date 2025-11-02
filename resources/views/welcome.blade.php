<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Bem Digital — conectando doadores e instituições com transparência e impacto." />
    <title>Bem Digital</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/1077/1077012.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#13ec5b",
              "neutral-dark": "#0d1b12",
              "light-bg": "#f6f8f6",
            },
            fontFamily: {
              display: ["Public Sans", "sans-serif"],
            },
          },
        },
      };
    </script>
    <style>
      body {
        font-family: 'Public Sans', sans-serif;
      }
    </style>
  </head>

  <body class="bg-light-bg text-neutral-dark dark:bg-neutral-dark dark:text-gray-200 transition-all duration-500">
    <!-- Navbar -->
    <header class="navbar bg-white/90 dark:bg-gray-900/90 shadow-sm backdrop-blur-lg fixed top-0 z-50">
      <div class="container mx-auto flex justify-between items-center px-6">
        <a href="#" class="flex items-center gap-2">
          <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 48 48">
            <path d="M42.17 20.17L27.83 5.83C29.14 7.14 28.4 10.19 26.2 13.77C24.85 15.96 22.96 18.34 20.65 20.65C18.34 22.96 15.96 24.85 13.77 26.2C10.19 28.4 7.14 29.14 5.83 27.83L20.17 42.17C21.48 43.48 24.53 42.75 28.11 40.55C30.3 39.2 32.69 37.31 35 35C37.31 32.69 39.2 30.3 40.55 28.11C42.75 24.54 43.48 21.48 42.17 20.17Z"/>
          </svg>
          <span class="text-xl font-extrabold">Bem Digital</span>
        </a>
        <div class="hidden md:flex items-center gap-6 font-semibold">
          <a href="#impacto" class="hover:text-primary transition">Impacto</a>
          <a href="#campanhas" class="hover:text-primary transition">Campanhas</a>
          <a href="#sobre" class="hover:text-primary transition">Sobre</a>
          <a href="#instituicoes" class="hover:text-primary transition">Instituições</a>
        </div>
        <div class="hidden md:flex gap-3">
          <button class="btn bg-primary border-none text-[#0d1b12] font-bold hover:bg-[#10d354]">Registrar</button>
          <button class="btn bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-bold hover:bg-gray-200 dark:hover:bg-gray-600">Entrar</button>
        </div>
        <div class="md:hidden">
          <button class="btn btn-ghost btn-circle text-gray-600 dark:text-gray-300">
            <span class="material-symbols-outlined">menu</span>
          </button>
        </div>
      </div>
    </header>

    <!-- Hero -->
    <section class="hero min-h-[90vh] bg-gradient-to-b from-white to-[#f0fff6] dark:from-gray-900 dark:to-gray-800 flex items-center pt-24">
      <div class="hero-content text-center flex flex-col gap-4">
        <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
          Transforme <span class="text-primary">solidariedade</span> em impacto real
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
          Conectamos pessoas, empresas e instituições para transformar vidas através da doação consciente e transparente.
        </p>
        <div class="flex justify-center gap-4 mt-6">
          <a href="#campanhas" class="btn bg-primary text-[#0d1b12] font-bold hover:bg-[#10d354] px-8">Doe Agora</a>
          <a href="#sobre" class="btn btn-outline border-primary text-primary hover:bg-primary hover:text-[#0d1b12] px-8">Saiba Mais</a>
        </div>
      </div>
    </section>

    <!-- Impacto -->
    <section id="impacto" class="py-20 bg-white dark:bg-gray-900 text-center">
      <h2 class="text-4xl font-extrabold mb-12">Nosso Impacto 💚</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-6">
        <div class="stat bg-gray-50 dark:bg-gray-800 rounded-xl p-6 shadow-sm">
          <div class="stat-title text-gray-500">Anos de Atuação</div>
          <div class="stat-value text-primary">5+</div>
          <div class="stat-desc">Transformando realidades desde 2020</div>
        </div>
        <div class="stat bg-gray-50 dark:bg-gray-800 rounded-xl p-6 shadow-sm">
          <div class="stat-title text-gray-500">Doações Realizadas</div>
          <div class="stat-value text-primary">+12K</div>
          <div class="stat-desc">Pessoas impactadas diretamente</div>
        </div>
        <div class="stat bg-gray-50 dark:bg-gray-800 rounded-xl p-6 shadow-sm">
          <div class="stat-title text-gray-500">Instituições Ativas</div>
          <div class="stat-value text-primary">180+</div>
          <div class="stat-desc">Parceiros cadastrados em todo o Brasil</div>
        </div>
      </div>
    </section>

    <!-- Campanhas -->
    <section id="campanhas" class="py-20 bg-light-bg dark:bg-neutral-dark text-center">
      <h2 class="text-4xl font-extrabold mb-12">Campanhas em Destaque 🌱</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div class="card bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition">
          <figure><img src="https://placehold.co/400x250/13ec5b/fff?text=Educação" alt="Educação" /></figure>
          <div class="card-body">
            <h3 class="card-title text-xl">Educação para o Futuro</h3>
            <p>Levando tecnologia e aprendizado para jovens em situação de vulnerabilidade.</p>
            <button class="btn bg-primary text-[#0d1b12] font-bold hover:bg-[#10d354] mt-4">Contribuir</button>
          </div>
        </div>
        <div class="card bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition">
          <figure><img src="https://placehold.co/400x250/13ec5b/fff?text=Saúde" alt="Saúde" /></figure>
          <div class="card-body">
            <h3 class="card-title text-xl">Cuidar é Transformar</h3>
            <p>Doações que fortalecem o atendimento médico em comunidades carentes.</p>
            <button class="btn bg-primary text-[#0d1b12] font-bold hover:bg-[#10d354] mt-4">Contribuir</button>
          </div>
        </div>
        <div class="card bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition">
          <figure><img src="https://placehold.co/400x250/13ec5b/fff?text=Alimentos" alt="Alimentos" /></figure>
          <div class="card-body">
            <h3 class="card-title text-xl">Alimento é Esperança</h3>
            <p>Distribuição de cestas básicas e refeições diárias para famílias em risco.</p>
            <button class="btn bg-primary text-[#0d1b12] font-bold hover:bg-[#10d354] mt-4">Contribuir</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Parceiros -->
    <section id="parceiros" class="py-20 bg-white dark:bg-gray-900 text-center">
      <h2 class="text-4xl font-extrabold mb-10">Parceiros que acreditam na mudança</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl mx-auto px-6">
        <img src="https://placehold.co/150x80/EEE/333?text=Parceiro+1" alt="Parceiro 1" class="mx-auto opacity-70 hover:opacity-100 transition">
        <img src="https://placehold.co/150x80/EEE/333?text=Parceiro+2" alt="Parceiro 2" class="mx-auto opacity-70 hover:opacity-100 transition">
        <img src="https://placehold.co/150x80/EEE/333?text=Parceiro+3" alt="Parceiro 3" class="mx-auto opacity-70 hover:opacity-100 transition">
        <img src="https://placehold.co/150x80/EEE/333?text=Parceiro+4" alt="Parceiro 4" class="mx-auto opacity-70 hover:opacity-100 transition">
      </div>
    </section>

    <!-- Sobre -->
    <section id="sobre" class="py-20 bg-light-bg dark:bg-neutral-dark">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 px-6 items-center">
        <div>
          <h2 class="text-4xl font-extrabold mb-4">Sobre a <span class="text-primary">Bem Digital</span></h2>
          <p class="text-gray-600 dark:text-gray-400 mb-4">
            Somos uma plataforma criada para conectar doadores e instituições de forma segura, ágil e transparente.
            Cada doação é acompanhada e gera impacto real nas comunidades atendidas.
          </p>
          <p class="text-gray-600 dark:text-gray-400 mb-6">
            Acreditamos na força da solidariedade e da tecnologia para construir um mundo mais justo e colaborativo.
          </p>
          <a href="#campanhas" class="btn bg-primary text-[#0d1b12] font-bold hover:bg-[#10d354]">Conhecer Campanhas</a>
        </div>
        <img src="https://placehold.co/500x400/13ec5b/fff?text=Bem+Digital" class="rounded-2xl shadow-lg" alt="Sobre Bem Digital" />
      </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-gray-900 text-gray-300 py-10 mt-20">
      <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-lg font-bold text-white mb-2">Bem Digital</h3>
          <p>Conectando generosidade, tecnologia e impacto social.</p>
        </div>
        <div>
          <h4 class="font-semibold text-white mb-3">Links rápidos</h4>
          <ul class="space-y-2">
            <li><a href="#impacto" class="hover:text-primary">Impacto</a></li>
            <li><a href="#campanhas" class="hover:text-primary">Campanhas</a></li>
            <li><a href="#sobre" class="hover:text-primary">Sobre</a></li>
          </ul>
        </div>
        <div>
          <h4 class="font-semibold text-white mb-3">Contato</h4>
          <p>contato@bemdigital.org</p>
          <p>© 2025 Bem Digital — Todos os direitos reservados.</p>
        </div>
      </div>
    </footer>
  </body>
</html>
