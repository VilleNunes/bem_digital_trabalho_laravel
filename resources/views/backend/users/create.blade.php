{{-- resources/views/profile/edit.blade.php --}}
@extends('backend.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Perfil <span class="mx-2">/</span></li>
        <li class="text-gray-700 font-semibold">Editar Perfil</li>
    </ol>
</nav>

<x-card>
    <form action="{{ route('profile.update') }}" class="space-y-5" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- Foto de Perfil --}}
        <div class="flex items-center space-x-6 mb-6 p-4 bg-gray-50 rounded-lg">
            <div class="relative">
                @if($user->avatar)
                <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}" alt="Foto de perfil"
                    class="w-20 h-20 rounded-full object-cover border-2 border-verde">
                @else
                <div id="avatar-preview"
                    class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xl border-2 border-gray-300">
                    <i class="fa-solid fa-user"></i>
                </div>
                @endif
            </div>
            <div class="flex-1">
                <x-input-label for="avatar" value="Foto de Perfil" />
                <input type="file" name="avatar" id="avatar" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-verde-claro file:text-white hover:file:bg-verde-medio"
                    onchange="previewImage(event)">
                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                <p class="text-xs text-gray-500 mt-1">Formatos: JPG, PNG. Tamanho máximo: 2MB</p>
            </div>
        </div>

        <!-- Nome e Telefone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <x-input-label for="name" value="Nome" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name', $user->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="phone" value="Telefone" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                    :value="old('phone', $user->phone)" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email', $user->email)" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- CPF/CNPJ -->
        <div>
            <x-input-label for="cpf" value="CPF/CNPJ" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf', $user->cpf)" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Alteração de Senha (Opcional) -->
        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-xl mb-4 font-semibold text-gray-800">Alterar Senha</h2>
            <p class="text-sm text-gray-600 mb-4">Deixe em branco se não quiser alterar a senha.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <x-input-label for="password" value="Nova Senha" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" value="Confirmar Nova Senha" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" />
                </div>
            </div>
        </div>

        <!-- Endereço -->
        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-xl mb-4 font-semibold">Endereço</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                <div>
                    <x-input-label for="address_zip" value="CEP" />
                    <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address_zip"
                        :value="old('address_zip', $user->address_zip)" />
                    <x-input-error :messages="$errors->get('address_zip')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_state" value="Estado" />
                    <x-text-input id="address_state" class="block mt-1 w-full" type="text" name="address_state"
                        :value="old('address_state', $user->address_state)" />
                    <x-input-error :messages="$errors->get('address_state')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_city" value="Cidade" />
                    <x-text-input id="address_city" class="block mt-1 w-full" type="text" name="address_city"
                        :value="old('address_city', $user->address_city)" />
                    <x-input-error :messages="$errors->get('address_city')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_neighborhood" value="Bairro" />
                    <x-text-input id="address_neighborhood" class="block mt-1 w-full" type="text"
                        name="address_neighborhood" :value="old('address_neighborhood', $user->address_neighborhood)" />
                    <x-input-error :messages="$errors->get('address_neighborhood')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address_road" value="Rua" />
                    <x-text-input id="address_road" class="block mt-1 w-full" type="text" name="address_road"
                        :value="old('address_road', $user->address_road)" />
                    <x-input-error :messages="$errors->get('address_road')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_number" value="Número" />
                    <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address_number"
                        :value="old('address_number', $user->address_number)" />
                    <x-input-error :messages="$errors->get('address_number')" class="mt-2" />
                </div>
                <div class="col-span-2">
                    <x-input-label for="address_complement" value="Complemento" />
                    <x-text-input id="address_complement" class="block mt-1 w-full" type="text"
                        name="address_complement" :value="old('address_complement', $user->address_complement)" />
                    <x-input-error :messages="$errors->get('address_complement')" class="mt-2" />
                </div>
            </div>
        </div>

        {{-- Botões de Ação --}}
        <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
            <x-button-link color="link" :href="route('dashboard')">
                Cancelar
            </x-button-link>
            <x-button color='green' type="submit">
                <i class="fa-solid fa-floppy-disk mr-2"></i>Salvar Alterações
            </x-button>
        </div>
    </form>
</x-card>

{{-- Card Exclusão de Conta --}}
<x-card class="mt-6 border-l-4 border-l-red-500">
    <div class="p-6">
        <h3 class="text-lg font-semibold text-red-600 mb-2">Excluir Conta</h3>
        <p class="text-sm text-gray-600 mb-4">
            Esta ação é permanente. Todos os seus dados serão removidos permanentemente do sistema.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}"
            onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.');"
            class="flex items-end gap-4">
            @csrf
            @method('DELETE')

            <div class="flex-1 max-w-md">
                <x-input-label for="current_password" value="Confirme sua senha para excluir a conta" />
                <x-text-input id="current_password" name="password" type="password" class="block w-full mt-1"
                    placeholder="Digite sua senha atual" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button type="submit"
                class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 font-medium whitespace-nowrap">
                <i class="fa-solid fa-trash mr-2"></i>Excluir Minha Conta
            </button>
        </form>
    </div>
</x-card>

{{-- Script para Preview da Imagem e Máscaras --}}
<script>
    function previewImage(event) {
        const preview = document.getElementById('avatar-preview');
        const file = event.target.files[0];

        if (file) {
            // Verifica se é uma imagem
            if (!file.type.match('image.*')) {
                alert('Por favor, selecione uma imagem.');
                event.target.value = '';
                return;
            }

            // Verifica o tamanho do arquivo (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('A imagem deve ter no máximo 2MB.');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                // Se for um div (sem imagem), transforma em img
                if (preview.tagName === 'DIV') {
                    const newPreview = document.createElement('img');
                    newPreview.id = 'avatar-preview';
                    newPreview.src = e.target.result;
                    newPreview.alt = 'Foto de perfil';
                    newPreview.className = 'w-20 h-20 rounded-full object-cover border-2 border-verde';
                    preview.parentNode.replaceChild(newPreview, preview);
                } else {
                    preview.src = e.target.result;
                }
            }

            reader.readAsDataURL(file);
        }
    }

    // Máscaras do sistema (mesmas do users/create.blade.php)
    document.addEventListener('DOMContentLoaded', function() {
        // Máscara para telefone
        const phoneInput = document.getElementById('phone');
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
@endsection