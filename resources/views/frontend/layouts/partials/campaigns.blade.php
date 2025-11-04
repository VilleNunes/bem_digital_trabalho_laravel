<section id="campanhas" class="py-24 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-text-dark dark:text-white mb-10">
      Top <span class="text-primary">Campanhas</span>
    </h2>

    <div class="relative">
      <button id="prev" class="absolute -left-4 top-1/2 transform -translate-y-1/2 bg-primary text-white p-2 rounded-full shadow-lg hover:bg-primary-dark transition z-10">
        <span class="material-symbols-outlined">chevron_left</span>
      </button>

      <div id="carousel" class="flex gap-8 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4 scrollbar-hide px-1">

        <div class="min-w-[300px] md:min-w-[550px] bg-white dark:bg-gray-800 rounded-xl shadow-lg snap-center overflow-hidden transition-shadow duration-300 transform hover:scale-[1.01] hover:shadow-xl">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=800&q=80"
                alt="Campanha 1"
                class="w-full **h-48** object-cover"> 
          <div class="p-6 text-left">
            <h3 class="text-2xl font-bold text-text-dark dark:text-white mb-2">Doe Esperança</h3>
            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-4 line-clamp-2">
              Ajude famílias em situação de vulnerabilidade com doações de alimentos e roupas.
            </p>
            <x-button-link class="bg-primary text-white font-bold hover:bg-primary-dark px-4 py-2 rounded-lg" :href>
              Visualizar Campanha
            </x-button-link>
          </div>
        </div>

        <div class="min-w-[300px] md:min-w-[550px] bg-white dark:bg-gray-800 rounded-xl shadow-lg snap-center overflow-hidden transition-shadow duration-300 transform hover:scale-[1.01] hover:shadow-xl">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=800&q=80"
                alt="Campanha 2"
                class="w-full **h-48** object-cover">
          <div class="p-6 text-left">
            <h3 class="text-2xl font-bold text-text-dark dark:text-white mb-2">Apoie a Cura</h3>
            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-4 line-clamp-2">
              Apoie o tratamento de crianças com câncer — cada contribuição é um gesto de amor.
            </p>
            <x-button-link class="bg-primary text-white font-bold hover:bg-primary-dark px-4 py-2 rounded-lg" :href>
              Visualizar Campanha
            </x-button-link>
          </div>
        </div>

        <div class="min-w-[300px] md:min-w-[550px] bg-white dark:bg-gray-800 rounded-xl shadow-lg snap-center overflow-hidden transition-shadow duration-300 transform hover:scale-[1.01] hover:shadow-xl">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=800&q=80"
                alt="Campanha 2"
                class="w-full **h-48** object-cover">
          <div class="p-6 text-left">
            <h3 class="text-2xl font-bold text-text-dark dark:text-white mb-2">Apoie a Cura</h3>
            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-4 line-clamp-2">
              Apoie o tratamento de crianças com câncer — cada contribuição é um gesto de amor.
            </p>
            <x-button-link class="bg-primary text-white font-bold hover:bg-primary-dark px-4 py-2 rounded-lg" :href>
              Visualizar Campanha
            </x-button-link>
          </div>
        </div>

        <div class="min-w-[300px] md:min-w-[550px] bg-white dark:bg-gray-800 rounded-xl shadow-lg snap-center overflow-hidden transition-shadow duration-300 transform hover:scale-[1.01] hover:shadow-xl">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=800&q=80"
                alt="Campanha 3"
                class="w-full **h-48** object-cover">
          <div class="p-6 text-left">
            <h3 class="text-2xl font-bold text-text-dark dark:text-white mb-2">Natal Solidário</h3>
            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-4 line-clamp-2">
              Participe da arrecadação de brinquedos para o Natal de crianças carentes.
            </p>
            <x-button-link class="bg-primary text-white font-bold hover:bg-primary-dark px-4 py-2 rounded-lg" :href>
              Visualizar Campanha
            </x-button-link>
          </div>
        </div>
        
        </div>

      <button id="next" class="absolute -right-4 top-1/2 transform -translate-y-1/2 bg-primary text-white p-2 rounded-full shadow-lg hover:bg-primary-dark transition z-10">
        <span class="material-symbols-outlined">chevron_right</span>
      </button>
    </div>
  </div>
</section>

<style>
  

  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<script>
  const carousel = document.getElementById('carousel');
  // Ajuste o valor de rolagem (ex: 550px) para a largura do novo card, incluindo o gap de 8 (32px).
  // min-w-[550px] + gap-8 = aprox 582px. Usando 582 para garantir que rola para o próximo card.
  const scrollAmount = 582; 
  
  document.getElementById('prev').addEventListener('click', () => {
    carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
  });
  
  document.getElementById('next').addEventListener('click', () => {
    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  });
</script>