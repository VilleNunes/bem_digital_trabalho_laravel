@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Campanhas</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Criar Campanhas</li>
    </ol>
</nav>

<x-card x-data="{ abaAtiva: 'campanha' }">

    <!-- Tabs -->
    <div class="flex border-b mb-6">
        <button
            class="px-4 py-2 -mb-px border-b-2 font-semibold"
            :class="abaAtiva === 'campanha' ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500'"
            @click="abaAtiva = 'campanha'">
            Campanha
        </button>
        <button
            class="px-4 py-2 -mb-px border-b-2 font-semibold"
            :class="abaAtiva === 'ponto' ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500'"
            @click="abaAtiva = 'ponto'">
            Ponto de Coleta
        </button>
          <button
            class="px-4 py-2 -mb-px border-b-2 font-semibold"
            :class="abaAtiva === 'fotos' ? 'border-blue-500 text-blue-500' : 'border-transparent text-gray-500'"
            @click="abaAtiva = 'fotos'">
            Fotos
        </button>
    </div>

    <form action="{{ route('users.store') }}" method="post" class="space-y-5">
        @csrf

        <!-- Aba Campanha -->
        <div x-show="abaAtiva === 'campanha'">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <x-input-label for="name" value="Nome da Campanha" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <x-input-label for="beginning" value="Data e Hora Inicial da Campanha" />
                        <input type="datetime-local" name="beginning" id="beginning" {{ old('beginning') }} class="input w-full h-11 mt-1 rounded-md" />
                        <x-input-error :messages="$errors->get('beginning')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="termination" value="Data e Hora Final da Campanha" />
                        <input type="datetime-local" name="termination" id="termination" {{ old('termination') }} class="input w-full h-11 mt-1 rounded-md" />
                        <x-input-error :messages="$errors->get('termination')" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
                <div>
                    <x-input-label for="title" value="Legenda do telefone" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                        :value="old('title')" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="phone" value="Telefone" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone')" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
            </div>

            <div class="mt-4">
                <x-input-label for="category_id" value="Categoria" />
                <x-text-input id="category_id" class="block mt-1 w-full" type="text" name="category_id"
                    :value="old('category_id')" />
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" value="Descrição" />
                <div id="editor" style="height: 300px; background: white;"></div>
                <input type="hidden" name="description" id="description">
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>

        <!-- Aba Ponto de Coleta -->
        <div x-show="abaAtiva === 'ponto'">

            <h2 class="text-xl font-semibold mb-4">Informações do Ponto de Coleta</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                <div>
                    <x-input-label for="address_zip" value="CEP" />
                    <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address[zip]"
                        :value="old('address.zip')" />
                    <x-input-error :messages="$errors->get('address.zip')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_state" value="Estado" />
                    <x-text-input id="address_state" class="block mt-1 w-full" type="text" name="address[state]"
                        :value="old('address.state')" />
                    <x-input-error :messages="$errors->get('address.state')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_city" value="Cidade" />
                    <x-text-input id="address_city" class="block mt-1 w-full" type="text" name="address[city]"
                        :value="old('address.city')" />
                    <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_neighborhood" value="Bairro" />
                    <x-text-input id="address_neighborhood" class="block mt-1 w-full" type="text"
                        name="address[neighborhood]" :value="old('address.neighborhood')" />
                    <x-input-error :messages="$errors->get('address.neighborhood')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_road" value="Rua" />
                    <x-text-input id="address_road" class="block mt-1 w-full" type="text" name="address[road]"
                        :value="old('address.road')" />
                    <x-input-error :messages="$errors->get('address.road')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="address_number" value="Número" />
                    <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address[number]"
                        :value="old('address.number')" />
                    <x-input-error :messages="$errors->get('address.number')" class="mt-2" />
                </div>
                <div class="col-span-2">
                    <x-input-label for="address_complement" value="Complemento" />
                    <x-text-input id="address_complement" class="block mt-1 w-full" type="text" name="address[complement]"
                        :value="old('address.complement')" />
                    <x-input-error :messages="$errors->get('address.complement')" class="mt-2" />
                </div>
            </div>

            <!-- Horários de Funcionamento -->
            <div x-data="horariosApp()" class="mt-6">
                <h2 class="text-xl font-semibold mb-4">Horários de Funcionamento</h2>

                <!-- Preview dos Horários -->
                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <h3 class="font-semibold mb-3 text-gray-700">Preview dos Horários</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 text-sm">
                        <template x-for="(dia, index) in dias" :key="index">
                            <div class="flex justify-between items-center p-2 bg-white rounded border">
                                <span class="font-medium" x-text="dia"></span>
                                <span class="text-gray-600" 
                                      x-text="getHorarioDisplay(dia)"
                                      :class="{ 'text-red-500': isFechado(dia) }"></span>
                            </div>
                        </template>
                    </div>
                    <div class="mt-3 text-xs text-gray-500">
                        <span x-show="Object.keys(horarios).length === 0">Nenhum horário definido - ponto será marcado como não aberto</span>
                    </div>
                </div>

                <!-- Seleção de Dias -->
                <div class="grid grid-cols-7 gap-2 mb-6 text-center">
                    <template x-for="(dia, index) in dias" :key="index">
                        <div class="border rounded p-2 cursor-pointer transition-colors"
                             :class="{
                                 'bg-blue-100 border-blue-500': diaSelecionado === dia,
                                 'bg-green-50 border-green-300': hasHorario(dia) && !isFechado(dia),
                                 'bg-red-50 border-red-300': isFechado(dia)
                             }"
                             @click="selecionarDia(dia)">
                            <span x-text="dia" class="font-semibold block"></span>
                            <div class="mt-1 text-xs">
                                <template x-if="hasHorario(dia) && !isFechado(dia)">
                                    <span x-text="formatHorario(horarios[dia]?.abertura) + ' - ' + formatHorario(horarios[dia]?.fechamento)"></span>
                                </template>
                                <template x-if="isFechado(dia)">
                                    <span class="text-red-500">Fechado</span>
                                </template>
                                <template x-if="!hasHorario(dia)">
                                    <span class="text-gray-400">--:--</span>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Editor de Horários -->
                <div x-show="diaSelecionado" class="bg-white shadow p-6 rounded mb-6 border">
                    <h3 class="font-semibold mb-4 text-lg" x-text="'Configurar Horário - ' + diaSelecionado"></h3>

                    <div class="mb-4">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" x-model="fechado" class="mr-2">
                            <span class="text-red-600 font-medium">Não abre neste dia</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4" x-show="!fechado">
                        <div>
                            <label class="block font-semibold mb-1 text-gray-700">Horário de Abertura</label>
                            <input type="time" x-model="horarioAbertura" class="w-full border rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1 text-gray-700">Horário de Fechamento</label>
                            <input type="time" x-model="horarioFechamento" class="w-full border rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
                            @click="salvarHorario()"
                            :disabled="!fechado && (!horarioAbertura || !horarioFechamento)">
                            Salvar Horário
                        </button>
                        <button type="button"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors"
                            @click="limparHorario()"
                            x-show="hasHorario(diaSelecionado)">
                            Limpar Horário
                        </button>
                    </div>
                </div>

                <!-- Inputs ocultos para envio dos horários -->
                <template x-for="dia in dias" :key="dia">
                    <input type="hidden" :name="'horarios[' + dia + '][abertura]'" :value="horarios[dia]?.abertura || ''">
                    <input type="hidden" :name="'horarios[' + dia + '][fechamento]'" :value="horarios[dia]?.fechamento || ''">
                </template>
            </div>

        </div>

        <!-- Aba Fotos -->
        <div x-show="abaAtiva === 'fotos'" x-data="uploadFotos()">
            <h2 class="text-xl font-semibold mb-4">Upload de Fotos</h2>

            <input type="file" multiple accept="image/*" @change="handleFiles($event)" class="mb-4" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <template x-for="(file, index) in files" :key="index">
                    <div class="border rounded p-2 relative">
                        <button type="button" class="absolute top-1 right-1 text-red-500 hover:text-red-700" @click="removeFile(index)">×</button>
                        <img :src="file.url" class="w-full h-40 object-cover rounded mb-2" />
                        <div class="text-sm">
                            <div x-text="file.name"></div>
                            <div x-text="formatSize(file.size)"></div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Inputs ocultos para enviar para o backend -->
            <template x-for="file in files" :key="file.name">
                <input type="hidden" name="photos[]" :value="file.data">
            </template>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <x-button-link color="link" :href="route('users.index')">Cancelar</x-button-link>
            <x-button color='green'>Cadastrar</x-button>
        </div>
    </form>
