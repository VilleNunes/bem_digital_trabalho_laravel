{{-- resources/views/profile/edit.blade.php --}}
@extends('backend.layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Meu Perfil</h1>
        <div class="relative">
            {{-- espaço para ações rápidas como salvar/voltar se necessário --}}
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-4xl mx-auto space-y-6">
            <nav class="text-sm text-gray-500 mb-2" aria-label="Breadcrumb">
                <ol class="list-reset flex">
                    <li class="text-gray-700 font-semibold">Perfil <span class="mx-2">/</span></li>
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
            <x-card class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações Pessoais</h3>

                <div class="flex flex-col md:flex-row gap-6">
                    {{-- Coluna da Foto --}}
                    <div class="md:w-1/3">
                        {{-- Preview da Foto --}}
                        <div class="flex flex-col items-center">
                            <div class="relative w-32 h-32 mb-4">
                                <img id="avatar-preview"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=10b981&color=fff' }}"
                                    alt="Foto de perfil"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-verde-claro shadow-md">
                                @if(!$user->avatar)
                                <div class="absolute inset-0 flex items-center justify-center text-white text-2xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                @endif
                            </div>

                            {{-- Formulário de Upload de Foto --}}
                            <form action="{{ route('profile.update.photo') }}" method="POST"
                                enctype="multipart/form-data" class="w-full">
                                @csrf
                                @method('PATCH')

                                <x-input-label for="foto" value="Alterar foto de perfil" class="text-center" />

                                <input type="file" name="foto" id="foto" accept="image/*"
                                    class="mt-2 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-verde-claro file:text-white hover:file:bg-verde-medio"
                                    onchange="previewImage(event)">

                                <x-input-error :messages="$errors->get('foto')" class="mt-1" />

                                <button type="submit"
                                    class="mt-3 w-full px-4 py-2 bg-verde-claro text-white rounded-lg hover:bg-verde-medio transition duration-200 font-medium">
                                    <i class="fa-solid fa-upload mr-2"></i>Salvar Foto
                                </button>
                            </form>
                        </div>
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
                                <x-input-label for="telefone" value="Telefone" />
                                <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full"
                                    :value="old('telefone', $user->telefone ?? '')" placeholder="(00) 00000-0000" />
                                <x-input-error :messages="$errors->get('telefone')" class="mt-1" />
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

            {{-- Card Endereço --}}
            <x-card class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Endereço para Recebimento</h3>
                <p class="text-sm text-gray-600 mb-4">Informe seu endereço para receber certificados ou materiais
                    relacionados às doações.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- CEP --}}
                    <div class="md:col-span-2">
                        <x-input-label for="address_zip" value="CEP" />
                        <x-text-input id="address_zip" name="address_zip" type="text" class="mt-1 block w-full"
                            :value="old('address_zip', $user->address_zip ?? '')" placeholder="00000-000" />
                        <x-input-error :messages="$errors->get('address_zip')" class="mt-1" />
                    </div>

                    {{-- Estado --}}
                    <div>
                        <x-input-label for="address_state" value="Estado" />
                        <x-text-input id="address_state" name="address_state" type="text" class="mt-1 block w-full"
                            :value="old('address_state', $user->address_state ?? '')" />
                        <x-input-error :messages="$errors->get('address_state')" class="mt-1" />
                    </div>

                    {{-- Cidade --}}
                    <div>
                        <x-input-label for="address_city" value="Cidade" />
                        <x-text-input id="address_city" name="address_city" type="text" class="mt-1 block w-full"
                            :value="old('address_city', $user->address_city ?? '')" />
                        <x-input-error :messages="$errors->get('address_city')" class="mt-1" />
                    </div>

                    {{-- Bairro --}}
                    <div>
                        <x-input-label for="address_neighborhood" value="Bairro" />
                        <x-text-input id="address_neighborhood" name="address_neighborhood" type="text"
                            class="mt-1 block w-full"
                            :value="old('address_neighborhood', $user->address_neighborhood ?? '')" />
                        <x-input-error :messages="$errors->get('address_neighborhood')" class="mt-1" />
                    </div>

                    {{-- Rua --}}
                    <div>
                        <x-input-label for="address_road" value="Rua" />
                        <x-text-input id="address_road" name="address_road" type="text" class="mt-1 block w-full"
                            :value="old('address_road', $user->address_road ?? '')" />
                        <x-input-error :messages="$errors->get('address_road')" class="mt-1" />
                    </div>

                    {{-- Número --}}
                    <div>
                        <x-input-label for="address_number" value="Número" />
                        <x-text-input id="address_number" name="address_number" type="text" class="mt-1 block w-full"
                            :value="old('address_number', $user->address_number ?? '')" />
                        <x-input-error :messages="$errors->get('address_number')" class="mt-1" />
                    </div>

                    {{-- Complemento --}}
                    <div class="md:col-span-2">
                        <x-input-label for="address_complement" value="Complemento" />
                        <x-text-input id="address_complement" name="address_complement" type="text"
                            class="mt-1 block w-full"
                            :value="old('address_complement', $user->address_complement ?? '')" />
                        <x-input-error :messages="$errors->get('address_complement')" class="mt-1" />
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button"
                        class="px-6 py-2 bg-verde-claro text-white rounded-lg hover:bg-verde-medio transition duration-200 font-medium">
                        <i class="fa-solid fa-location-dot mr-2"></i>Salvar Endereço
                    </button>
                </div>
            </x-card>

            {{-- Card Preferências de Doação --}}
            <x-card class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Preferências de Doação</h3>
                <p class="text-sm text-gray-600 mb-4">Selecione as causas que mais se identificam para receber campanhas
                    relacionadas.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Causas de Interesse --}}
                    <div class="md:col-span-2">
                        <x-input-label value="Causas de Interesse" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-2">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="educacao"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Educação</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="saude"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Saúde</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="meio-ambiente"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Meio Ambiente</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="animais"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Animais</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="combate-fome"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Combate à Fome</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="criancas"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Crianças</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="idosos"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Idosos</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="causes[]" value="emergencias"
                                    class="rounded border-gray-300 text-verde focus:ring-verde">
                                <span class="text-sm text-gray-700">Emergências</span>
                            </label>
                        </div>
                    </div>

                    {{-- Frequência de Doação --}}
                    <div>
                        <x-input-label for="donation_frequency" value="Frequência Preferida de Doação" />
                        <select id="donation_frequency" name="donation_frequency"
                            class="mt-1 block w-full border-gray-300 rounded-lg focus:border-verde focus:ring-verde">
                            <option value="">Selecione...</option>
                            <option value="unique"
                                {{ old('donation_frequency', $user->donation_frequency ?? '') == 'unique' ? 'selected' : '' }}>
                                Única</option>
                            <option value="monthly"
                                {{ old('donation_frequency', $user->donation_frequency ?? '') == 'monthly' ? 'selected' : '' }}>
                                Mensal</option>
                            <option value="quarterly"
                                {{ old('donation_frequency', $user->donation_frequency ?? '') == 'quarterly' ? 'selected' : '' }}>
                                Trimestral</option>
                            <option value="yearly"
                                {{ old('donation_frequency', $user->donation_frequency ?? '') == 'yearly' ? 'selected' : '' }}>
                                Anual</option>
                        </select>
                    </div>

                    {{-- Valor Sugerido --}}
                    <div>
                        <x-input-label for="suggested_amount" value="Valor Sugerido (R$)" />
                        <x-text-input id="suggested_amount" name="suggested_amount" type="number"
                            class="mt-1 block w-full" :value="old('suggested_amount', $user->suggested_amount ?? '')"
                            placeholder="0,00" step="0.01" />
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button"
                        class="px-6 py-2 bg-verde-claro text-white rounded-lg hover:bg-verde-medio transition duration-200 font-medium">
                        <i class="fa-solid fa-heart mr-2"></i>Salvar Preferências
                    </button>
                </div>
            </x-card>

            {{-- Card Exclusão de Conta --}}
            <x-card class="p-6 border-l-4 border-l-red-500">
                <h3 class="text-lg font-semibold text-red-600 mb-2">Excluir Conta</h3>
                <p class="text-sm text-gray-600 mb-4">
                    Esta ação é permanente. Todos os seus dados, doações e histórico serão removidos permanentemente.
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

    {{-- Script para Preview da Imagem e Máscaras --}}
    @push('scripts')
    <script>
    function previewImage(event) {
        const preview = document.getElementById('avatar-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Se for um elemento <div> transformado em img, use o id correto
                const current = document.getElementById('avatar-preview');
                if (current && current.tagName === 'IMG') {
                    current.src = e.target.result;
                    current.classList.remove('border-verde-claro');
                    current.classList.add('border-verde');
                }
            }

            reader.readAsDataURL(file);
        }
    }

    // Máscaras do sistema (copiadas do users/create.blade.php)
    document.addEventListener('DOMContentLoaded', function() {
        // Máscara para telefone
        const phoneInput = document.getElementById('telefone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 11) {
                    value = value.replace(/(\d{2})(\d)/, '($1) $2');
                    value = value.replace(/(\d{5})(\d)/, '$1-$2');
                    e.target.value = value;
                }
            });
        }

        // Máscara para CPF/CNPJ
        const cpfInput = document.getElementById('cpf');
        if (cpfInput) {
            cpfInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 11) {
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                } else {
                    value = value.replace(/^(\d{2})(\d)/, '$1.$2');
                    value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                    value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
                    value = value.replace(/(\d{4})(\d)/, '$1-$2');
                }
                e.target.value = value;
            });
        }

        // Máscara para CEP
        const cepInput = document.getElementById('address_zip');
        if (cepInput) {
            cepInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 5) {
                    value = value.replace(/(\d{5})(\d)/, '$1-$2');
                }
                e.target.value = value;
            });
        }
    });
    </script>
    @endpush

    @endsection
