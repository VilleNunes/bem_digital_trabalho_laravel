@extends('auth.layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 p-4">
    <div class="flex flex-col sm:flex-row w-full max-w-[900px] h-auto sm:h-[500px] rounded-2xl overflow-hidden shadow-lg">
        
        <!-- Lado Esquerdo -->
        <div class="w-full sm:w-1/2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center p-6 sm:p-10">
            <div class="mb-8 w-full max-w-[200px]">
                <img src="{{ asset('logo-doare.png') }}" alt="Doare" class="w-full h-auto">
            </div>

            <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email *</label>
                    <div class="relative">
                        <input id="email" type="email" name="email" required autofocus
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                            placeholder="Seu email">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12H8m0 0l4-4m-4 4l4 4"/>
                        </svg>
                    </div>
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Senha *</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                            placeholder="••••••••">
                        <svg id="toggle-eye" xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5 w-5 h-5 text-gray-400 cursor-pointer hover:text-gray-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2.5 px-4 rounded-lg transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Entrar
                </button>
            </form>

            <div class="flex flex-col sm:flex-row justify-between w-full max-w-sm text-sm mt-6 gap-4 sm:gap-0">
                <a href="{{ route('password.request') }}" class="text-red-500 hover:text-red-600 transition-colors">Recuperar senha</a>
                <a href="{{ route('register') }}" class="text-red-500 hover:text-red-600 transition-colors">Primeiro acesso</a>
            </div>
        </div>

        <!-- Lado Direito -->
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

