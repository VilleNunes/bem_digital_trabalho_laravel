<div x-show="abaAtiva === 'ponto'" class="space-y-6">

    <!-- Informações do Ponto -->
    <h2 class="text-2xl font-bold mb-4">Informações do Ponto de Coleta Principal</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="col-span-full">
            <x-input-label for="title_point" required value="Nome do Ponto de Coleta" />
            <x-text-input id="title_point" class="block mt-1 w-full" type="text" name="title_point"
                :value="old('title_point', $ponto->title ?? '')" />
            <x-input-error :messages="$errors->get('title_point')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_zip" required value="CEP" />
            <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address[zip]"
                :value="old('address.zip', $ponto->address->zip ?? '')" />
            <x-input-error :messages="$errors->get('address.zip')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_state" required value="Estado" />
            <x-text-input id="address_state" class="block mt-1 w-full" type="text" name="address[state]"
                :value="old('address.state', $ponto->address->state ?? '')" />
            <x-input-error :messages="$errors->get('address.state')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_city" required value="Cidade" />
            <x-text-input id="address_city" class="block mt-1 w-full" type="text" name="address[city]"
                :value="old('address.city', $ponto->address->city ?? '')" />
            <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_neighborhood" required value="Bairro" />
            <x-text-input id="address_neighborhood" class="block mt-1 w-full" type="text" name="address[neighborhood]"
                :value="old('address.neighborhood', $ponto->address->neighborhood ?? '')" />
            <x-input-error :messages="$errors->get('address.neighborhood')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_road" required value="Rua" />
            <x-text-input id="address_road" class="block mt-1 w-full" type="text" name="address[road]"
                :value="old('address.road', $ponto->address->road ?? '')" />
            <x-input-error :messages="$errors->get('address.road')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address_number" value="Número" />
            <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address[number]"
                :value="old('address.number', $ponto->address->number ?? '')" />
            <x-input-error :messages="$errors->get('address.number')" class="mt-2" />
        </div>
        <div class="col-span-2">
            <x-input-label for="address_complement" value="Complemento" />
            <x-text-input id="address_complement" class="block mt-1 w-full" type="text" name="address[complement]"
                :value="old('address.complement', $ponto->address->complement ?? '')" />
            <x-input-error :messages="$errors->get('address.complement')" class="mt-2" />
        </div>
    </div>

    <!-- Agenda Semanal -->
    <div x-data="agendaApp(@json($agenda ?? null))" x-init="init()" class="p-6 bg-gray-50 rounded-lg shadow space-y-6">

        <h2 class="text-xl font-bold mb-4">Agenda Semanal de Funcionamento</h2>

        <!-- Preview -->
        <div class="bg-white p-4 rounded-lg border">
            <h3 class="font-semibold mb-3">Resumo da Semana</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                <template x-for="dia in dias" :key="dia">
                    <div class="flex justify-between items-center p-2 rounded border bg-gray-50">
                        <span class="font-medium" x-text="dia"></span>
                        <span :class="{'text-red-500': isFechado(dia)}" x-text="displayHorario(dia)"></span>
                    </div>
                </template>
            </div>
        </div>

        <!-- Seleção de Dia -->
        <div class="grid grid-cols-7 gap-2 text-center">
            <template x-for="dia in dias" :key="dia">
                <div @click="selecionarDia(dia)" :class="{
                        'bg-blue-200 border-blue-400': diaSelecionado === dia,
                        'bg-green-100 border-green-300': hasHorario(dia) && !isFechado(dia),
                        'bg-red-100 border-red-300': isFechado(dia)
                     }" class="border rounded p-2 cursor-pointer transition-colors hover:scale-105">
                    <span x-text="dia" class="block font-semibold"></span>
                    <small x-text="displayHorario(dia)"></small>
                </div>
            </template>
        </div>

        <!-- Editor -->
        <div x-show="diaSelecionado" class="bg-white p-6 rounded-lg shadow border mt-4">
            <h3 class="font-semibold mb-3">Editar Horário - <span x-text="diaSelecionado"></span></h3>

            <div class="mb-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" x-model="fechado" class="mr-2">
                    <span class="text-red-600 font-medium">Fechado neste dia</span>
                </label>
            </div>

            <div x-show="!fechado" class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold">Abertura</label>
                    <input type="time" x-model="horarioAbertura" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1 font-semibold">Fechamento</label>
                    <input type="time" x-model="horarioFechamento" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="flex gap-2">
                <button type="button" @click="salvarHorario()"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Salvar</button>
                <button type="button" @click="limparHorario()"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpar</button>
            </div>
        </div>

        <!-- Inputs ocultos -->
        <template x-for="dia in dias" :key="dia">
            <div>
                <input type="hidden" :name="'horarios[' + dia + '][abertura]'" :value="agenda[dia].abertura">
                <input type="hidden" :name="'horarios[' + dia + '][fechamento]'" :value="agenda[dia].fechamento">
            </div>
        </template>

        <!-- Botão -->
        <div class="flex justify-end mt-6 items-center gap-5">
            <x-button type="button" @click="abaAtiva = 'campanha'" color='green'>Anterior</x-button>
            <x-button type="submit" color="blue">Cadastrar</x-button>
        </div>

    </div>

</div>

<script>
    function agendaApp(initialData = null) {
    return {
        dias: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        diaSelecionado: null,
        horarioAbertura: '',
        horarioFechamento: '',
        fechado: false,
        agenda: {},

        init() {
            this.dias.forEach(dia => {
                if(initialData && initialData[dia]) {
                    this.agenda[dia] = {
                        abertura: initialData[dia].abertura || '',
                        fechamento: initialData[dia].fechamento || ''
                    };
                } else {
                    this.agenda[dia] = { abertura: '', fechamento: '' };
                }
            });
        },

        selecionarDia(dia) {
            this.diaSelecionado = dia;
            this.horarioAbertura = this.agenda[dia].abertura;
            this.horarioFechamento = this.agenda[dia].fechamento;
            this.fechado = !this.horarioAbertura && !this.horarioFechamento;
        },

        salvarHorario() {
            this.agenda[this.diaSelecionado] = this.fechado
                ? { abertura: '', fechamento: '' }
                : { abertura: this.horarioAbertura, fechamento: this.horarioFechamento };
            this.diaSelecionado = null;
            this.horarioAbertura = '';
            this.horarioFechamento = '';
            this.fechado = false;
        },

        limparHorario() {
            this.agenda[this.diaSelecionado] = { abertura: '', fechamento: '' };
            this.horarioAbertura = '';
            this.horarioFechamento = '';
            this.fechado = false;
        },

        hasHorario(dia) {
            return this.agenda[dia].abertura && this.agenda[dia].fechamento;
        },

        isFechado(dia) {
            return !this.agenda[dia].abertura && !this.agenda[dia].fechamento;
        },

        displayHorario(dia) {
            if (this.isFechado(dia)) return 'Fechado';
            if (this.hasHorario(dia)) return `${this.agenda[dia].abertura} - ${this.agenda[dia].fechamento}`;
            return '--:--';
        }
    }
}
</script>