</x-card>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Digite a descrição...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    const oldContent = `{!! old('description') !!}`;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }
    const form = document.querySelector('form');
    form.addEventListener('submit', function () {
        document.querySelector('#description').value = quill.root.innerHTML;
    });
});

function horariosApp() {
    return {
        dias: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        diaSelecionado: null,
        horarioAbertura: '',
        horarioFechamento: '',
        fechado: false,
        horarios: {},

        init() {
            // Inicializar com todos os dias sem horário definido
            this.dias.forEach(dia => {
                if (!this.horarios[dia]) {
                    this.horarios[dia] = { abertura: '', fechamento: '' };
                }
            });
        },

        selecionarDia(dia) {
            this.diaSelecionado = dia;
            if(this.horarios[dia]){
                this.horarioAbertura = this.horarios[dia].abertura || '';
                this.horarioFechamento = this.horarios[dia].fechamento || '';
                this.fechado = !this.horarioAbertura && !this.horarioFechamento;
            } else {
                this.horarioAbertura = '';
                this.horarioFechamento = '';
                this.fechado = false;
            }
        },

        formatHorario(h) {
            if (!h) return '--:--';
            return h.substring(0, 5); // Remove segundos se houver
        },

        getHorarioDisplay(dia) {
            if (this.isFechado(dia)) {
                return 'Fechado';
            }
            if (this.hasHorario(dia)) {
                return `${this.formatHorario(this.horarios[dia].abertura)} - ${this.formatHorario(this.horarios[dia].fechamento)}`;
            }
            return '--:--';
        },

        hasHorario(dia) {
            return this.horarios[dia] && 
                   this.horarios[dia].abertura && 
                   this.horarios[dia].fechamento;
        },

        isFechado(dia) {
            return this.horarios[dia] && 
                   !this.horarios[dia].abertura && 
                   !this.horarios[dia].fechamento;
        },

        salvarHorario() {
            if (this.fechado) {
                this.horarios[this.diaSelecionado] = { abertura: '', fechamento: '' };
            } else {
                this.horarios[this.diaSelecionado] = {
                    abertura: this.horarioAbertura,
                    fechamento: this.horarioFechamento
                };
            }
        },

        limparHorario() {
            this.horarios[this.diaSelecionado] = { abertura: '', fechamento: '' };
            this.horarioAbertura = '';
            this.horarioFechamento = '';
            this.fechado = false;
        }
    }
}

function uploadFotos() {
    return {
        files: [],
        handleFiles(event) {
            const selectedFiles = Array.from(event.target.files)
            selectedFiles.forEach(file => {
                const reader = new FileReader()
                reader.onload = e => {
                    this.files.push({
                        name: file.name,
                        size: file.size,
                        url: e.target.result,
                        data: e.target.result
                    })
                }
                reader.readAsDataURL(file)
            })
            // Limpar input para permitir re-seleção do mesmo arquivo
            event.target.value = null
        },
        removeFile(index) {
            this.files.splice(index, 1)
        },
        formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B'
            else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB'
            else return (bytes / 1048576).toFixed(1) + ' MB'
        }
    }
}
</script>
@endpush

@endsection