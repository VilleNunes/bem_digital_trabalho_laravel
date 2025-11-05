@extends('frontend.layouts.app')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center bg-green-50 dark:bg-gray-800 text-center p-8">
    <div class="max-w-md">
        <h1 class="text-8xl font-extrabold text-green-600 mb-6">404</h1>
        <h2 class="text-3xl font-bold text-green-900 mb-4">Página não encontrada</h2>
        <p class="text-gray-600 mb-8">
            Oops!.... Parece que você se perdeu no caminho.  
            A página que você procura não existe.
        </p>
        <x-button-link class="bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition" :href="url('/')">
            Voltar para o início
        </x-button-link>
    </div>
</section>
@endsection
