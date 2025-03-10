@extends('layouts.app')

@section('title', 'Ofertas de Emprego')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-brown-600 mb-4">Ofertas de Emprego</h1>
        @if($jobOffers->isEmpty())
            <p class="text-gray-600">Nenhuma oferta disponível no momento.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($jobOffers as $jobOffer)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-brown-600">{{ $jobOffer->title }}</h2>
                        <p class="text-gray-600">{{ $jobOffer->user->profile->company_name }}</p>
                        <p class="text-gray-600">Salário: {{ $jobOffer->salary_range }}</p>
                        <p class="text-gray-600">Localização: {{ $jobOffer->location ?? 'Não especificado' }}</p>
                        <p class="text-gray-600">Expira em: {{ $jobOffer->expires_at->format('d/m/Y') }}</p>
                        <a href="{{ route('job-offers.show', $jobOffer->id) }}" class="mt-2 inline-block bg-brown-600 text-white px-4 py-2 rounded hover:bg-brown-700">Ver Detalhes</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
