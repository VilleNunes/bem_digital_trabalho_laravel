{{-- resources/views/components/filter.blade.php --}}
<form method="GET" action="{{ route('donors.index') }}" class="mb-5 flex gap-2">
    <input type="text" name="name" placeholder="Nome" value="{{ request('name') }}" class="border p-2 rounded">
    <input type="text" name="email" placeholder="Email" value="{{ request('email') }}" class="border p-2 rounded">
    <input type="text" name="phone" placeholder="Telefone" value="{{ request('phone') }}" class="border p-2 rounded">
    <select name="active" class="border p-2 rounded">
        <option value="">Todos</option>
        <option value="1" @if(request('active')==='1') selected @endif>Ativos</option>
        <option value="0" @if(request('active')==='0') selected @endif>Inativos</option>
    </select>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
</form>
