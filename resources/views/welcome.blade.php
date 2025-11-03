@extends('frontend.layouts.app')

@section('content')
<!-- Navbar -->
@include('frontend.layouts.header')
 
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
            Somos uma plataforma que une o poder da <span>tecnologia</span> com a <span>solidariedade</span> humana para criar um ecossistema de doação seguro, ágil e, acima de tudo, <span>transparente</span>.
          </p>
          <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
            Acreditamos que cada doador tem o direito de acompanhar o impacto de sua contribuição, por isso garantimos o rastreamento em tempo real de todas as ações.
          </p>
          <x-button-link class="bg-primary text-white font-bold hover:bg-primary-dark px-4 py-2" :href>
            <span class="material-symbols-outlined mr-2" :href="">group</span> Ver campanhas
          </x-button-link>
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


@endsection