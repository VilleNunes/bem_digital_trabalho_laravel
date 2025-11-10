@extends('backend.layouts.app')

@section('content')
<div class="space-y-8">
    <div class="p-6 md:p-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Visão Geral do Sistema</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <div class="bg-white p-5 rounded-lg shadow-lg border-l-4 border-indigo-500">
                <div class="text-sm font-medium text-gray-500">Total de Camapanhas</div>
                <div class="mt-1 text-3xl font-bold text-gray-900">{{$total_campaing}}</div>

            </div>

            <div class="bg-white p-5 rounded-lg shadow-lg border-l-4 border-green-500">
                <div class="text-sm font-medium text-gray-500">Total de doadores</div>
                <div class="mt-1 text-3xl font-bold text-gray-900">{{$total_donors}}</div>

            </div>

            <div class="bg-white p-5 rounded-lg shadow-lg border-l-4 border-yellow-500">
                <div class="text-sm font-medium text-gray-500">Total Arrecadado KG</div>
                <div class="mt-1 text-3xl font-bold text-gray-900">KG {{number_format($total_donation_sum_kg,2)}}</div>

            </div>
            <div class="bg-white p-5 rounded-lg shadow-lg border-l-4 border-yellow-500">
                <div class="text-sm font-medium text-gray-500">Total Arrecadado Unitário</div>
                <div class="mt-1 text-3xl font-bold text-gray-900">KG {{number_format($total_donation_sum_unit,2)}}
                </div>

            </div>

            <div class="bg-white p-5 rounded-lg shadow-lg border-l-4 border-red-500">
                <div class="text-sm font-medium text-gray-500">Total de usuarios</div>
                <div class="mt-1 text-3xl font-bold text-gray-900">{{$total_users}}</div>

            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Ranking Top Campanhas</h2>

                <ul class="divide-y divide-gray-200">
                    @forelse ($campaings as $campaing )
                    <li class="py-3 flex justify-between items-center">
                        <span class="font-medium">{{$campaing->id}} - {{$campaing->name}}</span>

                    </li>
                    @empty
                    <p>Nenhuma campanha</p>
                    @endforelse

                </ul>
            </div>

        </div>
    </div>
    @endsection