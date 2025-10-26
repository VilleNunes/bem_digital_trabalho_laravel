@extends('backend.layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
        <div class="relative">
            {{-- espaço para ações rápidas como salvar/voltar se necessário --}}
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto space-y-6">
            <nav class="text-sm text-gray-500 mb-2" aria-label="Breadcrumb">
                <ol class="list-reset flex items-center gap-1">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:underline">Dashboard</a>
                        <span class="mx-2">/</span>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:underline">Perfil</a>
                        <span class="mx-2">/</span>
                    </li>
                    <li class="text-gray-700 font-semibold">Editar Perfil</li>
                </ol>
            </nav>
            {{-- Mensagens de Status --}}
            @if (session('status'))
            <div class="p-4 rounded-lg bg-verde/10 text-verde font-medium border border-verde/20">
                <i class="fa-solid fa-check-circle mr-2"></i>{{ session('status') }}
            </div>
            @endif

            @if (session('success'))
            <div class="p-4 rounded-lg bg-verde/10 text-verde font-medium border border-verde/20">
                <i class="fa-solid fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
            @endif

            {{-- Card Principal - Informações Básicas --}}
            <x-card>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações Pessoais</h3>

                <div class="flex flex-col md:flex-row gap-6">
                    <div x-data="{ preview: '{{ $user->avatar_url }}' }" class="flex flex-col items-center space-y-4">

                        <!-- Preview com fade -->
                        <div class="relative w-32 h-32 rounded-full overflow-hidden ring-4 ring-verde-claro shadow-md">
                            <img :src="preview" alt="Preview do avatar"
                                class="object-cover w-full h-full transition duration-200" x-transition.opacity>
                        </div>

                        <!-- Formulário de Upload -->
                        <form action="{{ route('profile.update.avatar') }}" method="POST" enctype="multipart/form-data"
                            class="w-full space-y-3">
                            @csrf
                            @method('PATCH')

                            <x-input-label for="avatar" value="Alterar foto de perfil" class="text-center" />

                            <input type="file" name="avatar" id="avatar" accept="image/*" class="mt-2 block w-full text-sm text-gray-700
                   file:mr-4 file:py-2 file:px-4 file:rounded-full
                   file:border-0 file:text-sm file:font-semibold
                   file:bg-verde-claro file:text-white
                   hover:file:bg-verde-medio" @change="
                const file = $event.target.files[0];
                if (file) preview = URL.createObjectURL(file);
            ">

                            <x-input-error :messages="$errors->get('avatar')" class="mt-1" />

                            <button type="submit" class="mt-3 w-full px-4 py-2 bg-verde-claro text-white rounded-lg
                   hover:bg-verde-medio transition duration-200 font-medium">
                                <i class="fa-solid fa-upload mr-2"></i>Salvar Foto
                            </button>
                        </form>
                    </div>

                    {{-- Coluna do Formulário --}}
                    <div class="md:w-2/3">
                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                            @csrf
                            @method('PATCH')

                            {{-- Nome --}}
                            <div>
                                <x-input-label for="name" value="Nome Completo" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $user->name)" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            {{-- Email --}}
                            <div>
                                <x-input-label for="email" value="Email" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            {{-- Telefone --}}
                            <div>
                                <x-input-label for="phone" value="Telefone" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="old('phone', $user->phone ?? '')" placeholder="(00) 00000-0000" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                            </div>

                            {{-- CPF/CNPJ --}}
                            <div>
                                <x-input-label for="cpf" value="CPF/CNPJ" />
                                <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full"
                                    :value="old('cpf', $user->cpf ?? '')" placeholder="000.000.000-00" />
                                <x-input-error :messages="$errors->get('cpf')" class="mt-1" />
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                    class="px-6 py-2 bg-verde text-white rounded-lg hover:bg-verde-medio transition duration-200 font-medium">
                                    <i class="fa-solid fa-floppy-disk mr-2"></i>Salvar Alterações
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </x-card>

            <x-card>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Endereço para Recebimento</h3>
                <p class="text-sm text-gray-600 mb-6">
                    Informe seu endereço para receber certificados ou materiais relacionados às doações.
                </p>

                <form action="{{ route('profile.update.address') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    {{-- Campos de endereço --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        {{-- CEP --}}
                        <div>
                            <x-input-label for="address_zip" value="CEP" />
                            <x-text-input id="address_zip" name="zip" type="text"
                                :value="old('zip', $user->address->zip ?? '')" placeholder="00000-000"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('zip')" class="mt-1" />
                        </div>

                        {{-- Estado --}}
                        <div>
                            <x-input-label for="address_state" value="Estado" />
                            <x-text-input id="address_state" name="state" type="text"
                                :value="old('state', $user->address->state ?? '')" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('state')" class="mt-1" />
                        </div>

                        {{-- Cidade --}}
                        <div>
                            <x-input-label for="address_city" value="Cidade" />
                            <x-text-input id="address_city" name="city" type="text"
                                :value="old('city', $user->address->city ?? '')" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('city')" class="mt-1" />
                        </div>

                        {{-- Bairro --}}
                        <div>
                            <x-input-label for="address_neighborhood" value="Bairro" />
                            <x-text-input id="address_neighborhood" name="neighborhood" type="text"
                                :value="old('neighborhood', $user->address->neighborhood ?? '')"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('neighborhood')" class="mt-1" />
                        </div>

                        {{-- Rua --}}
                        <div class="lg:col-span-2">
                            <x-input-label for="address_road" value="Rua" />
                            <x-text-input id="address_road" name="road" type="text"
                                :value="old('road', $user->address->road ?? '')" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('road')" class="mt-1" />
                        </div>

                        <div class="grid grid-cols-3 gap-4 lg:col-span-3">
                            {{-- Número (1/3 da linha) --}}
                            <div>
                                <x-input-label for="address_number" value="Número" />
                                <x-text-input id="address_number" name="number" type="text"
                                    :value="old('number', $user->address->number ?? '')" class="mt-1 block w-full" />
                                <x-input-error :messages="$errors->get('number')" class="mt-1" />
                            </div>

                            {{-- Complemento (2/3 da linha) --}}
                            <div class="col-span-2">
                                <x-input-label for="address_complement" value="Complemento" />
                                <x-text-input id="address_complement" name="complement" type="text"
                                    :value="old('complement', $user->address->complement ?? '')"
                                    class="mt-1 block w-full" />
                                <x-input-error :messages="$errors->get('complement')" class="mt-1" />
                            </div>
                        </div>
                    </div>

                    {{-- Botão no rodapé direito --}}
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-verde text-white rounded-md hover:bg-verde-claro transition duration-200 text-sm font-medium">
                            <i class="fa-solid fa-location-dot mr-2"></i>Salvar Endereço
                        </button>
                    </div>
                </form>
            </x-card>

            {{-- Card Exclusão de Conta --}}
            <x-card class="border-l-4 border-l-red-500">
                <h3 class="text-lg font-semibold text-red-600 mb-2">Excluir Conta</h3>
                <p class="text-sm text-gray-600 mb-4">
                    Esta ação é permanente. Todos os seus dados, doações e histórico serão removidos
                    permanentemente.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}"
                    onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.');"
                    class="space-y-4">
                    @csrf
                    @method('DELETE')

                    <div class="max-w-md">
                        <x-input-label for="password" value="Confirme sua senha para excluir a conta" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                            placeholder="Digite sua senha atual" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <button type="submit"
                        class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 font-medium">
                        <i class="fa-solid fa-trash mr-2"></i>Excluir Minha Conta
                    </button>
                </form>
            </x-card>
        </div>
    </div>
    @endsection
