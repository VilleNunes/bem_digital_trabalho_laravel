
@extends('auth.layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="flex w-[900px] h-[500px] rounded-2xl overflow-hidden shadow-lg gap-0">

        <!--  Esquerda  -->
        <div class="w-1/2 bg-white flex flex-col justify-center items-center px-10">
            <div class="mb-6">
                <img src="{{ asset('logo-doare.png') }}" alt="Doare" class="h-10">
            </div>

            <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm">
                @csrf

                
             <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email *</label>
                    <div class="relative">
                        <input id="email" type="email" name="email" required autofocus
                            class="w-full border border-gray-300 rounded-md py-2 pl-3 pr-10 text-sm focus:ring-2 focus:ring-red-400 focus:outline-none"
                            placeholder="Seu email">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 12H8m0 0l4-4m-4 4l4 4"/>
                        </svg>
                    </div>
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Senha *</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="w-full border border-gray-300 rounded-md py-2 pl-3 pr-10 text-sm focus:ring-2 focus:ring-red-400 focus:outline-none"
                            placeholder="••••••••">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-2.5 w-5 h-5 text-gray-400 cursor-pointer"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            onclick="togglePassword()">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                
                <div>
                    <button type="submit"
                        class="w-full bg-gray-200 text-gray-400 font-semibold py-2 rounded-md hover:bg-red-500 hover:text-white transition">
                        Entrar
                    </button>
                </div>
            </form>

            <div class="flex justify-between w-full max-w-sm text-sm mt-3">
                <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Recuperar senha</a>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Primeiro acesso</a>
            </div>
        </div>

        <!--  Fundo Escuro qq -->
        <div class="w-1/2 h-full bg-[#0e1523] flex flex-col justify-center items-center text-white px-10 border-2 border-orange-500">
            <h2 class="text-3xl font-bold mb-2 text-center">Espaço do(a)<br>Doador(a)</h2>
            <p class="text-center text-gray-300 mb-6">
                Para uma melhor experiência, acesse seu painel de controle de um computador.
            </p>
            <img src="{{ asset('public/icone-planta.png') }}" alt="Ícone" class="h-20">
        </div>

    </div>
</div>

@endsection
```
