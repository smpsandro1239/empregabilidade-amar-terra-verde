@extends('layouts.app')
@section('title', 'Detalhes da Oferta')
@section('content')
    <div class="space-y-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-brown-600 mb-4">{{ $jobOffer->title }}</h1>
            <div class="space-y-2 text-gray-700">
                <p><strong>Empresa:</strong> {{ $jobOffer->user->profile->company_name }}</p>
                <p><strong>Salário:</strong> {{ $jobOffer->salary_range }}</p>
                <p><strong>Localização:</strong> {{ $jobOffer->location ?? 'Não especificado' }}</p>
                <p><strong>Tipo de Contrato:</strong> {{ $jobOffer->contract_type ?? 'Não especificado' }}</p>
                <p><strong>Descrição:</strong> {{ $jobOffer->description }}</p>
                <p><strong>Expira em:</strong> {{ $jobOffer->expires_at->format('d/m/Y') }}</p>
            </div>
            <form method="POST" action="{{ route('job-offers.apply', $jobOffer->id) }}" class="mt-6 space-y-4" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Mensagem</label>
                    <textarea name="message" rows="4" placeholder="Mensagem opcional para a empresa" class="w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600"></textarea>
                </div>
                <div>
                    <label for="resume" class="block text-sm font-medium text-gray-700">Currículo (PDF)</label>
                    <input type="file" name="resume" id="resume" class="mt-1 block w-full text-gray-600" accept=".pdf" required>
                    @error('resume') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown-700 transition-all duration-300 transform hover:scale-105">Candidatar-se</button>
            </form>
        </div>
    </div>
@endsection
