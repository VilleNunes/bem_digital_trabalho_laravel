<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Bem Digital — conectando doadores e instituições com transparência e impacto." />
    <title>Bem Digital | Conectando Solidariedade e Impacto</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <script>
      tailwind.config = {
        darkMode: 'class', 
        theme: {
          extend: {
            colors: {
              primary: "#10B981", 
              'primary-dark': '#059669',
              'neutral-bg': "#FCFCFC", 
              'light-bg': "#F3F4F6", 
              'text-dark': '#1F2937', 
              'text-light': '#E5E7EB', 
            },
            fontFamily: {
              sans: ["Public Sans", "sans-serif"],
            },
          },
        },
      };
    </script>
    
    <style>
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
      body {
        font-family: 'Public Sans', sans-serif;
      }
    </style>
</head>

<body class="bg-light-bg text-text-dark dark:bg-gray-800 shadow-md dark:text-text-light transition-colors duration-500">
    
    <header class="bg-white dark:bg-gray-800 shadow-md transition-colors duration-500 sticky top-0 z-50">
      <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-extrabold text-primary">Bem Digital</a>
        <nav class="space-x-6">
          <a href="#impacto" class="hover:text-primary font-medium">Impacto</a>
          <a href="#campanhas" class="hover:text-primary font-medium">Campanhas</a>
          <a href="#sobre" class="hover:text-primary font-medium">Sobre Nós</a>

          <x-button-link href="/login" class="bg-primary text-white font-bold hover:bg-primary-dark px-4 py-2">
  <span class="material-symbols-outlined mr-2">login</span> Entrar
