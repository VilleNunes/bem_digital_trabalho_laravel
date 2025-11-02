<div x-show="abaAtiva === 'ponto'" class="space-y-8 p-6 bg-white rounded-xl shadow-md">

    <!-- Informações do Ponto -->
    <h2 class="text-2xl font-bold mb-4 border-b pb-2">Informações do Ponto de Coleta Principal</h2>

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

    <!-- Horários Semanais -->
    <h2 class="text-2xl font-bold mt-8 mb-4 border-b pb-2">Horários de Funcionamento</h2>

    <div x-data="agendaForm({{ json_encode($agendas ?? []) }})" class="space-y-4">

        <div class="grid grid-cols-1 md:grid-cols-7 gap-2">
            <template x-for="(dia, index) in dias" :key="index">
                <div class="border rounded-lg p-3 bg-gray-50 hover:bg-gray-100 transition duration-200">
                    <div class="flex flex-col items-center space-y-3">
                        <div class="font-semibold text-center" x-text="dia.dia"></div>

                        <label class="flex items-center gap-1 text-sm">
                            <input type="checkbox" x-model="dia.fechado" class="rounded">
                            <span x-text="dia.fechado ? 'Fechado' : 'Aberto'"></span>
                        </label>

                        <div class="w-full space-y-2" x-show="!dia.fechado">
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Abertura</label>
                                <input type="time" x-model="dia.abertura" class="border rounded p-2 w-full text-sm">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Fechamento</label>
                                <input type="time" x-model="dia.fechamento" class="border rounded p-2 w-full text-sm">
                            </div>
                        </div>

                        <div class="text-xs text-center mt-1"
                            :class="dia.fechado ? 'text-red-500 font-bold' : 'text-green-600 font-semibold'">
                            <span
                                x-text="dia.fechado ? 'Fechado' : (dia.abertura && dia.fechamento ? dia.abertura + ' - ' + dia.fechamento : 'Horário não definido')"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <input type="hidden" name="agenda" :value="JSON.stringify(dias)">
    </div>

    <!-- Botões de Navegação -->
    <div class="flex justify-end mt-6 items-center gap-5">
        <x-button type="button" @click="abaAtiva = 'campanha'" color="green">Anterior</x-button>
        <x-button type="submit" color="green">Cadastrar</x-button>
    </div>

</div>

<script>
    function agendaForm(initialAgenda) {
        return {
            dias: initialAgenda.length ? initialAgenda.map(d => ({
                ...d,
                fechado: !d.abertura && !d.fechamento
            })) : [
                { dia: 'Dom', abertura: '', fechamento: '', fechado: true },
                { dia: 'Seg', abertura: '', fechamento: '', fechado: true },
                { dia: 'Ter', abertura: '', fechamento: '', fechado: true },
                { dia: 'Qua', abertura: '', fechamento: '', fechado: true },
                { dia: 'Qui', abertura: '', fechamento: '', fechado: true },
                { dia: 'Sex', abertura: '', fechamento: '', fechado: true },
                { dia: 'Sáb', abertura: '', fechamento: '', fechado: true },
            ],
        }
    }
</script>