@extends('frontend.layouts.app')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center bg-green-50 dark:bg-gray-800 text-center p-8">
    <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mx-auto text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    <div class="max-w-md">
        <h1 class="text-8xl font-extrabold text-green-600 mb-6">404</h1>
        <h2 class="text-3xl font-bold text-green-900 mb-4">Página não encontrada</h2>
        <p class="text-gray-600 mb-8">
            Oops! Parece que você se perdeu no caminho.  
            A página que você procura não existe...
        </p>
        <x-button-link class="bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition" :href="url('/')">
            Voltar para o início
        </x-button-link>
    </div>
</section>
@endsection
