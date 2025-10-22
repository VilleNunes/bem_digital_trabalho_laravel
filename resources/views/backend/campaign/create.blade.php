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

                <div class="grid grid-cols-7 gap-4 mb-6 text-center">
                    <template x-for="(dia, index) in dias" :key="index">
                        <div class="border rounded p-3 cursor-pointer"
                             :class="{'bg-blue-100 border-blue-500': diaSelecionado === dia}"
                             @click="selecionarDia(dia)">
                            <span x-text="dia" class="font-semibold"></span>
                            <div class="mt-2 text-sm">
                                <span x-text="formatHorario(horarios[dia]?.abertura)"></span>
                                -
                                <span x-text="formatHorario(horarios[dia]?.fechamento)"></span>
                            </div>
                        </div>
                    </template>
                </div>

                <div x-show="diaSelecionado" class="bg-white shadow p-6 rounded mb-6">
                    <h3 class="font-semibold mb-4" x-text="'Editar Horário - ' + diaSelecionado"></h3>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="fechado" class="mr-2">
                            Não abre neste dia
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4" x-show="!fechado">
                        <div>
                            <label class="block font-semibold mb-1">Abertura</label>
                            <input type="time" x-model="horarioAbertura" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Fechamento</label>
                            <input type="time" x-model="horarioFechamento" class="w-full border rounded p-2">
                        </div>
                    </div>

                    <button type="button"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                        @click="salvarHorario()"
                        :disabled="!fechado && (!horarioAbertura || !horarioFechamento)">
                        Salvar
                    </button>
                </div>
            </div>

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
            return h ? h : '--:--';
        },

        salvarHorario() {
            if(this.fechado){
                this.horarios[this.diaSelecionado] = { abertura: '', fechamento: '' };
            } else {
                this.horarios[this.diaSelecionado] = {
                    abertura: this.horarioAbertura,
                    fechamento: this.horarioFechamento
                };
            }
        }
    }
}
</script>
@endpush

@endsection
