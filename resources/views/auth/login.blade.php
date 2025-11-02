@extends('auth.layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-50 white:bg-gray-200 p-4"
     style="background-image: url({{ asset('login-background.svg') }}); background-size: cover; background-position: center;">

    <div class="flex flex-col sm:flex-row w-full max-w-[900px] h-auto sm:h-[500px] rounded-2xl overflow-hidden shadow-lg">

        <div class="w-full sm:w-1/2 flex flex-col justify-center items-center p-6 sm:p-10 bg-white">
            <div class="mb-8 w-full max-w-[200px] mx-auto">
                <img src="{{ asset('logo-doare.png') }}" alt="Doare" class="w-full h-auto">
            </div>

            <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                    <input id="email" type="email" name="email" required autofocus
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                           placeholder="Seu email">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha *</label>
                    <input id="password" type="password" name="password" required
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                           placeholder="••••••••">
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2.5 px-4 rounded-lg transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Entrar
                </button>
            </form>

            <div class="flex flex-col sm:flex-row justify-between w-full text-sm mt-6 gap-4 sm:gap-0">
                <a href="{{ route('password.request') }}" class="text-red-500 hover:text-red-600 transition-colors">Recuperar senha</a>
                <a href="{{ route('register') }}" class="text-red-500 hover:text-red-600 transition-colors">Primeiro acesso</a>
            </div>
        </div>

        <!-- Lado Direito (azul escuro) -->
        <div class="hidden sm:flex w-1/2 bg-[#0e1523] flex-col justify-center items-center text-white p-10 border-l-2 border-red-500">
            <h2 class="text-3xl font-bold mb-4 text-center">Espaço do(a)<br>Doador(a)</h2>
            <p class="text-center text-gray-300 mb-8">
                Para uma melhor experiência, acesse seu painel de controle de um computador.
            </p>
            <img src="{{ asset('icone-planta.png') }}" alt="Ícone" class="h-24 w-auto">
        </div>

    </div>
</div>
@endsection