</x-button-link>


        </nav>
      </div>
    </header>

    <!-- Hero Section -->
    <section id="impacto" class="py-24 bg-white dark:bg-gray-800 text-center transition-colors duration-500">
      <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-4xl font-extrabold mb-12">Nosso Impacto em Números</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16">
          Conectamos pessoas, empresas e instituições para transformar vidas através da doação consciente e transparente.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
          <div class="stat bg-gray-50 dark:bg-gray-900 rounded-xl p-6 shadow-md transition-colors duration-500">
            <div class="stat-title text-gray-500">Anos de Atuação</div>
            <div class="stat-value text-primary">5+</div>
            <div class="stat-desc">Transformando realidades desde 2020</div>
          </div>
          
          <div class="stat bg-gray-50 dark:bg-gray-900 rounded-xl p-6 shadow-md transition-colors duration-500">
            <div class="stat-title text-gray-500">Doações Realizadas</div>
            <div class="stat-value text-primary">+12K</div>
            <div class="stat-desc">Pessoas impactadas diretamente</div>
          </div>
          
          <div class="stat bg-gray-50 dark:bg-gray-900 rounded-xl p-6 shadow-md transition-colors duration-500">
            <div class="stat-title text-gray-500">Instituições Ativas</div>
            <div class="stat-value text-primary">180+</div>
            <div class="stat-desc">Parceiros cadastrados em todo o Brasil</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Campaigns Section -->

    
    <!-- About Us Section -->
    <section id="sobre" class="py-24 bg-white dark:bg-gray-800 transition-colors duration-500">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 px-4 items-center">
        <div>
          <span class="text-primary font-bold uppercase text-sm tracking-wider mb-2 block">Nossa Missão</span>
          <h2 class="text-4xl font-extrabold mb-6 text-text-dark dark:text-white">
            Sobre a <span class="text-primary">Bem Digital</span>: Transparência e Confiança
          </h2>
          <p class="text-lg text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
            Somos uma plataforma que une o poder da **tecnologia** com a **solidariedade** humana para criar um ecossistema de doação seguro, ágil e, acima de tudo, **transparente**.
          </p>
          <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
            Acreditamos que cada doador tem o direito de acompanhar o impacto de sua contribuição, por isso garantimos o rastreamento em tempo real de todas as ações.
          </p>
          <a href="#instituicoes" class="btn bg-primary text-white font-bold hover:bg-primary-dark px-8">
            <span class="material-symbols-outlined mr-2">group</span> Ver Instituições
          </a>
        </div>
        <div class="order-first md:order-last">
          <img src="https://optim.tildacdn.one/tild3031-3230-4861-b964-396466663730/-/format/webp/ilustra-1.png.webp" class="rounded-3xl shadow-2xl w-full" alt="Sobre Bem Digital - Ilustração de colaboração" />
        </div>
      </div>
    </section>

  
    <!-- Partners Section -->
    <section id="parceiros" class="py-20 bg-light-bg dark:bg-gray-900 text-center transition-colors duration-500">
      <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold mb-12 text-text-dark dark:text-white">Parceiros que nos apoiam</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-10 max-w-5xl mx-auto">
          <img src="https://placehold.co/150x80/E5E7EB/A1A1AA?text=Parceiro+1" alt="Parceiro 1" class="mx-auto opacity-75 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
          <img src="https://placehold.co/150x80/E5E7EB/A1A1AA?text=Parceiro+2" alt="Parceiro 2" class="mx-auto opacity-75 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
          <img src="https://placehold.co/150x80/E5E7EB/A1A1AA?text=Parceiro+3" alt="Parceiro 3" class="mx-auto opacity-75 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
          <img src="https://placehold.co/150x80/E5E7EB/A1A1AA?text=Parceiro+4" alt="Parceiro 4" class="mx-auto opacity-75 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300 hidden sm:block">
          <img src="https://placehold.co/150x80/E5E7EB/A1A1AA?text=Parceiro+5" alt="Parceiro 5" class="mx-auto opacity-75 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300 hidden lg:block">
        </div>
      </div>
    </section>

  
    <!-- Footer -->
    <footer class="footer bg-gray-900 text-gray-300 py-12 transition-colors duration-500">
      <div class="max-w-6xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8">
        
        <aside class="col-span-2 md:col-span-1">
          <div class="flex items-center gap-2 mb-3">
            <span class="text-3xl font-extrabold text-white">Bem Digital</span>
          </div>
          <p class="text-sm">Conectando generosidade, tecnologia e impacto social com total transparência.</p>
        </aside>

        <nav class="flex flex-col gap-2">
          <h4 class="footer-title text-white font-bold mb-2">Navegação</h4>
          <a class="link link-hover" href="#impacto">Impacto</a>
          <a class="link link-hover" href="#campanhas">Campanhas</a>
          <a class="link link-hover" href="#sobre">Sobre Nós</a>
          <a class="link link-hover" href="#instituicoes">Instituições</a>
        </nav>

        <nav class="flex flex-col gap-2">
          <h4 class="footer-title text-white font-bold mb-2">Ajuda</h4>
          <a class="link link-hover">Como Doar</a>
          <a class="link link-hover">Termos de Uso</a>
          <a class="link link-hover">Política de Privacidade</a>
          <a class="link link-hover">FAQ</a>
        </nav>

        <nav>
          <h4 class="footer-title text-white font-bold mb-2">Fale Conosco</h4>
          <p class="text-sm">Email: <a href="mailto:contato@bemdigital.org" class="hover:text-primary">contato@bemdigital.org</a></p>
          <p class="text-sm">Telefone: (XX) XXXX-XXXX</p>
          
          <div class="grid grid-flow-col gap-4 mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current hover:text-primary cursor-pointer"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.795-1.574 2.163-2.723-.951.564-2.005.974-3.127 1.262-.895-.959-2.173-1.555-3.593-1.555-3.592 0-6.492 2.901-6.492 6.492 0 .511.066 1.006.194 1.485-5.39-2.705-10.159-5.7-13.342-9.2-2.19 3.737-.478 8.019 4.394 10.32-1.119-.034-2.169-.344-3.097-.866v.08c0 3.167 2.222 5.803 5.187 6.425-.541.148-1.11.226-1.696.226-.417 0-.82-.04-1.215-.114.823 2.572 3.2 4.45 6.027 4.491-2.062 1.61-4.664 2.57-7.49 2.57-.482 0-.95-.028-1.408-.083 2.984 1.933 6.494 3.064 10.285 3.064 12.336 0 19.016-10.246 19.016-19.124 0-.29-.006-.576-.017-.859.988-.714 1.848-1.6 2.53-2.582z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current hover:text-primary cursor-pointer"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.772 1.673 4.918 4.918.058 1.265.069 1.645.069 4.849 0 3.204-.012 3.584-.069 4.849-.149 3.245-1.673 4.772-4.918 4.918-1.265.058-1.644.069-4.849.069s-3.584-.012-4.849-.069c-3.244-.148-4.772-1.673-4.918-4.918-.058-1.265-.068-1.644-.068-4.849 0-3.204.012-3.584.069-4.849.149-3.245 1.673-4.772 4.918-4.918 1.265-.058 1.644-.068 4.849-.068zm0-2.163c-3.266 0-3.692.012-4.965.071-4.053.185-5.597 1.731-5.782 5.782-.059 1.273-.071 1.699-.071 4.965s.012 3.692.071 4.965c.185 4.053 1.731 5.597 5.782 5.782 1.273.059 1.699.071 4.965.071s3.692-.012 4.965-.071c4.053-.185 5.597-1.731 5.782-5.782.059-1.273.071-1.699.071-4.965s-.012-3.692-.071-4.965c-.185-4.053-1.731-5.597-5.782-5.782-1.273-.059-1.699-.071-4.965-.071zm0 9.5c-2.489 0-4.5 2.011-4.5 4.5s2.011 4.5 4.5 4.5 4.5-2.011 4.5-4.5-2.011-4.5-4.5-4.5zm0 7.5c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm5.83-10.999c-.56 0-1.018.458-1.018 1.018s.458 1.018 1.018 1.018 1.018-.458 1.018-1.018-.458-1.018-1.018-1.018z"></path></svg>
          </div>
        </nav>
      </div>
      
      <div class="border-t border-gray-700 mt-8 pt-6 max-w-6xl mx-auto px-4 text-center">
        <p class="text-sm text-gray-500">© 2025 Bem Digital — Todos os direitos reservados. Desenvolvido com coração e tecnologia.</p>
      </div>
    </footer>
</body>
</html>