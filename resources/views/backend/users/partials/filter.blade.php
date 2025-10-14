<x-card class="mb-5">
    <p class="text-gray-700">Filtro de Usuários</p>
    <form action="">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-3 content-center">
            <div>
                <x-input-label for="name" value="Nome" />
                <x-text-input id="name" placeholder="Nome do Usuário" class="block mt-1 w-full" type="text"
                    name="name" />
            </div>
            <div>
                <x-input-label for="phone" value="Telefone" />
                <x-text-input id="phone" placeholder="Telefone do Usuário" class="block mt-1 w-full" type="text"
                    name="phone" />
            </div>
            <div>
                <x-input-label for="email" value="E-mail" />
                <x-text-input id="email" placeholder="E-mail do Usuário" class="block mt-1 w-full" type="text"
                    name="email" />
            </div>
            <div class="flex justify-center flex-col items-center">
                <x-input-label for="active" value="Status do Usuário?" />
                <div class="flex flex-row gap-5 mt-5">
                    <div class="flex flex-row gap-3">
                        <x-input-label for="active" value="Ativado" />
                        <x-text-input id="active" value="1" class="block mt-1" type="radio" name="active" />
                    </div>
                    <div class="flex flex-row gap-3">
                        <x-input-label for="active_1" value="Desativado" />
                        <x-text-input id="active_1" value="0" class="block mt-1" type="radio" name="active" />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-8">
            <x-button color='green'>
                Pesquisar
            </x-button>
        </div>
    </form>

</x-card>