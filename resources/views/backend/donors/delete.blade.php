@foreach($items as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->phone }}</td>
    <td class="flex gap-2">
        
        <a href="{{ route($edit, $item->id) }}" class="text-blue-500 hover:underline">Editar</a>
        
        <form action="{{ route($delete, $item->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">Deletar</button>
        </form>
    </td>
</tr>
@endforeach
