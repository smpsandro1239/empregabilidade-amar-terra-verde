@extends('layouts.app')
@section('title', 'Relatórios')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Relatórios</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h2 class="text-lg font-semibold text-brown-600">Total de Ofertas</h2>
                <p class="text-3xl text-gray-800 mt-2">{{ $totalOffers }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h2 class="text-lg font-semibold text-brown-600">Total de Candidaturas</h2>
                <p class="text-3xl text-gray-800 mt-2">{{ $totalApplications }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h2 class="text-lg font-semibold text-brown-600">Candidaturas Aceitas</h2>
                <p class="text-3xl text-gray-800 mt-2">{{ $acceptedApplications }}</p>
            </div>
        </div>
    </div>
@endsection
