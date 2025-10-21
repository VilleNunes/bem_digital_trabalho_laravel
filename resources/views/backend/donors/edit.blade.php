<table class="min-w-full divide-y divide-gray-200 border border-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3">ID</th>
            <th class="px-6 py-3">Nome</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3">Telefone</th>
            <th class="px-6 py-3">Ações</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($donors as $donor)
        <tr>
            <td class="px-6 py-4">{{ $donor->id }}</td>
            <td class="px-6 py-4">{{ $donor->name }}</td>
            <td class="px-6 py-4">{{ $donor->email }}</td>
            <td class="px-6 py-4">{{ $donor->phone }}</td>
            <td class="px-6 py-4 flex gap-2">
                <a href="{{ route('donors.edit', $donor->id) }}"
                   class="text-blue-600 hover:underline">Editar</a>

                <form action="{{ route('donors.destroy', $donor->id) }}" method="POST"
                      onsubmit="return confirm('Tem certeza que deseja deletar este doador?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-red-600 hover:underline">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $donors->links() }}
</div>
