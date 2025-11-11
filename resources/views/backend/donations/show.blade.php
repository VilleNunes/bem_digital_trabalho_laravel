@extends('backend.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('donations.index') }}" class="text-blue-600 hover:underline">Doações</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Detalhes da Doação</li>
    </ol>
</nav>

<x-card>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Informações da Doação</h2>
            <dl class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Título:</dt>
                    <dd class="text-gray-800">{{ $donation->name }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Quantidade:</dt>
                    <dd class="text-gray-800">{{ $donation->quantify ?? '-' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Valor:</dt>
                    <dd class="text-gray-800">
                        {{ $donation->amount !== null ? 'R$ ' . number_format($donation->amount, 2, ',', '.') : '-' }}
                    </dd>
                </div>
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Registrada em:</dt>
                    <dd class="text-gray-800">{{ optional($donation->created_at)->format('d/m/Y H:i') }}</dd>
                </div>
            </dl>
        </div>

        <div>
            <div class="mb-4">
                <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $donation->isEntrada() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $donation->type_formatted }}
                </span>
            </div>

            @if($donation->isEntrada())
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Dados do Doador</h2>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Nome:</dt>
                        <dd class="text-gray-800">{{ $donation->user->name ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">E-mail:</dt>
                        <dd class="text-gray-800">{{ $donation->user->email ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Perfil:</dt>
                        <dd class="text-gray-800">{{ optional($donation->user->rule)->name ?? '-' }}</dd>
                    </div>
                </dl>
            @else
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Dados do Receptor</h2>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-600">Nome:</dt>
                        <dd class="text-gray-800">{{ $donation->recipient_name ?? '-' }}</dd>
                    </div>
                </dl>
            @endif

            <h2 class="text-lg font-semibold text-gray-800 mt-6 mb-2">Campanha Destino</h2>
            <dl class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Campanha:</dt>
                    <dd class="text-gray-800">{{ optional($donation->campaign)->name ?? '-' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Instituição:</dt>
                    <dd class="text-gray-800">{{ optional($donation->campaign?->institution)->fantasy_name ?? '-' }}
                    </dd>
                </div>
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">E-mail:</dt>
                    <dd class="text-gray-800">{{ optional($donation->campaign?->institution)->email ?? '-' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-600">Telefone:</dt>
                    <dd class="text-gray-800">{{ optional($donation->campaign?->institution)->phone ?? '-' }}</dd>
                </div>
            </dl>
        </div>
    </div>

    @if ($donation->description)
    <div class="mt-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Descrição</h2>
        <div class="prose max-w-none text-sm text-gray-700">
            {!! nl2br(e($donation->description)) !!}
        </div>
    </div>
    @endif

    <div class="flex justify-end gap-3 mt-8">
        <x-button-link color="link" :href="url()->previous()">Voltar</x-button-link>

        @if ($role === 'admin')
        <x-button-link :href="route('donations.edit', $donation)" color="blue">
            Editar
        </x-button-link>

        <form action="{{ route('donations.destroy', $donation) }}" method="POST"
            onsubmit="return confirm('Deseja realmente excluir esta doação?');">
            @csrf
            @method('DELETE')
            <x-button type="submit" color="red">
                Excluir
            </x-button>
        </form>
        @endif
    </div>
</x-card>
@endsection