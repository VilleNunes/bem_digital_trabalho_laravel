@extends('backend.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-2">Editar Instituição</h1>

    <nav class="text-sm text-gray-500 mb-5" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
            <li class="text-gray-700 font-semibold">
                Instituições
                <span class="mx-2">/</span>
            </li>
            <li class="text-gray-700 font-semibold">Editar {{ $institution->fantasy_name }}</li>
        </ol>
    </nav>

    @if(!empty($institution->photo_path))
        <div class="flex flex-col items-center justify-center mb-6">
            <div class="relative">
                <img src="{{ $institution->photo_path }}" alt="Foto da instituição"
                    class="h-32 w-32 object-cover rounded-xl shadow-md ring-1 ring-gray-200" />


                <span class="absolute bottom-1 right-1 bg-white/80 text-gray-600 text-xs px-2 py-1 rounded-full shadow">
                    Foto atual
                </span>
            </div>

            <p class="text-sm text-gray-500 mt-2">Essa é a imagem atual cadastrada.</p>
        </div>
    @endif

    <x-card>
        <form method="POST" action="{{ route('institutions.update', $institution) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="fantasy_name" value="Nome Fantasia" />
                    <input id="fantasy_name" name="fantasy_name" type="text"
                        value="{{ old('fantasy_name', $institution->fantasy_name) }}"
                        class="mt-1 block w-full rounded border-gray-300" required />
                    <x-input-error :messages="$errors->get('fantasy_name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="cnpj" value="CNPJ" />
                    <input id="cnpj" name="cnpj" type="text" value="{{ old('cnpj', $institution->cnpj) }}"
                        class="mt-1 block w-full rounded border-gray-300" required />
                    <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="phone" value="Telefone" />
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $institution->phone) }}"
                        class="mt-1 block w-full rounded border-gray-300" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="E-mail" />
                    <input id="email" name="email" type="email" value="{{ old('email', $institution->email) }}"
                        class="mt-1 block w-full rounded border-gray-300" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


            </div>

            <div class="md:col-span-2">
                <x-input-label for="description" value="Descrição" />
                <textarea id="description" name="description" rows="3"
                    class="mt-1 block w-full rounded border-gray-300">{{ old('description', $institution->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="md:col-span-2" x-data="{
                            previewSrc: '{{ $institution->photo_path ?? '' }}',
                            fileName: '',
                            choose(){ $refs.file.click() },
                            onFileChange(e){
                                const file = e.target.files[0];
                                if(!file){ return }
                                this.fileName = file.name;
                                const reader = new FileReader();
                                reader.onload = (ev) => { this.previewSrc = ev.target.result }
                                reader.readAsDataURL(file);
                            },
                            clearSelection(){
                                this.previewSrc = '{{ $institution->photo_path ?? '' }}';
                                this.fileName = '';
                                $refs.file.value = null;
                            }
                         }">

                <x-input-label for="photo" value="Foto (imagem)" />

                {{-- input real, escondido --}}
                <input x-ref="file" id="photo" name="photo" type="file" accept="image/*" class="hidden"
                    @change="onFileChange($event)" />

                <div class="flex items-center gap-3 mt-1">
                    {{-- Botão: Selecionar imagem --}}
                    <button type="button" @click="choose()" class="inline-flex items-center gap-2 px-3 py-2 rounded-xl border border-gray-300
                                       hover:bg-gray-50 shadow-sm text-sm">
                        <i class="fa-solid fa-image"></i>
                        <span>Selecionar imagem</span>
                    </button>


                    <button type="button" @click="clearSelection()" class="inline-flex items-center gap-2 px-3 py-2 rounded-xl border border-gray-200
                                       hover:bg-gray-50 text-sm">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span>Limpar seleção</span>
                    </button>


                    <span class="text-xs text-gray-500" x-text="fileName || 'Nenhum arquivo selecionado'"></span>
                </div>

                <x-input-error :messages="$errors->get('photo')" class="mt-2" />


                <div class="mt-3">
                    <template x-if="previewSrc">
                        <img :src="previewSrc" alt="Prévia da imagem"
                            class="h-24 w-24 object-cover rounded-lg ring-1 ring-gray-200" />
                    </template>

                    <template x-if="!previewSrc">
                        <div
                            class="h-24 w-24 rounded-lg ring-1 ring-gray-200 flex items-center justify-center text-gray-400">
                            <i class="fa-regular fa-image text-xl"></i>
                        </div>
                    </template>
                </div>


                @if(!empty($institution->photo_path))
                    <div class="mt-3 flex items-center gap-2">
                        <input type="checkbox" id="remove_photo" name="remove_photo" value="1" class="rounded border-gray-300">
                        <label for="remove_photo" class="text-sm text-gray-700">Remover foto atual</label>
                    </div>
                @endif
            </div>

            <hr class="my-4">

            <h2 class="text-lg font-semibold mb-2">Endereço</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <x-input-label for="address_city" value="Cidade" />
                    <input id="address_city" name="address[city]" type="text"
                        value="{{ old('address.city', $institution->address->city ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address_state" value="Estado" />
                    <input id="address_state" name="address[state]" type="text"
                        value="{{ old('address.state', $institution->address->state ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.state')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address_zip" value="CEP" />
                    <input id="address_zip" name="address[zip]" type="text"
                        value="{{ old('address.zip', $institution->address->zip ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.zip')" class="mt-2" />
                </div>

                <div class="md:col-span-2">
                    <x-input-label for="address_road" value="Rua/Avenida" />
                    <input id="address_road" name="address[road]" type="text"
                        value="{{ old('address.road', $institution->address->road ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.road')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address_number" value="Número" />
                    <input id="address_number" name="address[number]" type="text"
                        value="{{ old('address.number', $institution->address->number ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.number')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address_neighborhood" value="Bairro" />
                    <input id="address_neighborhood" name="address[neighborhood]" type="text"
                        value="{{ old('address.neighborhood', $institution->address->neighborhood ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.neighborhood')" class="mt-2" />
                </div>

                <div class="md:col-span-3">
                    <x-input-label for="address_complement" value="Complemento" />
                    <input id="address_complement" name="address[complement]" type="text"
                        value="{{ old('address.complement', $institution->address->complement ?? '') }}"
                        class="mt-1 block w-full rounded border-gray-300" />
                    <x-input-error :messages="$errors->get('address.complement')" class="mt-2" />
                </div>
            </div>

            @if($institution->address)
                <div class="mt-3 flex items-center gap-2">
                    <input id="remove_address" name="remove_address" type="checkbox" value="1" class="rounded border-gray-300">
                    <x-input-label for="remove_address" value="Remover endereço" />
                </div>
            @endif

            <div class="flex justify-end gap-3 mt-6">
                <x-button-link color="link" :href="route('institutions.index')">
                    Cancelar
                </x-button-link>
                <x-button color='green'>
                    Salvar
                </x-button>
            </div>
        </form>
    </x-card>
@endsection
