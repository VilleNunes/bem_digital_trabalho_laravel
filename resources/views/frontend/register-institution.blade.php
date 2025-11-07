@extends('frontend.layouts.app')

@section('content')
<section id="cadastro-instituicoes" class="py-20 bgS-green-50 dark:bg-gray-800 transition-colors duration-500">

@include('frontend.layouts.partials.form.called')

    
    <div class="bg-green-100 p-8 rounded-md shadow-lg">
  <form action="#" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Razão Social da instituição*</label>
      <input type="text" name="name_institution" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>
    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Nome Fantasia da instituição*</label>
      <input type="text" name="fantasy_name" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none">
    </div>
        

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">CNPJ*</label>
      <input type="text" name="cnpj" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">E-mail*</label>
      <input type="email" name="email_institution" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Telefone*</label>
      <input type="phone" name="phone" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" placeholder="+55 (XX) XXXXX-XXXX" required>
    </div>

    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">Sócio Administrativo da instituição*</label>
      <input type="text" name="representative_institution" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>
    <div>
      <label class="block text-sm font-medium text-green-800 mb-1">CPF*</label>
      <input type="text" name="cpf" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
    </div>
     <div>

      <label class="block text-sm font-medium text-green-800 mb-1">E-mail*</label>
      <input type="email" name="email_representative" class="w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none" required>
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
