@extends('backend.layouts.app')


@section('content')
<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>
<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li>
        <li class="text-gray-700 font-semibold">Conteúdo</li>
        <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Relatórios</li>
    </ol>
</nav>

<div class="flex gap-5 flex-col">

    <x-card>

        <form class="flex gap-3" action="">
            <select name="campaign_id" class="select">
                <option disabled selected>Campanha</option>
                @foreach ($campaings as $campaign)
                <option value={{ $campaign->id }}>{{$campaign->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-neutral">Pesquisar</button>
        </form>

    </x-card>

    <x-card>

        <div class="grid grid-cols-1  sm:grid-cols-1 md:grid-cols-4 gap-3 mb-5">
            <x-card-metrics
                value="{{ number_format($campaign_donations, 2, '.', '') }} {{ $campaign->unit === 'unit' ? 'uni' : 'kg' }}"
                color="green" label="Total Doado" />


            <x-card-metrics value="{{ $donation_count }}" color="blue" label="Quantidade de doações" />
            <x-card-metrics value="{{ $donors_count }}" color="blue" label="Total de Doadores" />
        </div>

    </x-card>

    <x-card>
        <h2>Doações</h2>
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome da doaçao</th>
                        <th>Quantidade</th>
                        <th>Nome do Doador</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donations as $donation)
                    <tr>
                        <th>{{$donation->id}}</th>
                        <td>{{$donation->name}}</td>
                        <td>{{$donation->quantify}}</td>
                        <td>{{$donation->user->name}}</td>
                        <td class="text-blue-700"><a href="{{ route('donations.show', $donation) }}">Ver Doação</a></td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </x-card>
</div>
@endsection