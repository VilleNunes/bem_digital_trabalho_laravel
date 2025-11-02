<x-card class="mb-5">
    <p class="text-gray-700">Filtro de Doadores</p>
    <form action="">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 gap-5 mt-3 content-center">
            <div>
                <x-input-label for="name" value="Nome" />
                <x-text-input id="name" placeholder="Nome do Doador" class="block mt-1 w-full" type="text"
                    name="name" />
            </div>
            <div>
                <x-input-label for="phone" value="Telefone" />
                <x-text-input id="phone" placeholder="Telefone do Doador" class="block mt-1 w-full" type="text"
                    name="phone" />
            </div>
            <div>
                <x-input-label for="email" value="E-mail" />
                <x-text-input id="email" placeholder="E-mail do Doador" class="block mt-1 w-full" type="text"
                    name="email" />
            </div>
            <div>
                <x-input-label for="cpf" value="CPF" />
                <x-text-input id="cpf" placeholder="CPF do Doador" class="block mt-1 w-full" type="text" name="cpf" />
            </div>


        </div>
        <div class="flex justify-end mt-8">
            <x-button color='green'>
                Pesquisar
            </x-button>
        </div>
    </form>

</x-card>