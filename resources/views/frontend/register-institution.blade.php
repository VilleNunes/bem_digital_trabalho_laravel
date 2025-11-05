@extends('frontend.layouts.app')


@section('content')
<section id="cadastro-instituicoes" class="py-20 bg-green-50 dark:bg-gray-800 transition-colors duration-500">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 px-6 items-center">
    <!-- Texto e chamada -->
    <div>
      <h2 class="text-4xl font-extrabold text-green-900 mb-6">
        Quer <span class="text-green-600">multiplicar o impacto</span> da sua <span class="text-green-800">instituição?</span>
      </h2>
      <p class="text-gray-700 mb-6 text-lg">
        Preencha o formulário ao lado para cadastrar sua organização e fazer parte do <strong>Bem Digital</strong> — 
        conectando solidariedade e resultados reais.
      </p>
      <button class="bg-green-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:bg-green-700 transition">
        EXCLUSIVO PARA INSTITUIÇÕES E EMPRESAS
      </button>
    </div>

    <!-- Formulário -->
    <div class="bg-green-100 p-8 rounded-md shadow-lg">
  <form action="#" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Nome da instituição*</label>
      <input type="text" name="name" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">CNPJ*</label>
      <input type="text" name="cnpj" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">E-mail*</label>
      <input type="email" name="email" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">WhatsApp*</label>
      <input type="tel" name="whatsapp" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" placeholder="+55 (XX) XXXXX-XXXX" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Tipo de instituição*</label>
      <select name="type" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none">
        <option>ONG</option>
        <option>Empresa Parceira</option>
        <option>Instituição Religiosa</option>
        <option>Outro</option>
      </select>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Número de colaboradores</label>
      <select name="size" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none">
        <option>1-10</option>
        <option>11-50</option>
        <option>51-200</option>
        <option>200+</option>
      </select>
    </div>

    <p class="text-sm text-gray-600">
      Ao cadastrar, você autoriza o Bem Digital a armazenar seus dados para comunicação conforme nossa 
      <a href="#" class="text-green-700 underline">Política de Privacidade</a>.
    </p>

    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md font-semibold hover:bg-green-700 transition">
      Enviar cadastro
    </button>
  </form>
</div>

@endsection
