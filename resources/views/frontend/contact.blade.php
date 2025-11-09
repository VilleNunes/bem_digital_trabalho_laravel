@extends('frontend.layouts.app')

@section('content')

<section class="min-h-screen flex items-center justify-center bg-green-50 dark:bg-gray-900 transition-colors duration-500 py-20 px-6">

  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
    
   
    <div class="text-center md:text-left">
      <h2 class="text-4xl font-extrabold text-green-900 mb-6">
        Fale com o <span class="text-green-700">Bem Digital</span>
      </h2>
      <p class="text-gray-700 mb-6 text-lg leading-relaxed">
        Tem dúvidas, sugestões ou quer saber mais sobre nossos projetos e parcerias?
        Entre em contato conosco e responderemos o mais rápido possível.
      </p>
      <p class="text-gray-700 text-base leading-relaxed">
        <strong>Endereço:</strong> Av. Paraná, 1234 — Umuarama-PR <br>
        <strong>Telefone:</strong> (44) 4497400-5974 <br>
        <strong>E-mail:</strong> contato@bemdigital.org.br
      </p>
    </div>

   
    <div class="bg-green-100 p-10 rounded-xl shadow-lg">
      <form action="#" method="POST" class="space-y-6">
        @csrf

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">Seu nome*</label>
            <input type="text" name="name" class="w-full border border-green-400 rounded-md p-3 focus:ring-2 focus:ring-green-600 outline-none" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">Seu e-mail*</label>
            <input type="email" name="email" class="w-full border border-green-400 rounded-md p-3 focus:ring-2 focus:ring-green-600 outline-none" required>
          </div>
        </div>

        
        <div>
          <label class="block text-sm font-medium text-green-800 mb-1">Telefone (opcional)</label>
          <input type="tel" name="phone" class="w-full border border-green-400 rounded-md p-3 focus:ring-2 focus:ring-green-600 outline-none">
        </div>

        
        <div>
          <label class="block text-sm font-medium text-green-800 mb-1">Assunto*</label>
          <input type="text" name="subject" class="w-full border border-green-400 rounded-md p-3 focus:ring-2 focus:ring-green-600 outline-none" required>
        </div>

       
        <div>
          <label class="block text-sm font-medium text-green-800 mb-1">Mensagem*</label>
          <textarea name="message" rows="5" class="w-full border border-green-400 rounded-md p-3 focus:ring-2 focus:ring-green-600 outline-none resize-none" required></textarea>
        </div>

        <p class="text-sm text-gray-600">
          Ao enviar, você concorda com nossa 
          <a href="#" class="text-green-700 underline hover:text-green-800">Política de Privacidade</a>.
        </p>

        <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-md font-semibold hover:bg-green-800 transition">
          Enviar mensagem
        </button>
      </form>
    </div>

  </div>

</section>

@endsection
