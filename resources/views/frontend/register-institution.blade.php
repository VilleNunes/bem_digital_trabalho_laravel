@extends('frontend.layouts.app')

@section('content')
@include('frontend.layouts.partials.header')
<div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 px-6 items-center">

  <div>
    <h2 class="text-4xl font-extrabold text-green-900 mb-6">
      Quer <span class="text-green-600">multiplicar o impacto</span> da sua <span
        class="text-green-800">instituição?</span>
    </h2>
    <p class="text-gray-700 mb-6 text-lg">
      Preencha o formulário ao lado para cadastrar sua organização e fazer parte do <strong>Bem Digital</strong> —
      conectando solidariedade e resultados reais.
    </p>
    <button class="bg-green-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:bg-green-700 transition">
      EXCLUSIVO PARA INSTITUIÇÕES E EMPRESAS
    </button>
  </div>
  <section id="cadastro-instituicoes" class="py-20 dark:bg-gray-800 transition-colors duration-500">
    @if(session('success'))
    <div class="bg-green-100 p-4 rounded-md shadow-lg max-w-3xl mx-auto mb-5">
      <p class="text-green-800">{{ session('success') }}</p>
    </div>
    @endif
    <div class="bg-green-100 p-8 rounded-md shadow-lg max-w-3xl mx-auto">
      <form action="{{ route('institution.store') }}" method="POST" class="space-y-3">
        @csrf

        <div>
          <label class="block text-sm font-medium text-green-800 mb-1">Nome Fantasia da instituição*</label>
          <input type="text" name="fantasy_name"
            class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none">
            @error('fantasy_name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- CNPJ + Email juntos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">CNPJ*</label>
            <input type="text" name="cnpj"
              class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
              required>
              @error('cnpj')
              <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
          </div>
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">E-mail*</label>
            <input type="email" name="email"
              class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
              required>
              @error('email')
              <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
          </div>
        </div>

        <!-- Telefone sozinho -->
        <div>
          <label class="block text-sm font-medium text-green-800 mb-1">Telefone*</label>
          <input type="tel" name="phone"
            class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
            required>
            @error('phone')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sócio + CPF juntos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">Sócio Administrativo*</label>
            <input type="text" name="name_admin"
              class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
              required>
              @error('name_admin')
              <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
          </div>
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">CPF*</label>
            <input type="text" name="cpf"
              class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
              required>
              @error('cpf')
              <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
          </div>
        </div>

        <!-- E-mail do representante -->
        <div>
          <label class="block text-sm font-medium text-green-800 mb-1">E-mail do Sócio Administrativo*</label>
          <input type="email" name="email_adm"
            class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
            required>
            @error('email_adm')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">Senha*</label>
            <input type="password" name="password"
              class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
              required>
              @error('password')
              <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
          </div>
          <div>
            <label class="block text-sm font-medium text-green-800 mb-1">Confirmar Senha*</label>
            <input type="password" name="password_confirmation"
              class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none"
              required>
              @error('password_confirmation')
              <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
          </div>
        </div>
    </div>

    <p class="text-sm text-gray-600 my-5">
      Ao cadastrar, você autoriza o Bem Digital a armazenar seus dados para comunicação conforme nossa
      <a href="#" class="text-green-700 underline">Política de Privacidade</a>.
    </p>

    <button type="submit"
      class="w-full bg-green-600 text-white py-3 rounded-md font-semibold hover:bg-green-700 transition">
      Enviar cadastro
    </button>
    </form>
</div>
</section>
@include('frontend.layouts.partials.footer')
