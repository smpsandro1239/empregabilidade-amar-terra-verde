@extends('layouts.app')

@section('title', 'Detalhes da Oferta')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-brown-600 mb-4">{{ $jobOffer->title }}</h1>
            <p><strong>Empresa:</strong> {{ $jobOffer->user->profile->company_name }}</p>
            <p><strong>Salário:</strong> {{ $jobOffer->salary_range }}</p>
            <p><strong>Localização:</strong> {{ $jobOffer->location ?? 'Não especificado' }}</p>
            <p><strong>Tipo de Contrato:</strong> {{ $jobOffer->contract_type ?? 'Não especificado' }}</p>
            <p><strong>Descrição:</strong> {{ $jobOffer->description }}</p>
            <p><strong>Expira em:</strong> {{ $jobOffer->expires_at->format('d/m/Y') }}</p>
        </div>
    </div>
@endsection
